@extends('layouts.backend')

@section('title', 'Add Category')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Category</h1>
        <div class="section-header-button">
          <a href="{{route('categories.index')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('categories.index')}}">Category</a>
            </div>
            <div class="breadcrumb-item">Create Category</div>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('categories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Category Name</label>
                <input name="categoryName" type="text" class="form-control" placeholder="Park Landscpar">
            </div>

            <div class="form-group">
                <label>Categoty Slug</label>
                <p>separate by " - "</p>
                <input name="categorySlug" type="text" class="form-control" placeholder="park-landscape">
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
