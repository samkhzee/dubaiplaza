@extends('layouts.dubai')

@section('title', $laptop->serial.' — '.config('app.name'))
@section('heading', $laptop->displayName())
@section('subheading', 'Serial: '.$laptop->serial)

@section('content')
<div class="d-flex gap-2 mb-3">
    <a href="{{ route('laptops.edit', $laptop) }}" class="btn btn-primary btn-sm">Edit</a>
    <a href="{{ route('laptops.index') }}" class="btn btn-outline-secondary btn-sm">Back to list</a>
</div>
<div class="row g-3">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-semibold">Specs</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between"><span>CPU</span><span>{{ $laptop->cpu ?: '—' }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><span>RAM</span><span>{{ $laptop->ram ?: '—' }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><span>Storage</span><span>{{ $laptop->storage ?: '—' }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><span>Condition</span><span>{{ $laptop->condition_note ?: '—' }}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-semibold">Pricing & status</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between"><span>Cost</span><span>{{ number_format($laptop->cost, 2) }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><span>Rate</span><span>{{ number_format($laptop->rate, 2) }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><span>Status</span><span>{{ $laptop->status->label() }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><span>Supplier lot</span><span>{{ $laptop->supplierLot?->reference ?? '—' }}</span></li>
            </ul>
        </div>
    </div>
    @if ($laptop->notes)
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-muted small mb-1">Notes</div>
                    <div>{{ $laptop->notes }}</div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
