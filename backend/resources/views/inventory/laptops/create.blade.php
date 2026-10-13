@extends('layouts.dubai')

@section('title', 'Add laptop — '.config('app.name'))
@section('heading', 'Add laptop unit')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('laptops.store') }}">
            @csrf
            @include('inventory.laptops._form', ['laptop' => null])
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Save unit</button>
                <a href="{{ route('laptops.index') }}" class="btn btn-link">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
