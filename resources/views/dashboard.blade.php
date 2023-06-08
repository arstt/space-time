@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Dashboard</h4>
    </div>
    <div class="card-body">
        <p>Selamat datang di halaman dashboard, {{ auth()->user()->name }}!</p>
    </div>
</div>
@endsection
