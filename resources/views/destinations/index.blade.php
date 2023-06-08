@extends('layouts.backend')

@section('title', 'Destination')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Destination</h1>
        <div class="section-header-button">
          <a href="{{route('destinations.create')}}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('destinations.index')}}">Destination</a>
            </div>
            <div class="breadcrumb-item">All Destination</div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($destinations as $destination)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{asset('storage/'.$destination->image)}}" alt="" width="100px">
                        </td>
                        <td>{{$destination->name}}</td>
                        <td>{{$destination->latitude}}</td>
                        <td>{{$destination->longitude}}</td>
                        <td>
                            <a href="{{route('destinations.edit', $destination->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{route('destinations.destroy', $destination->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Data Kosong</td>
                    </tr>
                    @endforelse

                </tbody>
        </table>
          </div>
    </div>
</div>
@endsection
