@extends('layouts.backend')

@section('title', 'Review')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Add Review</h1>
        <div class="section-header-button">
          <a href="{{route('reviews.index')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('reviews.index')}}">Review</a>
            </div>
            <div class="breadcrumb-item">Add Review</div>
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
                @foreach ($destinations as $destination )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{asset('storage/'.$destination->image)}}" alt="" width="100px">
                        </td>
                        <td>{{$destination->name}}</td>
                        <td>{{$destination->latitude}}</td>
                        <td>{{$destination->longitude}}</td>
                        <td>
                            {{-- button add review show pop u --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal" data-Destination="{{$destination->id}}">
                                Add Review
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          </div>
    </div>

    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="reviewModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Add your form here -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>


</div>
@endsection

@section('js')

@endsection
