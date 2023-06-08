@extends('layouts.backend')

@section('title', 'Review')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Review</h1>
        <div class="section-header-button">
          <a href="{{route('reviews.create')}}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('reviews.index')}}">Review</a>
            </div>
            <div class="breadcrumb-item">All Review</div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Destination Name</th>
                        <th>Rating</th>
                        <th>Review Title</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($reviews as $review)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $review->destination['name'] }} </td>
                        <td> {{ $review->rating }} </td>
                        <td> {{ $review->title }} </td>
                        <td>
                            <a href="{{route('reviews.edit', $review->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{route('reviews.destroy', $review->id)}}" method="POST" class="d-inline">
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
