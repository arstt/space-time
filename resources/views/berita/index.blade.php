@extends('layouts.backend')

@section('title', 'Berita')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Berita</h1>
        <div class="section-header-button">
          <a href="{{route('beritas.create')}}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('beritas.index')}}">Berita</a>
            </div>
            <div class="breadcrumb-item">All Berita</div>
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
                        <th>Category</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($beritas as $berita)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> <img src="{{ asset('storage/' . $berita->image) }}" width="100px"> </td>
                        <td> {{ $berita->title }} </td>
                        <td>
                            @foreach ($berita->categories as $category)
                                <span class="badge badge-primary">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{route('beritas.edit', $berita->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{route('beritas.destroy', $berita->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <td colspan="4" class="text-center">Tidak Ada Berita</td>
                    @endforelse

                </tbody>
        </table>
          </div>
    </div>
</div>
@endsection
