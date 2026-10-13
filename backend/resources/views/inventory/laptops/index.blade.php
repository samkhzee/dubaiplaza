@extends('layouts.dubai')

@section('title', 'Laptops — '.config('app.name'))
@section('heading', 'Laptop inventory')
@section('subheading', 'One row = one physical unit (serialized)')

@section('content')
<form method="GET" class="row g-2 mb-3">
    <div class="col-md-8">
        <input type="search" name="q" class="form-control" placeholder="Search e.g. dell i5 8gb 256ssd" value="{{ $q }}">
    </div>
    <div class="col-md-4 d-flex gap-2">
        <button class="btn btn-primary" type="submit">Search</button>
        <a href="{{ route('laptops.create') }}" class="btn btn-success ms-auto">+ Add laptop</a>
    </div>
</form>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead class="table-light">
            <tr>
                <th>Item</th>
                <th>Serial</th>
                <th>Cost / Rate</th>
                <th>Lot</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($units as $unit)
                <tr>
                    <td>
                        <div class="fw-semibold">{{ $unit->displayName() }}</div>
                        <div class="small text-muted">{{ collect([$unit->cpu, $unit->ram, $unit->storage])->filter()->implode(' · ') }}</div>
                    </td>
                    <td><code>{{ $unit->serial }}</code></td>
                    <td>{{ number_format($unit->cost, 0) }} / {{ number_format($unit->rate, 0) }}</td>
                    <td>{{ $unit->supplierLot?->reference ?? '—' }}</td>
                    <td><span class="badge text-bg-secondary">{{ $unit->status->label() }}</span></td>
                    <td class="text-end">
                        <a href="{{ route('laptops.show', $unit) }}" class="btn btn-sm btn-outline-primary">Open</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-muted p-4">No laptops match your search.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if ($units->hasPages())
        <div class="card-footer">{{ $units->links() }}</div>
    @endif
</div>
@endsection
