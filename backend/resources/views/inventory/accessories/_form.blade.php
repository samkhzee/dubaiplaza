@php /** @var \App\Models\Accessory|null $accessory */ @endphp
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Name *</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name', $accessory->name ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">SKU</label>
        <input type="text" name="sku" class="form-control" value="{{ old('sku', $accessory->sku ?? '') }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Qty on hand *</label>
        <input type="number" min="0" name="qty_on_hand" class="form-control" required value="{{ old('qty_on_hand', $accessory->qty_on_hand ?? 0) }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Reorder level *</label>
        <input type="number" min="0" name="reorder_level" class="form-control" required value="{{ old('reorder_level', $accessory->reorder_level ?? 0) }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Cost *</label>
        <input type="number" step="0.01" min="0" name="cost" class="form-control" required value="{{ old('cost', $accessory->cost ?? 0) }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Rate *</label>
        <input type="number" step="0.01" min="0" name="rate" class="form-control" required value="{{ old('rate', $accessory->rate ?? 0) }}">
    </div>
</div>
