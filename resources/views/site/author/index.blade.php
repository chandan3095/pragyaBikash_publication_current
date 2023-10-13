@extends('site.layout')
@section('site')
    <!-- authors banner  -->
    <section class="author_banner">
        <div class="container">
            <div class="author_banner_content">
                <h2>Authors</h2>
                <p class="common_text_afterHeading text-center fw-light">
                    পশ্চিমবঙ্গের ও ভারতের অন্য যেসব বিশ্ববিদ্যালয়ে স্নাতক ও স্নাতকোত্তর
                    স্তরে বাংলা সাহিত্যের পঠন-পাঠন চালু আছে, সেই- সব সংশ্লিষ্ট পাঠ্যসূচি
                    অর্থাৎ সিলেবাসের কপি আমাদের কাছে পাওয়া যাবে
                </p>
            </div>
        </div>
    </section>
    <!-- authors banner  -->

    <!-- author wise books -->
    <section class="author_books_sec py-4">
        <div class="container">
            <h2 class="common_heading text-center">All Authors</h2>
            <div class="author_books">
                <div class="row py-4">
                    @forelse ($authors as $author)
                        <div class="col-sm-12 col-md-6 col-lg-3 pb-5">
                            <div class="author_wise_books_card bg-light">
                                <div class="py-4">
                                    <div class="d-flex justify-content-between align-items-center gap-3 px-4">
                                        <div class="bookwiseAuthorImage">
                                            <img src="{{ asset('/storage/' . ($author->image ?? '')) }}" alt=". . ." />
                                        </div>
                                        <div class="bookwiseAuthorName">
                                            <h6 class="fw-bold text-secondary">
                                                {{ $author->name_bengali }}
                                            </h6>
                                        </div>
                                    </div>
                                    {{-- <div
                          class="d-flex justify-content-center py-3 px-4 bookSearchbar"
                        >
                          <input
                            type="text"
                            name="books"
                            id="books"
                            placeholder="Search Books..."
                            class="w-100"
                          />
                        </div> --}}
                                    <hr>
                                    <ul class="authorwisebookslist">
                                        @forelse ($author->books as $book)
                                            <li>
                                                <a href="{{ route('book.view', ['slug' => $book->slug]) }}"
                                                    class="fw-semibold">{{ $book->bengali_name }}</a>
                                            </li>
                                        @empty
                                        @endforelse
                                        {{-- <div class="commented-li">
                                            // below
                                        </div> --}}
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    @empty
                    @endforelse


                    <div style='display: flex;justify-content: space-between;'>


                      @if ($pageno > 1)
                          <a href="{{ route('author.index', [ 'page' => $pageno - 1]) }}"
                              class="btn btn-danger">Previous</a>
                      @endif
                      <div style='display: flex;gap:17px;'>
                          {{-- <a href="{{ route('author.index', [ 'page' => 1]) }}">{{pageno}}</a> --}}
                          @for ($i = 1; $i <= $allauthors; $i++)
                              <div class="page-item {{ $i == $pageno ? 'active' : '' }}"
                                  style='border: 2px solid #666;padding:12px; 
                              background-color:{{ $i == $pageno ? 'pink' : '' }}'>
                                  <a class="page-link"
                                      href="{{ route('author.index', [ 'page' => $i]) }}">{{ $i }}</a>
                              </div>
                          @endfor
                      </div>
                      @if ($pageno < $allauthors)
                          <a href="{{ route('author.index', [ 'page' => $pageno + 1]) }}"
                              class="btn btn-info">Next</a>
                      @endif
                  </div>
                    {{-- <div style="height: 1rem; background-color: red;">{{ $authors->links() }}</div> --}}
         
                    {{-- <div class="commented">
                        //below
                    </div> --}}
                </div>
            </div> 
            
        </div>
    </section> 
    <!-- author wise books -->
@endsection

<div class="commented-li">
    {{-- <li>
                            <a href="#" class="fw-semibold"
                              >নবসংস্করণ শাক্ত পদাবলী (স)</a
                            >
                          </li>
                          <li>
                            <a href="#" class="fw-semibold"
                              >নবসংস্করণ শাক্ত পদাবলী (স)</a
                            >
                          </li>
                          <li>
                            <a href="#" class="fw-semibold"
                              >নবসংস্করণ শাক্ত পদাবলী (স)</a
                            >
                          </li>
                          <li>
                            <a href="#" class="fw-semibold"
                              >নবসংস্করণ শাক্ত পদাবলী (স)</a
                            >
                          </li>
                          <li>
                            <a href="#" class="fw-semibold"
                              >নবসংস্করণ শাক্ত পদাবলী (স)</a
                            >
                          </li>
                          <li>
                            <a href="#" class="fw-semibold"
                              >নবসংস্করণ শাক্ত পদাবলী (স)</a
                            >
                          </li>
                          <li>
                            <a href="#" class="fw-semibold"
                              >নবসংস্করণ শাক্ত পদাবলী (স)</a
                            >
                          </li>
                          <li>
                            <a href="#" class="fw-semibold"
                              >নবসংস্করণ শাক্ত পদাবলী (স)</a
                            >
                          </li>
                          <li>
                            <a href="#" class="fw-semibold"
                              >নবসংস্করণ শাক্ত পদাবলী (স)</a
                            >
                          </li> --}}
</div>
<div class="commented-below">
    {{-- <div class="col-sm-12 col-md-6 col-lg-3 pb-5">
                <div class="author_wise_books_card bg-light">
                  <div class="py-4">
                    <div
                      class="d-flex justify-content-between align-items-center gap-3 px-4"
                    >
                      <div class="bookwiseAuthorImage">
                        <img src="./assets/images/author-2.jpg" alt="" />
                      </div>
                      <div class="bookwiseAuthorName">
                        <h6 class="fw-bold text-secondary">
                          D. Abanti Kumar Sanyal
                        </h6>
                      </div>
                    </div>
                    <div
                      class="d-flex justify-content-center py-3 px-4 bookSearchbar"
                    >
                      <input
                        type="text"
                        name="books"
                        id="books"
                        placeholder="Search Books..."
                        class="w-100"
                      />
                    </div>
  
                    <ul class="authorwisebookslist">
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="col-sm-12 col-md-6 col-lg-3 pb-5">
                <div class="author_wise_books_card bg-light">
                  <div class="py-4">
                    <div
                      class="d-flex justify-content-between align-items-center gap-3 px-4"
                    >
                      <div class="bookwiseAuthorImage">
                        <img src="./assets/images/author-3.jpg" alt="" />
                      </div>
                      <div class="bookwiseAuthorName">
                        <h6 class="fw-bold text-secondary">
                          D. Abanti Kumar Sanyal
                        </h6>
                      </div>
                    </div>
                    <div
                      class="d-flex justify-content-center py-3 px-4 bookSearchbar"
                    >
                      <input
                        type="text"
                        name="books"
                        id="books"
                        placeholder="Search Books..."
                        class="w-100"
                      />
                    </div>
  
                    <ul class="authorwisebookslist">
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="col-sm-12 col-md-6 col-lg-3 pb-5">
                <div class="author_wise_books_card bg-light">
                  <div class="py-4">
                    <div
                      class="d-flex justify-content-between align-items-center gap-3 px-4"
                    >
                      <div class="bookwiseAuthorImage">
                        <img
                          src="./assets/images/Abanti_Kumar_Sanyal.jpg"
                          alt=""
                        />
                      </div>
                      <div class="bookwiseAuthorName">
                        <h6 class="fw-bold text-secondary">
                          D. Abanti Kumar Sanyal
                        </h6>
                      </div>
                    </div>
                    <div
                      class="d-flex justify-content-center py-3 px-4 bookSearchbar"
                    >
                      <input
                        type="text"
                        name="books"
                        id="books"
                        placeholder="Search Books..."
                        class="w-100"
                      />
                    </div>
  
                    <ul class="authorwisebookslist">
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="col-sm-12 col-md-6 col-lg-3 pb-5">
                <div class="author_wise_books_card bg-light">
                  <div class="py-4">
                    <div
                      class="d-flex justify-content-between align-items-center gap-3 px-4"
                    >
                      <div class="bookwiseAuthorImage">
                        <img
                          src="./assets/images/Abanti_Kumar_Sanyal.jpg"
                          alt=""
                        />
                      </div>
                      <div class="bookwiseAuthorName">
                        <h6 class="fw-bold text-secondary">
                          D. Abanti Kumar Sanyal
                        </h6>
                      </div>
                    </div>
                    <div
                      class="d-flex justify-content-center py-3 px-4 bookSearchbar"
                    >
                      <input
                        type="text"
                        name="books"
                        id="books"
                        placeholder="Search Books..."
                        class="w-100"
                      />
                    </div>
  
                    <ul class="authorwisebookslist">
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="col-sm-12 col-md-6 col-lg-3 pb-5">
                <div class="author_wise_books_card bg-light">
                  <div class="py-4">
                    <div
                      class="d-flex justify-content-between align-items-center gap-3 px-4"
                    >
                      <div class="bookwiseAuthorImage">
                        <img
                          src="./assets/images/Abanti_Kumar_Sanyal.jpg"
                          alt=""
                        />
                      </div>
                      <div class="bookwiseAuthorName">
                        <h6 class="fw-bold text-secondary">
                          D. Abanti Kumar Sanyal
                        </h6>
                      </div>
                    </div>
                    <div
                      class="d-flex justify-content-center py-3 px-4 bookSearchbar"
                    >
                      <input
                        type="text"
                        name="books"
                        id="books"
                        placeholder="Search Books..."
                        class="w-100"
                      />
                    </div>
  
                    <ul class="authorwisebookslist">
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="col-sm-12 col-md-6 col-lg-3 pb-5">
                <div class="author_wise_books_card bg-light">
                  <div class="py-4">
                    <div
                      class="d-flex justify-content-between align-items-center gap-3 px-4"
                    >
                      <div class="bookwiseAuthorImage">
                        <img
                          src="./assets/images/Abanti_Kumar_Sanyal.jpg"
                          alt=""
                        />
                      </div>
                      <div class="bookwiseAuthorName">
                        <h6 class="fw-bold text-secondary">
                          D. Abanti Kumar Sanyal
                        </h6>
                      </div>
                    </div>
                    <div
                      class="d-flex justify-content-center py-3 px-4 bookSearchbar"
                    >
                      <input
                        type="text"
                        name="books"
                        id="books"
                        placeholder="Search Books..."
                        class="w-100"
                      />
                    </div>
  
                    <ul class="authorwisebookslist">
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="col-sm-12 col-md-6 col-lg-3 pb-5">
                <div class="author_wise_books_card bg-light">
                  <div class="py-4">
                    <div
                      class="d-flex justify-content-between align-items-center gap-3 px-4"
                    >
                      <div class="bookwiseAuthorImage">
                        <img
                          src="./assets/images/Abanti_Kumar_Sanyal.jpg"
                          alt=""
                        />
                      </div>
                      <div class="bookwiseAuthorName">
                        <h6 class="fw-bold text-secondary">
                          D. Abanti Kumar Sanyal
                        </h6>
                      </div>
                    </div>
                    <div
                      class="d-flex justify-content-center py-3 px-4 bookSearchbar"
                    >
                      <input
                        type="text"
                        name="books"
                        id="books"
                        placeholder="Search Books..."
                        class="w-100"
                      />
                    </div>
  
                    <ul class="authorwisebookslist">
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                      <li>
                        <a href="#" class="fw-semibold"
                          >নবসংস্করণ শাক্ত পদাবলী (স)</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div> --}}
</div>
