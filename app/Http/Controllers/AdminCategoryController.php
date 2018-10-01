<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class AdminCategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')
            ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        Session::flash('message', 'Category Created Successfully...');
        return redirect()->route('category.index');
    }


    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit')
            ->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());

        Session::flash('message', 'Category Updated Successfully...');
        return redirect()->route('category.index');
    }


    public function destroy($id)
    {
        Category::find($id)->delete();
        Session::flash('message', 'Category Deleted Successfully...');
        return redirect()->route('category.index');
    }
}
