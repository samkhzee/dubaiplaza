<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AccessoryController extends Controller
{
    public function index(): View
    {
        $accessories = Accessory::query()->orderBy('name')->paginate(25);

        return view('inventory.accessories.index', compact('accessories'));
    }

    public function create(): View
    {
        return view('inventory.accessories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Accessory::query()->create($this->validated($request));

        return redirect()->route('accessories.index')->with('status', 'Accessory saved.');
    }

    public function edit(Accessory $accessory): View
    {
        return view('inventory.accessories.edit', compact('accessory'));
    }

    public function update(Request $request, Accessory $accessory): RedirectResponse
    {
        $accessory->update($this->validated($request, $accessory->id));

        return redirect()->route('accessories.index')->with('status', 'Accessory updated.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'sku' => [
                'nullable',
                'string',
                'max:64',
                Rule::unique('accessories', 'sku')->ignore($ignoreId),
            ],
            'qty_on_hand' => ['required', 'integer', 'min:0'],
            'cost' => ['required', 'numeric', 'min:0'],
            'rate' => ['required', 'numeric', 'min:0'],
            'reorder_level' => ['required', 'integer', 'min:0'],
        ]);
    }
}
