<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\BeritaOnCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Berita::all();

        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('berita.create', compact('categories'));
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
            'beritaTitle' => 'required',
            'image' => 'required',
            'beritaDescription' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $pathOriginal = $request->file('image')->store('public/imagesBerita');
        $path = str_replace('public/', '', $pathOriginal);

        // get slug from title and replace space with dash, all lowercase
        $slug = strtolower(str_replace(' ', '-', $request->input('beritaTitle')));

        $input = [
            'title' => $request->input('beritaTitle'),
            'slug' => $slug,
            'image' => $path,
            'description' => $request->input('beritaDescription'),
        ];

        $berita = Berita::create($input);

        $getLastestBertiaId = $berita->id;
        $categoriesId = $request->input('beritaCategories');

        BeritaOnCategory::create([
            'berita_id' => $getLastestBertiaId,
            'category_id' => $categoriesId,
        ]);

        return redirect()->route('beritas.index')->with('success', 'Berita berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        $categories = Category::all();

        return view('berita.show', compact('berita', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $categories = Category::all();

        return view('berita.edit', compact('berita', 'categories'));
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
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $berita = Berita::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/imagesBerita');
            $input = [
                'title' => $request->input('beritaTitle'),
                'image' => $path,
                'description' => $request->input('beritaDescription'),
            ];
        } else {
            $input = [
                'title' => $request->input('beritaTitle'),
                'description' => $request->input('beritaDescription'),
            ];
        }

        $berita->update($input);

        $categoriesId = $request->input('beritaCategories');

        $berita->categories()->sync($categoriesId);

        return redirect()->route('beritas.index')->with('success', 'Berita berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            Berita::findOrFail($id)->delete();

            return redirect()->route('beritas.index')->with('success', 'Berita berhasil dihapus');
    }
}
