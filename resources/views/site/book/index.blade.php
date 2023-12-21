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

    <!-- category wise book listing  -->
    <section class="book_listing_sec py-5">
        <div class="container">
            <h2 class=" category_heading text-center text-white">Book Listing</h2>
            <div class="book_listing">
                @foreach ($categories as $category) 
                {{-- ////BELOW CODE MODEFIED BY MADHU --}}
                    <div class="bg-light p-3">
                        <div class="d-flex justify-content-between">
                           <h5 class="fw-bold">{{ $category->name_bengali }}</h5>
                        {{-- <button> Show More... book.category</button> --}}
                        @if ($category->name_english)
                            <a href="{{ route('book.category', ['name' => $category->name_english]) }}" class="btn" style="background:var(--text-button-color);color:#fff;">Show
                                More</a> 
                        @endif
                        </div>


                        <hr />

                        <div class="row">
                            @forelse ($category->books->take(8) as $book)
                                <div class="col-sm-6 col-md-4 col-lg-3 pb-4">
                                    <div class="book_listing_card">
                                        <a href="{{ route('book.view', ['slug' => $book->slug]) }}">
                                            <div class="coming_book_img">
                                                <img src="{{ asset('/storage/' . ($book->images[0]['image'] ?? '')) }}"
                                                    alt=". . ." />
                                            </div>
                                            <div class="coming_book_details bg-light text-center">
                                                <p class="m-0">{{ $book->bengali_name }} 
                                                </p>
                                                <p class="text-lowercase">({{ $book->english_name }})</p>
                                                @foreach ($book->authors as $author)
                                                    <p class="m-0">{{ $author->name_bengali }} </p>
                                                @endforeach
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <p>No Book Found For This Category</p>
                            @endforelse
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- category wise book listing  -->
@endsection
