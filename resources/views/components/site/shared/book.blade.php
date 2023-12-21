@props(['book'])

 

    <div class="col-sm-6 col-md-4 col-lg-3 px-3 py-3">
        <div class="books_category_card">
            <a href="{{ route('book.view', ['slug' => $book->slug ?? '']) }}">
                <div class="category_book_img">
                    <img src="{{ asset('/storage/' . ($book->images[0]->image ?? '')) }}"
                        alt=". . ." />
                </div>
                <div class="category_book_details">
                    <p>{{ $book->bengali_name }}</p>
                    <p>{{ $book->english_name }}</p>
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
 