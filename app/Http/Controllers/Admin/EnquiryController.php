<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookEnquiry;
use App\Models\UserEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EnquiryController extends Controller
{
    public function index()
    {
        $user_enquiries = UserEnquiry::all(); // to get all the enquiries
        return view('admin.enquiry.user_enquiry.index', ['user_enquiries' => $user_enquiries]); // redirect to view file
    }

    public function show($id)
    {
        $enquiry = UserEnquiry::find($id); // find user enquiry by it's id
        return view('admin.enquiry.user_enquiry.show', ['enquiry' => $enquiry]); // redirect to view file
    }

    public function destroy($id)
    {
        $enquiry = UserEnquiry::find($id); // find user enquiry by it's id

        $enquiry->delete(); // delete the enquiry from the database
        return Redirect::to(route('admin.user_enquiry.index')); // redirect route
    }

    public function book_enquiry_index(){
        $book_enquiries = BookEnquiry::with('book')->get(); // get all the book enquiries
        return view('admin.enquiry.book_enquiry.index', ['book_enquiries' => $book_enquiries]); // redirect to view file
    }

    public function book_enquiry_show($id){
        $enquiry = BookEnquiry::where('id', $id)->with('book')->get()->first(); // get the enquiry by it's id
        return view('admin.enquiry.book_enquiry.show', ['enquiry' => $enquiry]); // redirect to view file
    }

    public function book_enquiry_destroy($id){
        $enquiry = BookEnquiry::find($id);

        $enquiry->delete();
        return Redirect::to(route('admin.book_enquiry.index'));
    }
}
