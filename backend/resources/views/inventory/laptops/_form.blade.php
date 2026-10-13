@php /** @var \App\Models\LaptopUnit|null $laptop */ @endphp
<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Brand</label>
        <input type="text" name="brand" class="form-control" value="{{ old('brand', $laptop->brand ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Model *</label>
        <input type="text" name="model" class="form-control" required value="{{ old('model', $laptop->model ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Serial *</label>
        <input type="text" name="serial" class="form-control" required value="{{ old('serial', $laptop->serial ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">CPU</label>
        <input type="text" name="cpu" class="form-control" value="{{ old('cpu', $laptop->cpu ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">RAM</label>
        <input type="text" name="ram" class="form-control" value="{{ old('ram', $laptop->ram ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Storage</label>
        <input type="text" name="storage" class="form-control" value="{{ old('storage', $laptop->storage ?? '') }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Cost *</label>
        <input type="number" step="0.01" min="0" name="cost" class="form-control" required value="{{ old('cost', $laptop->cost ?? 0) }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Rate *</label>
        <input type="number" step="0.01" min="0" name="rate" class="form-control" required value="{{ old('rate', $laptop->rate ?? 0) }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Status *</label>
        <select name="status" class="form-select" required>
            @foreach ($statuses as $status)
                <option value="{{ $status->value }}" @selected(old('status', $laptop?->status?->value ?? 'in_stock') === $status->value)>{{ $status->label() }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Supplier lot</label>
        <select name="supplier_lot_id" class="form-select">
            <option value="">— None —</option>
            @foreach ($lots as $lot)
                <option value="{{ $lot->id }}" @selected((string) old('supplier_lot_id', $laptop->supplier_lot_id ?? '') === (string) $lot->id)>{{ $lot->reference }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Condition</label>
        <input type="text" name="condition_note" class="form-control" value="{{ old('condition_note', $laptop->condition_note ?? '') }}">
    </div>
    <div class="col-12">
        <label class="form-label">Notes</label>
        <textarea name="notes" class="form-control" rows="2">{{ old('notes', $laptop->notes ?? '') }}</textarea>
    </div>
</div>
