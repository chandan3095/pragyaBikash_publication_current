<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';
Route::get('/linkstorage', function () {
   Artisan::call('storage:link');
   dd(Artisan::output());
});
Route::get('/cache-clear', function () {
   Artisan::call('optimize:clear');
   dd(Artisan::output());
});


// Route::get('/', function () {
//     return view('Auth/Login');
// });
Route::get('/', [\App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.home');

// site book routes
Route::get('/book', [\App\Http\Controllers\Site\BookController::class, 'index'])->name('book.index');
Route::get('/book/{slug?}', [\App\Http\Controllers\Site\BookController::class, 'show'])->name('book.view');
//new release section
Route::get('/books/new-release/', [\App\Http\Controllers\Site\BookController::class, 'new_release'])->name('book.new_release');
Route::get('/books/category/{name}', [\App\Http\Controllers\Site\BookController::class, 'category'])->name('book.category');

// search 
Route::get('/search/{keyword}', [\App\Http\Controllers\Site\SearchController::class, 'search']);
// =================== 
Route::get('/author_search/{keyword}', [\App\Http\Controllers\Site\SearchController::class, 'author_search']);





// site author routes
// Route::get('/author', [\App\Http\Controllers\Site\AuthorController::class, 'index'])->name('author.index');
// added by madhu below code
Route::get('/author/', [\App\Http\Controllers\Site\AuthorController::class, 'index'])->name('author.index');

//axios store user enquiry
Route::post('/user-enquiry', [\App\Http\Controllers\Site\HomeController::class, 'user_enquiry'])->name('user_enquiry');

//axios store book enquiry
Route::post('/book-enquiry', [\App\Http\Controllers\Site\BookController::class, 'book_enquiry'])->name('book_enquiry');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['admin', 'verified'])->name('dashboard');

// admin routes start here
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



   //admin panel routes
   Route::get('/dashboard', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');

   //category routes
   // get all the categories
   Route::get('/category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
   // store the details of the category
   Route::post('/category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
   // edit the details of the category by it's id
   Route::get('/category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
   // update the records in the database by it's id
   Route::put('/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
   // delete a category by it's id
   Route::delete('/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.delete');

   //author routes
   // get all the authors
   Route::get('/author', [\App\Http\Controllers\Admin\AuthorController::class, 'index'])->name('author.index');
   // create author
   Route::get('/author/create', [\App\Http\Controllers\Admin\AuthorController::class, 'create'])->name('author.create');
   // store author
   Route::post('/author', [\App\Http\Controllers\Admin\AuthorController::class, 'store'])->name('author.store');
   // show author details by it's id
   Route::get('/author/{id}', [\App\Http\Controllers\Admin\AuthorController::class, 'show'])->name('author.show');
   // page for edit author
   Route::get('/author/edit/{id}', [\App\Http\Controllers\Admin\AuthorController::class, 'edit'])->name('author.edit');
   // update details by author
   Route::put('/author/{id}', [\App\Http\Controllers\Admin\AuthorController::class, 'update'])->name('author.update');

   //book routes
   // get all the books
   Route::get('/book', [\App\Http\Controllers\Admin\BookController::class, 'index'])->name('book.index');
   // create a book
   Route::get('/book/create', [\App\Http\Controllers\Admin\BookController::class, 'create'])->name('book.create');
   // store a book
   Route::post('/book', [\App\Http\Controllers\Admin\BookController::class, 'store'])->name('book.store');
   // show a book by it's id
   Route::get('/book/{id}', [\App\Http\Controllers\Admin\BookController::class, 'show'])->name('book.show');
   // edit a book by it's id
   Route::get('/book/edit/{id}', [\App\Http\Controllers\Admin\BookController::class, 'edit'])->name('book.edit');
   // update a book by it's id
   Route::put('/book/{id}', [\App\Http\Controllers\Admin\BookController::class, 'update'])->name('book.update');
   // delete a book
   Route::delete('/book/{id}', [\App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('book.delete');
   //image upload for book
   Route::get('book/{id}/image', [\App\Http\Controllers\Admin\BookController::class, 'image_upload'])->name('book.image.create');
   //image store for book
   Route::post('book/{id}/image', [\App\Http\Controllers\Admin\BookController::class, 'image_store'])->name('book.image.store');
   //image edit for book
   Route::get('book/{id}/image/edit/{image_id}', [\App\Http\Controllers\Admin\BookController::class, 'image_edit'])->name('book.image.edit');
   // image update for book
   Route::put('book/{id}/image/{image_id}', [\App\Http\Controllers\Admin\BookController::class, 'image_update'])->name('book.image.update');
   //image delete for book
   Route::delete('book/{id}/image/{image_id}', [\App\Http\Controllers\Admin\BookController::class, 'image_delete'])->name('book.image.delete');
   //ajax get category
   Route::get('/get_category', [\App\Http\Controllers\Admin\BookController::class, 'get_category'])->name('admin.get_category');
   //ajax get author
   Route::get('/get_author', [\App\Http\Controllers\Admin\BookController::class, 'get_author'])->name('admin.get_category');

   //user-enquiry route
   Route::get('/user-enquiry', [\App\Http\Controllers\Admin\EnquiryController::class, 'index'])->name('user_enquiry.index');
   Route::get('/user-enquiry/{id}', [\App\Http\Controllers\Admin\EnquiryController::class, 'show'])->name('user_enquiry.show');
   // delete an enquiry
   Route::delete('/user-enquiry/{id}', [\App\Http\Controllers\Admin\EnquiryController::class, 'destroy'])->name('user_enquiry.delete');
   //book-enquiry route
   Route::get('/book-enquiry', [\App\Http\Controllers\Admin\EnquiryController::class, 'book_enquiry_index'])->name('book_enquiry.index');
   Route::get('/book-enquiry/{id}', [\App\Http\Controllers\Admin\EnquiryController::class, 'book_enquiry_show'])->name('book_enquiry.show');
   //delete an enquiry
   Route::delete('/book-enquiry/{id}', [\App\Http\Controllers\Admin\EnquiryController::class, 'book_enquiry_destroy'])->name('book_enquiry.delete');
});
