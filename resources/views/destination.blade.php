@extends('layouts.client')

@section('content')
<div class="popular_destination_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Destination</h3>
                    <p>vibrant traditional arts and crafts scene, with numerous art markets and galleries showcasing local talent. Visitors can explore the creative side of Bali by witnessing traditional dance performances, attending painting workshops, or shopping for unique handicrafts and souvenirs.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($destinations as $destination)
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="{{asset('storage/'.$destination->image)}}" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">{{ $destination->name }} </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
