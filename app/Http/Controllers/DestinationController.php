<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();

        return view('destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
          'destinationName' => 'required',
          'destinationDescription' => 'required',
          'destinationAddress' => 'required',
          'image' => 'required',
          'destinationLatitude' => 'required',
          'destinationLongitude' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $pathOriginal = $request->file('image')->store('public/images');
        $path = str_replace('public/', '', $pathOriginal);

        $input = [
            'name' => $request->input('destinationName'),
            'description' => $request->input('destinationDescription'),
            'address' => $request->input('destinationAddress'),
            'image' => $path,
            'latitude' => $request->input('destinationLatitude'),
            'longitude' => $request->input('destinationLongitude'),
        ];

        Destination::create($input);

        return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $destination = Destination::findOrFail($id);

        return view('destinations.show', compact('destination'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::findOrFail($id);

        return view('destinations.edit', compact('destination'));
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


        $validator = Validator::make(request()->all(), [
          'destinationName' => 'required',
          'destinationDescription' => 'required',
          'destinationAddress' => 'required',
          'destinationLatitude' => 'required',
          'destinationLongitude' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasFile('image')) {
          $path = $request->file('image')->store('public/images');

          $input = [
            'name' => $request->input('destinationName'),
            'description' => $request->input('destinationDescription'),
            'address' => $request->input('destinationAddress'),
            'image' => $path,
            'latitude' => $request->input('destinationLatitude'),
            'longitude' => $request->input('destinationLongitude'),
          ];

        } else {
            $input = [
                'name' => $request->input('destinationName'),
                'description' => $request->input('destinationDescription'),
                'address' => $request->input('destinationAddress'),
                'latitude' => $request->input('destinationLatitude'),
                'longitude' => $request->input('destinationLongitude'),
            ];
        }

        Destination::findOrFail($id)->update($input);

        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findDestinationId = Destination::findOrFail($id);
        $findDestinationId->delete();

        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    }
}
