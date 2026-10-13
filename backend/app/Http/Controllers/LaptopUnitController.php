<?php

namespace App\Http\Controllers;

use App\Enums\LaptopUnitStatus;
use App\Models\LaptopUnit;
use App\Models\SupplierLot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LaptopUnitController extends Controller
{
    public function index(Request $request): View
    {
        $q = trim((string) $request->query('q', ''));

        $units = LaptopUnit::query()
            ->with('supplierLot')
            ->when($q !== '', function ($query) use ($q) {
                $tokens = preg_split('/\s+/', mb_strtolower($q)) ?: [];
                foreach ($tokens as $token) {
                    if ($token === '') {
                        continue;
                    }
                    $query->where('search_text', 'like', '%'.$token.'%');
                }
            })
            ->orderByDesc('id')
            ->paginate(20)
            ->withQueryString();

        return view('inventory.laptops.index', compact('units', 'q'));
    }

    public function create(): View
    {
        return view('inventory.laptops.create', [
            'lots' => SupplierLot::query()->orderByDesc('id')->get(),
            'statuses' => LaptopUnitStatus::cases(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        LaptopUnit::query()->create($data);

        return redirect()->route('laptops.index')->with('status', 'Laptop unit added.');
    }

    public function show(LaptopUnit $laptop): View
    {
        $laptop->load('supplierLot');

        return view('inventory.laptops.show', compact('laptop'));
    }

    public function edit(LaptopUnit $laptop): View
    {
        return view('inventory.laptops.edit', [
            'laptop' => $laptop,
            'lots' => SupplierLot::query()->orderByDesc('id')->get(),
            'statuses' => LaptopUnitStatus::cases(),
        ]);
    }

    public function update(Request $request, LaptopUnit $laptop): RedirectResponse
    {
        $laptop->update($this->validated($request, $laptop->id));

        return redirect()->route('laptops.show', $laptop)->with('status', 'Laptop unit updated.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'supplier_lot_id' => ['nullable', 'exists:supplier_lots,id'],
            'brand' => ['nullable', 'string', 'max:120'],
            'model' => ['required', 'string', 'max:160'],
            'cpu' => ['nullable', 'string', 'max:120'],
            'ram' => ['nullable', 'string', 'max:60'],
            'storage' => ['nullable', 'string', 'max:60'],
            'serial' => [
                'required',
                'string',
                'max:120',
                Rule::unique('laptop_units', 'serial')->ignore($ignoreId),
            ],
            'cost' => ['required', 'numeric', 'min:0'],
            'rate' => ['required', 'numeric', 'min:0'],
            'condition_note' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::enum(LaptopUnitStatus::class)],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);
    }
}
