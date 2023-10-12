@extends('site.layout')
@section('site')
    <!-- category search section  -->
    <!--<section class="search_category py-3">-->
    <!--    <div class="container">-->
    <!--        <div class="category_search_field">-->
    <!--            <form action="">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-sm-12 col-md-3 col-lg-3 pb-2">-->
    <!--                        <label for="SearchBook" class="text-secondary ps-1">Search Books</label>-->
    <!--                        <input type="text" name="book_search" id="book_search" placeholder="Search"-->
    <!--                            class="form-control" />-->
    <!--                    </div>-->
    <!--                    <div class="col-sm-12 col-md-3 col-lg-3 pb-2">-->
    <!--                        <label for="sortBook" class="text-secondary ps-1">Sort by</label>-->
    <!--                        <select name="book_sort" id="book_sort" class="form-select">-->
    <!--                            <option value="Newest" selected>-->
    <!--                                <span class="text-secondary">Newest</span>-->
    <!--                            </option>-->
    <!--                            <option value="Oldest">Oldest</option>-->
    <!--                            <option value="Price_low_to_high">Price Low to High</option>-->
    <!--                            <option value="Price_high_to_low">Price High to Low</option>-->
    <!--                        </select>-->
    <!--                    </div>-->
    <!--                    <div class="col-sm-12 col-md-3 col-lg-3 pb-2">-->
    <!--                        <label for="author" class="text-secondary ps-1">Author</label>-->
    <!--                        <select name="searchByAuthor" id="searchByAuthor" class="form-select">-->
    <!--                            <option value="Newest" selected>All Author</option>-->
    <!--                            <option value="author_1">D. Abantikumar Sannal</option>-->
    <!--                            <option value="author_2">D. Aloke Roy</option>-->
    <!--                            <option value="author_3">Asish Ghosh</option>-->
    <!--                        </select>-->
    <!--                    </div>-->
    <!--                    <div class="col-sm-12 col-md-3 col-lg-3 pb-2">-->
    <!--                        <div class="d-flex align-items-end h-100 book_search_btn">-->
    <!--                            <button class="w-100">Apply</button>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </form>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- category search section  -->

    <!-- category wise books search  -->
    <section class="category_books py-5">
        <div class="container">
            <h2 class="text-center pb-2 category_heading text-light">
                {{-- প্রাচীন ও মধ্যযুগের বাংলা সাহিত্য --}}
                {{-- //BELOW CODE ADDED BY MADHU  --}}
                {{ $categories[0]->name_bengali }}
            </h2>
            <div class="category_wise_books bg-light">
                <div class="row">
                    @forelse ($categories as $category)
                        {{-- @forelse ($category->books as $book) --}}
                        @forelse ($books as $book)
                            <div class="col-sm-6 col-md-4 col-lg-3 px-3 py-3">
                                <div class="books_category_card">
                                    <a href="{{ route('book.view', ['slug' => $book->slug]) }}">
                                        <div class="category_book_img">
                                            <img src="{{ asset('/storage/' . ($book->images[0]->image ?? '')) }}"
                                                alt=". . ." />
                                        </div>
                                        <div class="category_book_details">
                                            <p>{{ $book->bengali_name }}</p>
                                            @foreach ($book->authors as $author)
                                                <p>{{ $author->name_bengali }}</p>
                                            @endforeach

                                            <div class="d-flex justify-content-center gap-2">
                                                <p class="book_price">{{ $book->sale_price }}.00</p>
                                                <p class="text-danger text-decoration-line-through">
                                                    {{ $book->cost_price }}.00
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        @empty
                            <p>No Books for this Category</p>
                        @endforelse
                    @empty
                        <p>No Books found for this category</p>
                    @endforelse
                    {{-- below code added by madhu  --}}
                    <div style='display: flex;justify-content: space-between;'>


                        @if ($pageno > 1)
                            <a href="{{ route('book.category', ['name' => $categories[0]->name_english, 'page' => $pageno - 1]) }}"
                                class="btn btn-danger">Previous</a>
                        @endif
                        <div style='display: flex;gap:17px;'>
                            {{-- <a href="{{ route('book.category', ['name' => $categories[0]->name_english, 'page' => 1]) }}">{{pageno}}</a> --}}
                            @for ($i = 1; $i <= $allbooks; $i++)
                                <div class="page-item {{ $i == $pageno ? 'active' : '' }}" style='border: 2px solid #666;padding:12px; 
                                background-color:{{$i == $pageno?'red':''}}'>
                                    <a class="page-link"
                                        href="{{ route('book.category', ['name' => $categories[0]->name_english, 'page' => $i]) }}">{{ $i }}</a>
                                </div>
                            @endfor
                              </div>
                        @if ($pageno < $allbooks)
                            <a href="{{ route('book.category', ['name' => $categories[0]->name_english, 'page' => $pageno + 1]) }}"
                                class="btn btn-info">Next</a>
                        @endif
                    </div>
                    {{-- //books 
                      
                      
                      
                      [books=>books,category=>category]
                      
                      --}}
                    {{-- <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/book-2.jpg" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>ভারতচন্দ্রের অন্নদামঙ্গল কবি ও কাব্য (স)</p>
                      <p>ড. অলোক রায়</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/img-1.png" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>পদ্মাবতী সমীক্ষা (স)</p>
                      <p>ড. অমৃতলাল বালা</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/img-2.jpeg" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>নবসংস্করণ শাক্ত পদাবলী (স)</p>
                      <p>ড. অরুণকুমার বসু</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/img-3.jpg" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>নবসংস্করণ শাক্ত পদাবলী (স)</p>
                      <p>ড. অরুণকুমার বসু</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/book-1.jpg" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>নবসংস্করণ শাক্ত পদাবলী (স)</p>
                      <p>ড. অরুণকুমার বসু</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/book-2.jpg" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>নবসংস্করণ শাক্ত পদাবলী (স)</p>
                      <p>ড. অরুণকুমার বসু</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/img-3.jpg" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>নবসংস্করণ শাক্ত পদাবলী (স)</p>
                      <p>ড. অরুণকুমার বসু</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/img-1.png" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>নবসংস্করণ শাক্ত পদাবলী (স)</p>
                      <p>ড. অরুণকুমার বসু</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/img-2.jpeg" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>নবসংস্করণ শাক্ত পদাবলী (স)</p>
                      <p>ড. অরুণকুমার বসু</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/img-3.jpg" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>নবসংস্করণ শাক্ত পদাবলী (স)</p>
                      <p>ড. অরুণকুমার বসু</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-3 px-5 py-3">
                <div class="books_category_card">
                  <a href="./book_details.html">
                    <div class="category_book_img">
                      <img src="./assets/images/book-1.jpg" alt="" />
                    </div>
                    <div class="category_book_details">
                      <p>নবসংস্করণ শাক্ত পদাবলী (স)</p>
                      <p>ড. অরুণকুমার বসু</p>
                      <p class="book_price">₹ 200.00</p>
                    </div>
                  </a>
                </div>
              </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- category wise books search  -->
    {{-- added by madhu  --}}



    {{-- {{ $books->links() }} --}}
@endsection