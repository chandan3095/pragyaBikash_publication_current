<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\UserEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquiryMailable;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $authors = Author::all(); // get the details of all the authors
        $data['best_selling_books'] = Book::whereRelation('category','name_english','Best Selling')->with('authors','images')->take(3)->get() ; // data of best selling books
        $data['upcoming_books'] = Book::whereRelation('category','name_english','Upcoming')->with('authors', 'images')->take(4)->get(); // data of upcoming books
        return view('site.home', ['authors' => $authors, 'data' => $data]); // redirect to the view file 
    }

    public function user_enquiry(Request $request) {
        // validation code
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'message' => 'required',
        ]);

        // create new user enquiry
            $user_enquiry = UserEnquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);
          
            // sent mail

            try {
           
            // Mail::raw('<h1>Hello, welcome to Laravel!</h1>', function ($message) use($user_enquiry) {
            //     $message
            //       ->to($user_enquiry->email)
            //       ->from('test@gmail.com')
            //       ->subject('Enquiry');
            //   });

            Mail::to('contact@pragyabikash.com')->send(new EnquiryMailable($user_enquiry));
            return response(['status'=>'success','message'=>'Details has submitted successfully'],200);
            } catch (\Throwable $th) {
                // throw $th;
                return response(['status'=>'failed','message'=>$th],500);
            }

    }
    
}
