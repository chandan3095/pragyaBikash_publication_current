<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // get all the categories
        return view('admin.category.index', ['categories' => $categories]); // returns the view page with data
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //validation code
        $fields = $request->validate([
                'name_english' => 'required',
                'name_bengali' => 'nullable',
            ],
        [
            'name_english.required' => 'Please enter the name of the book.'
        ]);
        
        $category = Category::create($fields);//store the data in the database
        return Redirect::to(route('admin.category.index')); //redirect
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id); //find the category from the database
        return view('admin.category.edit', ['category' => $category]); //return to the view page
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id); //find by it's id

        //validation code
        $updated_fields = $request->validate([
            'name_english' => 'required',
            'name_bengali' => 'nullable',
        ]);

        $category->update($updated_fields); //update data in database
        return Redirect::to(route('admin.category.index')); //redirect
    }

    public function destroy($id)
    {
        $category = Category::find($id); //find category by it's id
        $category->delete(); // delete the category data from database
        return Redirect::to(route('admin.category.index')); // redirect
    }
}
