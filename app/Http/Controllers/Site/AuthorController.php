<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request,)
    {
        $authors = Author::with('books')->get(); 
        $pageno = $request->input('page', 12);

  
        $author_pag = Author::with('books')->paginate(
            8,
            ['*'],
            'page',
            $pageno
        );
        // dd($authors);
        dd($author_pag);
        return view('site.author.index', ['authors' => $authors, ]); //return to the view page
              // $allauthors = ceil(Author::where('category_id', $categories[0]->id)->get()->count() / 8);
        // dd($pageno);
    }
    //added by madhu
    public function paginate(Request $request,)
    {
        $allauthors =ceil( Author::with('books')->get()->count()/8); 
        $pageno = $request->input('page', 1);
    
        $authors = Author::with('books')->paginate(
            8,
            ['*'],
            'page',
            $pageno
        );
        // dd($pageno);
        // dd($allauthors);
    
        return view('site.author.index', compact('pageno','authors','allauthors'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
