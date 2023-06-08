<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
          'categoryName' => 'required',
          'categorySlug' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $input = [
            'name' => $request->input('categoryName'),
            'slug' => $request->input('categorySlug'),
        ];

        Category::create($input);

        return redirect()->route('categories.index')->with('success', 'Category has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);

        return view('category.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);

        return view('category.edit', compact('categories'));
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
          'categoryName' => 'required',
          'categorySlug' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $input = [
            'name' => $request->input('categoryName'),
            'slug' => $request->input('categorySlug'),
        ];

        Category::find($id)->update($input);

        return redirect()->route('categories.index')->with('success', 'Category has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findCategoryId = Category::find($id);
        if ($findCategoryId->delete()) {
            return redirect()->route('categories.index')->with('success', 'Category has been deleted successfully.');
        }
    }
}
