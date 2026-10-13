@extends('layouts.dubai')

@section('title', 'Edit laptop — '.config('app.name'))
@section('heading', 'Edit laptop unit')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('laptops.update', $laptop) }}">
            @csrf
            @method('PUT')
            @include('inventory.laptops._form', ['laptop' => $laptop])
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('laptops.show', $laptop) }}" class="btn btn-link">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
