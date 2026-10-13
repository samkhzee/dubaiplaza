<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .dp-sidebar { width: 220px; min-height: 100vh; background: #2c2f33; }
        .dp-sidebar a { color: #cfd3dc; text-decoration: none; display: block; padding: .55rem 1rem; font-size: .9rem; }
        .dp-sidebar a:hover, .dp-sidebar a.active { background: #3d4248; color: #fff; }
        .dp-brand { color: #fff; font-weight: 600; padding: 1rem; border-bottom: 1px solid #444; }
        .dp-main { flex: 1; }
        .dp-top { background: #fff; border-bottom: 1px solid #dee2e6; }
    </style>
</head>
<body>
<div class="d-flex">
    <aside class="dp-sidebar">
        <div class="dp-brand">Dubai Plaza</div>
        <nav class="py-2">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('laptops.index') }}" class="{{ request()->routeIs('laptops.*') ? 'active' : '' }}">Laptops (serialized)</a>
            <a href="{{ route('accessories.index') }}" class="{{ request()->routeIs('accessories.*') ? 'active' : '' }}">Accessories</a>
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}" class="px-3 pt-2">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-light w-100">Log out</button>
            </form>
        </nav>
    </aside>
    <div class="dp-main">
        <header class="dp-top px-4 py-3 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h5 mb-0">@yield('heading', 'Dashboard')</h1>
                @hasSection('subheading')
                    <div class="text-muted small">@yield('subheading')</div>
                @endif
            </div>
            <div class="text-end small">
                <div class="fw-semibold">{{ auth()->user()->name }}</div>
                <div class="text-muted">{{ auth()->user()->role->label() }}</div>
            </div>
        </header>
        <main class="p-4">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
