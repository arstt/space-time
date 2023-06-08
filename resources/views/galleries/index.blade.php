@extends('layouts.backend')

@section('title', 'Gallery')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Gallery</h1>
        <div class="section-header-button">
          <a href="{{route('galleries.create')}}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('galleries.index')}}">Gallery</a>
            </div>
            <div class="breadcrumb-item">All Gallery</div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($galleries as $gallery)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> <img src="{{ asset('storage/' . $gallery->image) }}" width="100px"> </td>
                        <td> {{ $gallery->name }} </td>
                        <td>
                            <a href="{{route('galleries.edit', $gallery->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{route('galleries.destroy', $gallery->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <td colspan="4" class="text-center">Tidak Ada Gallery Images</td>
                    @endforelse

                </tbody>
        </table>
          </div>
    </div>
</div>
@endsection
