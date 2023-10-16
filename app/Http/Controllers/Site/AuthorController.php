<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
   //added by madhu
   public function index(Request $request)
   {
      if (!empty($request->name)) {
         $authors = Author::where('name_bengali', 'like', "%{$request->name}%")
            ->orWhere('name_english', 'like',"%{$request->name}%")
            ->paginate(8);
      } else {
         $authors = Author::paginate(8);
      }
      return view('site.author.index', compact('authors'));
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
