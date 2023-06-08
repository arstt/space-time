<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Destination;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::all()->take(6);
        $berita = Berita::all()->take(3);

        return view('welcome', compact('destinations', 'berita'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function destination()
    {
        $destinations = Destination::all();

        return view('destination', compact('destinations'));
    }

    public function berita()
    {
        $berita = Berita::all();

        return view('berita', compact('berita'));
    }
}
