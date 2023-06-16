@extends('layouts.client')

@section('content')
<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Recent News</h3>
                    <p>Badung is also known for its vibrant traditional arts and crafts scene, with numerous art markets and galleries showcasing local talent. Visitors can explore the creative side of Bali by witnessing traditional dance performances, attending painting workshops, or shopping for unique handicrafts and souvenirs.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($berita as $beritas)
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="{{ asset('storage/'.$beritas->image)}}" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>{{ $beritas->created_at }}</span>
                        </div>
                        <a href="{{ route('berita.detail', $beritas->id)}}">
                            <h3>{{ $beritas->title }}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
