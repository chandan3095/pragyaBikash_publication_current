<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request,$keyword){
        // $query = $request->get('query');
        $query = $keyword;
        
        $suggestions = Book::where('english_name', 'like', "%$query%")->with('images','author')
        ->orWhere('bengali_name', 'like', "%$query%")
        ->orWhere('publishing_year', 'like', "%$query%")
        ->get();

        return response()->json($suggestions);
    }
    public function author_search(Request $request,$keyword){
        // $query = $request->get('query');
        // $query = $keyword;
        
        $authors = Author::where('name_english', 'like', "%$keyword%")
        // ->with('images','author')
        ->orWhere('name_bengali', 'like', "%$keyword%")
        // ->orWhere('publishing_year', 'like', "%$keyword%")
        ->get();

        return response()->json(['authors'=>$authors]);
    }

}
