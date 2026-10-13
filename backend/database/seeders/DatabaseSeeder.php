<?php

namespace Database\Seeders;

use App\Enums\LaptopUnitStatus;
use App\Enums\UserRole;
use App\Models\Accessory;
use App\Models\LaptopUnit;
use App\Models\SupplierLot;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name' => 'Shop Owner',
            'email' => 'owner@dubaiplaza.test',
            'password' => Hash::make('password'),
            'role' => UserRole::Owner,
            'email_verified_at' => now(),
        ]);

        User::query()->create([
            'name' => 'Counter Staff',
            'email' => 'staff@dubaiplaza.test',
            'password' => Hash::make('password'),
            'role' => UserRole::Staff,
            'email_verified_at' => now(),
        ]);

        $lot = SupplierLot::query()->create([
            'reference' => 'LOT-2026-01',
            'supplier_name' => 'Demo Supplier',
            'imported_at' => now(),
        ]);

        LaptopUnit::query()->create([
            'supplier_lot_id' => $lot->id,
            'brand' => 'Dell',
            'model' => 'Latitude 5420',
            'cpu' => 'i5-8365U',
            'ram' => '8GB',
            'storage' => '256GB SSD',
            'serial' => 'SN-D5420-001',
            'cost' => 38500,
            'rate' => 45000,
            'condition_note' => 'Good keyboard',
            'status' => LaptopUnitStatus::InStock,
        ]);

        LaptopUnit::query()->create([
            'supplier_lot_id' => $lot->id,
            'brand' => 'HP',
            'model' => 'ProBook 450 G8',
            'cpu' => 'i7-1165G7',
            'ram' => '16GB',
            'storage' => '512GB SSD',
            'serial' => 'SN-HP450-101',
            'cost' => 52000,
            'rate' => 62000,
            'status' => LaptopUnitStatus::InStock,
        ]);

        Accessory::query()->create([
            'name' => 'Universal laptop charger 65W',
            'sku' => 'CHG-65W',
            'qty_on_hand' => 12,
            'cost' => 1200,
            'rate' => 1800,
            'reorder_level' => 5,
        ]);
    }
}
