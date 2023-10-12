<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all(); // get all the authors
        return view('admin.author.index', ['authors' => $authors]); // retuns the view page with the data
    }

    public function create()
    {
        return view('admin.author.create'); // returns the view page
    }

    public function store(Request $request)
    {
        //validation code
        $fields = $request->validate([
            'name_bengali' => 'nullable',
            'name_hindi' => 'nullable',
            'name_english' => 'required',
            'description_bengali' => 'nullable',
            'description_hindi' => 'nullable',
            'description_english' => 'nullable',
            'image' => 'nullable',
        ],[
            'name_english.required' => 'Please enter the name of the Author.'
        ]);

        //image upload code
        if ($files = $request->file('image')) {

            $fields['image'] = $files->storePublicly('uploads/author_images', 'public');
        }

        $author = Author::create($fields); // save the data in the database
        return Redirect::to(route('admin.author.index')); //redirect
    }

    public function show($id)
    {
        $author = Author::find($id); // get author details by id
        return view('admin.author.show', ['author' => $author]); // returns the view page with data
    }

    public function edit($id)
    {
        $author = Author::find($id); // find the author by it's id
        return view('admin.author.edit', ['author' => $author]); // returns the view page 
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id); // find the author by it's id
        //validation code
        $updated_fields = $request->validate([
            'name_bengali' => 'nullable',
            'name_hindi' => 'nullable',
            'name_english' => 'required',
            'description_bengali' => 'nullable',
            'description_hindi' => 'nullable',
            'description_english' => 'nullable',
            'image' => 'nullable',
        ],[
            'name_english.required' => 'Please enter the name of the Author.'
        ]);
        //update the image in the database
        if ($files = $request->file('image')) {
            Storage::disk('public')->delete($author->image ?? '');
            $updated_fields['image'] = $files->storePublicly('uploads/author_images', 'public');
        }

        //update the records in the database
        $author->update($updated_fields);

        return Redirect::to(url('admin/author/' . $id)); //redirect
    }

    public function destroy($id)
    {
        $author = Author::find($id); //find by id
        $author->delete(); // delete from database
        return Redirect::to(route('admin.author.index')); //redirect
    }
}
