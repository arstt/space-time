@extends('layouts.client')

@section('content')

{{-- slider start --}}
<div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter_text">
                            <h4>Badung</h4>
                            <p>Stretching along Badung's coastline is the famous Kuta-Legian-Seminyak strip, renowned for its stunning beaches, vibrant nightlife, and countless dining and entertainment options. From the world-class surf breaks of Kuta Beach to the upscale resorts and trendy beach clubs in Seminyak, this coastal area caters to a wide range of preferences and interests.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mail_form">
                            <div class="row no-gutters">
                                <div class="col-lg-9 col-md-8">
                                    <div class="newsletter_field">

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 ">Explore</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- slider end --}}

{{-- popular_destination start --}}
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
{{-- popular_destination end --}}

{{-- newletter_area start --}}
<div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter_text">
                            <h4>Subscribe Our Newsletter</h4>
                            <p>Subscribe newsletter to get offers and about
                                new places to discover.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mail_form">
                            <div class="row no-gutters">
                                <div class="col-lg-9 col-md-8">
                                    <div class="newsletter_field">
                                        <input type="email" placeholder="Your mail" >
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 " type="submit" >Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- newletter_area end --}}

{{-- Area --}}
<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Recent News</h3>
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
                        <a href="#">
                            <h3>{{ $beritas->title }}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- end area --}}

@endsection
