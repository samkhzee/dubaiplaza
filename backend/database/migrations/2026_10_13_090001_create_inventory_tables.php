<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supplier_lots', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 64)->unique();
            $table->string('supplier_name')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('imported_at')->nullable();
            $table->timestamps();
        });

        Schema::create('laptop_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_lot_id')->nullable()->constrained()->nullOnDelete();
            $table->string('brand')->nullable();
            $table->string('model');
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('serial')->unique();
            $table->decimal('cost', 12, 2)->default(0);
            $table->decimal('rate', 12, 2)->default(0);
            $table->string('condition_note')->nullable();
            $table->string('status', 20)->default('in_stock');
            $table->text('notes')->nullable();
            $table->text('search_text')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index(['model', 'brand']);
        });

        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku', 64)->nullable()->unique();
            $table->unsignedInteger('qty_on_hand')->default(0);
            $table->decimal('cost', 12, 2)->default(0);
            $table->decimal('rate', 12, 2)->default(0);
            $table->unsignedInteger('reorder_level')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accessories');
        Schema::dropIfExists('laptop_units');
        Schema::dropIfExists('supplier_lots');
    }
};
