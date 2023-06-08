@extends('layouts.backend')

@section('title', 'Berita')

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Berita</h1>
        <div class="section-header-button">
          <a href="{{route('beritas.index')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('beritas.index')}}">Berita</a>
            </div>
            <div class="breadcrumb-item">Create Berita</div>
        </div>
    </div>

    <div class="card-body">
        <div class="card-body">
            <form action="{{ route('beritas.update', $berita->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Berita Title</label>
                    <input name="beritaTitle" value="{{ $berita->title }}" type="text" class="form-control" placeholder="Park Landscpar">
                </div>

                <div class="form-group">
                    <label>Select Category</label>
                        <select name="beritaCategories" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            @foreach ( $categories as $category )
                                <option value="{{ $category->id }}" {{ old('beritaCategories') == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="beritaDescription" class="form-control" placeholder="Isi berita disini">{{ $berita->description }}</textarea>
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
