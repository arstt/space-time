@extends('layouts.backend')

@section('title', 'Gallery')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Gallery</h1>
        <div class="section-header-button">
          <a href="{{route('galleries.index')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('galleries.index')}}">Gallery</a>
            </div>
            <div class="breadcrumb-item">Create Gallery</div>
        </div>
    </div>

    <div class="card-body">
        <div class="card-body">
            <form action="{{ route('galleries.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Image Title</label>
                    <input name="name" type="text" class="form-control" placeholder="Landscape Uluwatu">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
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
</div>
@endsection
