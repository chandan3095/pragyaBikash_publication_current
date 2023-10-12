<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get(); // get all the records of the books from the database
        // dd($books);
        return view('admin.book.index', ['books' => $books]); //return the view page
    }

    public function create()
    {
        $categories = Category::all(); //get all the categories
        $authors = Author::all(); // get all the authors
        return view('admin.book.create', ['categories' => $categories, 'authors' => $authors]); //redirect to the page
    }

    public function store(Request $request)
    {
        //validation code
        $fields = $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'english_name' => 'required',
            'bengali_name' => 'nullable',
            'hindi_name' => 'nullable',
            'description_english' => 'nullable',
            'description_hindi' => 'nullable',
            'description_bengali' => 'nullable',
            'cost_price' => 'required',
            'sale_price' => 'required',
            'status' => 'required',
            'isbn_code' => 'nullable',
            'publishing_year' => 'nullable'
        ], [
            'category_id.required' => 'Please select the category of the book',
            'author_id.required' => 'Please select the author of the book',
            'name_english.required' => 'Please enter the name of this book',
            'cost_price.required' => 'Please enter the MRP of this book.',
            'sale_price.required' => 'Please enter the sale price of this book.',
            'status.required' => 'Please enter the sale price of this book.'
        ]);


        unset($fields['author_id']);

        $book = Book::create($fields); //store in database

        $book->authors()->attach($request->author_id);

        return Redirect::to(route('admin.book.index')); //redirect

        // dd($fields);
    }

    public function show($id)
    {
        $book = Book::where('id' , $id)->with('images')->first(); //find book by it's id
        return view('admin.book.show', ['book' => $book]); //return view with data of the book
    }

    public function edit($id)
    {
        $book = Book::find($id); // find book by it's id
        $categories = Category::all(); // find all the categories
        $authors = Author::all(); // find all authors
        return view('admin.book.edit', ['book' => $book, 'categories' => $categories, 'authors' => $authors]); // return view with data of the book
    }

    public function update(Request $request, $id)
    {
        // $books = Book::where('id', 16)->with('authors')->get();
        // dd($books);
        $book = Book::find($id); // find book by it's id
        //validation code
        $updated_fields = $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'english_name' => 'required',
            'bengali_name' => 'nullable',
            'hindi_name' => 'nullable',
            'description_english' => 'nullable',
            'description_hindi' => 'nullable',
            'description_bengali' => 'nullable',
            'cost_price' => 'required',
            'sale_price' => 'required',
            'status' => 'required',
            'isbn_code' => 'nullable',
            'publishing_year' => 'nullable'
        ], [
            'category_id.required' => 'Please select the category of the book',
            'author_id.required' => 'Please select the author of the book',
            'name_english.required' => 'Please enter the name of this book',
            'cost_price.required' => 'Please enter the MRP of this book.',
            'sale_price.required' => 'Please enter the sale price of this book.',
            'status.required' => 'Please enter the sale price of this book.'
        ]);

        unset($updated_fields['author_id']);

        $book->update($updated_fields); //update fields in the database

        $book->authors()->sync($request->author_id);

        return Redirect::to(url('admin/book/' . $id)); //redirect
    }

    public function destroy($id)
    {
        $book = Book::find($id); // find book by it's id
        $book->delete(); // delete the record of the book from the database

        return Redirect::to(route('admin.book.index')); // redirect
    }

    // to get the upload page of the images of a particular book
    public function image_upload($id){
        $book = Book::find($id); //find the book by it's id
        $book_images = BookImage::where('book_id', $id)->get();

        return view('admin.book.image', ['book' => $book, 'book_images' => $book_images]); // return to the view page
    }

    // to store the image of a book while creation
    public function image_store(Request $request, $id) {
        $book = Book::find($id); //find book by it's id

        // validation code
        $fields = $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'images.required' => 'Please select atleast one image'
        ]);

        // image upload in storage and database
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image_path=$image->storePublicly('uploads/books/images','public');
                $book_images = BookImage::create([
                    'book_id' => $book->id,
                    'image' => $image_path,
                ]);
            }
        }

        return Redirect::to(route('admin.book.index')); //redirect

    }

    // to get the edit page of an image of a book
    public function image_edit($id, $image_id){
        $book = Book::find($id); // get the book by it's id
        $image = BookImage::find($image_id); //get the image by it's id
        return view('admin.book.image_edit', ['book' => $book, 'image' => $image]); // return to the view page
    }

    // to update the image of the book
    public function image_update(Request $request, $id, $image_id) {
        $image = BookImage::find($image_id); //find book by it's id
        // validation code
        $updated_field = $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        //update the image in the database
        if ($files = $request->file('image')) {
            Storage::disk('public')->delete($image->image ?? '');
            $updated_field['image'] = $files->storePublicly('uploads/books/images', 'public');
        }
        
        $image->update($updated_field); //update the records in the database

        return Redirect::to(url('admin/book/' . $id . '/image')); //redirect
    }

    // to delete the images of the book
    public function image_delete($id, $image_id){
        $image = BookImage::find($image_id);
        $image->delete();
        return Redirect::to(url('admin/book/' . $id . '/image')); //redirect
    }
    
    // ajax function to get the categories while creating a book
    public function get_category(Request $request){
        $data = [];
        if ($request->has('q')) {
            $data = Category::select('id', 'name_english')->where('name_english', 'LIKE', '%' . $request->q.'%')->get();
        }
        return response()->json($data); // return the data in json format
    }

    // ajax function to get the authors while creating a book
    public function get_author(Request $request){
        $data = [];
        if ($request->has('q')) {
            $data = Author::select('id', 'name_english')->where('name_english', 'LIKE', '%' . $request->q.'%')->get();
        }
        return response()->json($data); // return the data in json format

    }
}
