@extends('layouts.dubai')

@section('title', 'Dashboard — '.config('app.name'))
@section('heading', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Laptops in stock</div>
                <div class="fs-3 fw-bold">{{ $laptopsInStock }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Laptops sold</div>
                <div class="fs-3 fw-bold">{{ $laptopsSold }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Accessory SKUs</div>
                <div class="fs-3 fw-bold">{{ $accessorySkus }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Low stock accessories</div>
                <div class="fs-3 fw-bold text-warning">{{ $lowStockAccessories }}</div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span>Recent laptop units</span>
        <a href="{{ route('laptops.create') }}" class="btn btn-sm btn-success">+ Add laptop</a>
    </div>
    <div class="table-responsive">
        <table class="table table-sm mb-0">
            <thead>
            <tr>
                <th>Model</th>
                <th>Serial</th>
                <th>Specs</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($recentLaptops as $unit)
                <tr>
                    <td>{{ $unit->displayName() }}</td>
                    <td><code>{{ $unit->serial }}</code></td>
                    <td class="small text-muted">{{ collect([$unit->cpu, $unit->ram, $unit->storage])->filter()->implode(' · ') }}</td>
                    <td><span class="badge text-bg-secondary">{{ $unit->status->label() }}</span></td>
                    <td><a href="{{ route('laptops.show', $unit) }}">View</a></td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-muted p-3">No laptops yet. Add stock or import (import coming in next sprint).</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
