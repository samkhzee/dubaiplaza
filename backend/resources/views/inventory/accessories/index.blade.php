@extends('layouts.dubai')

@section('title', 'Accessories — '.config('app.name'))
@section('heading', 'Accessory stock')
@section('subheading', 'Quantity-based items (chargers, RAM, SSD, etc.)')

@section('content')
<div class="mb-3 text-end">
    <a href="{{ route('accessories.create') }}" class="btn btn-success">+ Add accessory</a>
</div>
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>SKU</th>
                <th>Qty</th>
                <th>Cost / Rate</th>
                <th>Reorder</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($accessories as $item)
                <tr @class(['table-warning' => $item->reorder_level > 0 && $item->qty_on_hand <= $item->reorder_level])>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->sku ?: '—' }}</td>
                    <td>{{ $item->qty_on_hand }}</td>
                    <td>{{ number_format($item->cost, 0) }} / {{ number_format($item->rate, 0) }}</td>
                    <td>{{ $item->reorder_level }}</td>
                    <td class="text-end"><a href="{{ route('accessories.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a></td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-muted p-4">No accessories yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if ($accessories->hasPages())
        <div class="card-footer">{{ $accessories->links() }}</div>
    @endif
</div>
@endsection
