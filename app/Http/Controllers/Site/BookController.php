<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookEnquiry;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookEnquiryMailable;

class BookController extends Controller
{
    public function index()
    {
        $categories = Category::with('books.authors', 'books.images')->get(); // get category
        // $categories = Category::with(['books' => function ($query) {
        //     $query->take(4); // Limit the number of related books to 4
        //     $query->with('authors', 'images');
        // }])->get();
        // dd($categories);
        return view('site.book.index', ['categories' => $categories]); // return view file
    }

    public function show($slug)
    {
        // dd($slug);
        $book = Book::where('slug', $slug)->with('category', 'authors', 'images')->first(); // get the book by it's slug
        // dd($book);
        $related_books = Book::whereRelation('category', 'name_english', $book->category->name_english)->with('authors', 'images')->take(6)->get(); // query to get related books from the same category
        return view('site.book.details', ['book' => $book, 'related_books' => $related_books]); // return view file
    }

    public function new_release()
    {
        $data = [];
        $data['new_release_books'] = Category::where('name_english', 'New Release')->with('books.author', 'books.images')->get(); // get new released books
        return view('site.book.new_release', ['data' => $data]); // return view file
    }

    public function category(Request $request, $name)
    {
        $pageno = $request->input('page', 1);
        $categories = Category::where('name_english', $name)->with('books.author', 'books.images')->get(); // get the categories
        //    added by madhu 
        $books = Book::where('category_id', $categories[0]->id)->paginate(
            8,
            ['*'],
            'page',
            $pageno
        );
        $allbooks = ceil(Book::where('category_id', $categories[0]->id)->get()->count() / 8);
        // dd($allbooks);
        //   dd($books->count());  
        //  $currentPage);
        // dd($pageno);


        return view('site.book.category', compact('books', 'categories', 'pageno', 'allbooks'));

        // dd($categories);
        // dd($books);
        // $category = Category::findOrFail($name);
        // $books = $category->books()->with('author', 'images')->paginate(8);
        // return view('site.book.category', ['categories' => $categories]); // return view file
    }

    public function book_enquiry(Request $request)
    {
        // form validation code
        $fields = $request->validate([
            'book_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'quantity' => 'nullable',
            'address' => 'required',
        ]);

        $book = Book::find($request->book_id);

        // create enquiry on book based
        $book_enquiry = BookEnquiry::create([
            'book_id' => $request->book_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'address' => $request->address,
        ]);

        // sent mail
        // $book_enquiry_mail_data = $request->all();
        // $book_enquiry_mail_data['book_name'] = $book->bengali_name;
        // dd($book_enquiry_mail_data);

        try {

            // Mail::raw('<h1>Hello, welcome to Laravel!</h1>', function ($message) use($user_enquiry) {
            //     $message
            //       ->to($user_enquiry->email)
            //       ->from('test@gmail.com')
            //       ->subject('Enquiry');
            //   });

            Mail::to('contact@pragyabikash.com')->send(new BookEnquiryMailable($book_enquiry->load('book')));
            return response(['status' => 'success', 'message' => 'Details has submitted successfully'], 200);
        } catch (\Throwable $th) {
            // throw $th;
            return response(['status' => 'failed', 'message' => 'Technical Issue'], 500);
        }
    }

}