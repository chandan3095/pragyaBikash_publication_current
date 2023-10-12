<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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

}
