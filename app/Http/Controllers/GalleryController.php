<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries= Gallery::all();

        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galleries.create');
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
                    'name' => 'required',
                    'image' => 'required',
                ]);

                if ($validate->fails()) {
                    return back()->withErrors($validate)->withInput();
                }

                $name = $request->input('name');
                $pathOriginal = $request->file('image')->store('public/gallery');
                $path = str_replace('public/', '', $pathOriginal);

                Gallery::create([
                    'name' => $name,
                    'image' => $path,
                ]);

                return redirect()->route('galleries.index')->with('success', 'Gallery berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleries = Gallery::findOrFail($id);

        return view('galleries.edit', compact('galleries'));
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
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $name = $request->input('name');

        $galleries = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            $pathOriginal = $request->file('image')->store('public/gallery');
            $path = str_replace('public/', '', $pathOriginal);

            $galleries->update([
                'name' => $name,
                'image' => $path,
            ]);
        } else {
            $galleries->update([
                'name' => $name,
            ]);
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findGalleriesId = Gallery::findOrFail($id);
        $findGalleriesId->delete();

        return redirect()->route('galleries.index')->with('success', 'Images Gallery berhasil dihapus');

    }
}
