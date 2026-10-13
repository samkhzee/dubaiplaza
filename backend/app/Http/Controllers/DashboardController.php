<?php

namespace App\Http\Controllers;

use App\Enums\LaptopUnitStatus;
use App\Models\Accessory;
use App\Models\LaptopUnit;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'laptopsInStock' => LaptopUnit::query()->where('status', LaptopUnitStatus::InStock)->count(),
            'laptopsSold' => LaptopUnit::query()->where('status', LaptopUnitStatus::Sold)->count(),
            'accessorySkus' => Accessory::query()->count(),
            'lowStockAccessories' => Accessory::query()
                ->whereColumn('qty_on_hand', '<=', 'reorder_level')
                ->where('reorder_level', '>', 0)
                ->count(),
            'recentLaptops' => LaptopUnit::query()->latest()->limit(8)->get(),
        ]);
    }
}
