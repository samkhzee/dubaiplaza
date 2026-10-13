@extends('layouts.dubai')

@section('title', 'Edit accessory — '.config('app.name'))
@section('heading', 'Edit accessory')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('accessories.update', $accessory) }}">
            @csrf
            @method('PUT')
            @include('inventory.accessories._form', ['accessory' => $accessory])
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('accessories.index') }}" class="btn btn-link">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
