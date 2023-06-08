@extends('layouts.client')

@section('content')
<div class="about_story">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="story_heading">
                    <h3>Our Story</h3>
                </div>
                <div class="row">
                    <div class="col-lg-11 offset-lg-1">
                        <div class="story_info">
                            <div class="row">
                                <div class="col-lg-9">
                                    <p>Badung is a regency located in the southern part of Bali, Indonesia. It is one of the most vibrant and popular areas on the island, attracting both local residents and tourists alike. With its diverse range of attractions and bustling urban centers, Badung offers a unique blend of cultural heritage, natural beauty, and modern amenities.</p>
                            <p>At the heart of Badung is the bustling town of Denpasar, the capital of Bali. Here, you'll find a mix of traditional markets, modern shopping malls, and lively street scenes. Denpasar is also home to significant cultural landmarks, such as the Pura Jagatnatha Temple and the Bali Provincial Museum, where you can immerse yourself in the rich heritage of the island.</p>
                                </div>
                            </div>
                        </div>
                        <div class="story_thumb">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="thumb padd_1">
                                        <img src="{{ asset('client/img/about/1.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="thumb">
                                        <img src="{{ asset('client/img/about/2.png')}}" alt="">
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
@endsection
