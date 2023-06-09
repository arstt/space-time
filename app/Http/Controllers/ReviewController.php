<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $reviews = Review::where('user_id', $userId)->get();

        return view('review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::all();

        return view('review.create', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(request()->all(), [
            'destination_id' => 'required',
            'name' => 'required',
            'review' => 'required',
            'rating' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $userId = auth()->user()->id;
        $destinationId = $request->input('destination_id');
        $name = $request->input('name');
        $review = $request->input('review');
        $rating = $request->input('rating');

        Review::create([
            'destination_id' => $destinationId,
            'user_id' => $userId,
            'name' => $name,
            'review' => $review,
            'rating' => $rating,
        ]);

        return redirect()->route('review.index')->with('success', 'Review berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = auth()->user()->id;
        $review = Review::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $destinationId = $review->destination_id;

        return view('review.edit', compact('review', 'destinationId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make(request()->all(), [
            'name' => 'required',
            'review' => 'required',
            'rating' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $userId = auth()->user()->id;
        $review = Review::where('id', $id)->where('user_id', $userId)->firstOrFail();

        $name = $request->input('name');
        $review = $request->input('review');
        $rating = $request->input('rating');

        $review->update([
            'name' => $name,
            'review' => $review,
            'rating' => $rating,
        ]);

        return redirect()->route('review.index')->with('success', 'Review berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reviewId = Review::where('id', $id)->firstOrFail();
        $reviewId->delete();

        return redirect()->route('review.index')->with('success', 'Review berhasil dihapus');
    }
}
