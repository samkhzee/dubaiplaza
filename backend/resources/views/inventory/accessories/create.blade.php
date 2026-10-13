@extends('layouts.dubai')

@section('title', 'Add accessory — '.config('app.name'))
@section('heading', 'Add accessory')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('accessories.store') }}">
            @csrf
            @include('inventory.accessories._form', ['accessory' => null])
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('accessories.index') }}" class="btn btn-link">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
