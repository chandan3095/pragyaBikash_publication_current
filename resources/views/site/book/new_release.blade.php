@extends('site.layout')
@section('site')
    <!-- upcoming books banner  -->
    <section class="upcoming_books_banner">
        <div class="container">
          <div class="author_banner_content">
            <h2 class="fs-1">New Release</h2>
            <p class="common_text_afterHeading text-center fw-light px-4">
              পশ্চিমবঙ্গের ও ভারতের অন্য যেসব বিশ্ববিদ্যালয়ে স্নাতক ও স্নাতকোত্তর
              স্তরে বাংলা সাহিত্যের পঠন-পাঠন চালু আছে, সেই- সব সংশ্লিষ্ট পাঠ্যসূচি
              অর্থাৎ সিলেবাসের কপি আমাদের কাছে পাওয়া যাবে
            </p>
          </div>
        </div>
      </section>
      <!-- upcoming books banner  -->
  
      <!-- upcoming books sec  -->
      <section class="coming_books-sec py-4">
        <div class="container">
          <div class="coming_books">
            <div class="row">
                @forelse ($data['new_release_books'] as $new_release_book)    
                @forelse ($new_release_book->books as $book)
                <div class="col-sm-6 col-md-6 col-lg-3 py-4">
                  <div class="coming_books_card">
                      
                    <a href="{{ route('book.view', ['slug' => $book->slug]) }}">
                        <div class="coming_book_img">
                            <img src="{{ asset('/storage/' . ($book->images[0]->image ?? '')) }}" alt=". . ." />
                          </div>
                          <div class="coming_book_details bg-light text-center">
                            <p class="m-0">{{ $book->bengali_name }}</p>
                            <p class="m-0">{{ $book->author->name_bengali }}</p>
                          </div>
                        </a>
                       
                  </div>
                </div>
                 @empty
                            <p>No Data Found</p>
                        @endforelse
                @empty
                    <p>No Books Found</p>
                @endforelse
            </div>
          </div>
        </div>
      </section>
      <!-- upcoming books sec  -->
@endsection