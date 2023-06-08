@extends('layouts.backend')

@section('title', 'Category')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Category</h1>
        <div class="section-header-button">
          <a href="{{route('categories.create')}}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('categories.index')}}">Category</a>
            </div>
            <div class="breadcrumb-item">All Category</div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $category->name }} </td>
                        <td> {{ $category->slug }} </td>
                        <td>
                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{route('categories.destroy', $category->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <td colspan="4" class="text-center">Data Kosong</td>
                    @endforelse
                </tbody>
        </table>
          </div>
    </div>
</div>
@endsection
