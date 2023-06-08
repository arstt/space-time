@extends('layouts.backend')

@section('title', 'Add Destination')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Destination</h1>
        <div class="section-header-button">
          <a href="{{route('destinations.index')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('destinations.index')}}">Destination</a>
            </div>
            <div class="breadcrumb-item">Create Destination</div>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('destinations.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Destination Name</label>
                <input name="destinationName" type="text" class="form-control" placeholder="GWK Culture Park">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input name="destinationAddress" type="text" class="form-control" placeholder="JL. xxx">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input name="image" type="file" class="form-control" placeholder="GWK Culture Park">
            </div>

            <div class="form-group">
                <label>Destination Latitude</label>
                <input name="destinationLatitude" type="number" class="form-control" placeholder="101.101.101.101">
            </div>

            <div class="form-group">
                <label>Destination Longitude</label>
                <input name="destinationLongitude" type="number" class="form-control" placeholder="101.101.101.101">
            </div>

            <div class="form-group">
                <label>Destination Description</label>
                <textarea name="destinationDescription" class="form-control" placeholder="GWK Culture Park Description"></textarea>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 text-end">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
