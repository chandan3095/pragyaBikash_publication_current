@extends('site.layout')
@section('site')

<!-- banner section  -->
<section class="banner-sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="banner_text py-3">
                    {{-- <div class="banner_topImg">
                        <img src="{{ asset('images/banner-img-top.png') }}" alt="" />
                    </div> --}}
                    <div>
                        <h1>প্রজ্ঞাবিকাশ</h1>
                        <span class="fs-3"> বামা পুস্তকালয়</span>
                    </div>
                    <h3 class="">
                        পশ্চিমবঙ্গ সহ ভারতবর্ষের সমস্ত বিশ্ববিদ্যালয়েরঅনুমোদিত
                        পাঠক্রমের উপযোগী বাংলা স্নাতক, স্নাতকোত্তর ও গবেষণার জন্য
                        গ্রন্থসামগ্রী
                    </h3>

                    <div class="banner_subscribe_btn">
                        <a href="#form-sec"
                  ><button>
                    Subcribe here <i class="ri-arrow-right-s-line"></i></button
                ></a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="banner-img ps-4">
                    <img src="{{ asset('images/banner.jpg') }}" alt="" class="rounded-3" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner section  -->

<!-- learn language section  -->
<section class="learn_language py-5 bg-light">
    <div class="container">
        <h2 class="common_heading text-center">About Us</h2>
        <div class="d-flex justify-content-center">
            <p class="common_text_afterHeading text-center">
                আমাদের কাজ সেইসব মননযোগ্য, স্মরণযোগ্য, অনুশীলনযোগ্য, সমালোচনা,
                ভাষ্য, বিশ্লেষণ ও বিচার-সমীক্ষা-গ্রন্থ প্রকাশ করা। তরুণ প্রজন্মকে
                সেরা সাহিত্যের রসগ্রহণে সহায়তা করাই আমাদের ব্ৰত।
            </p>
        </div>
        <div class="language-sec-content px-5">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg 6">
                    <div class="language_img">
                        <img src="{{ asset('images/homePage_svg-1.png') }}" alt="" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg 6">
                    <div class="language_content">
                        <p class="language_text">
                            বিশ্ববিদ্যালয় অনুমোদিত পাঠ্যতালিকার দিকে লক্ষ্য রেখে কোনো
                            গবেষণা-সমৃদ্ধ মননধর্মী গ্রন্থ প্রকাশিত হলে, কোনো-কোনো মহলে
                            তাকে তির্যকভাবে 'অ্যাকাডেমিক', 'পাঠসহায়ক', 'নোটবই’ ইত্যাদি
                            শব্দে চিহ্নিত করা হয়
                        </p>
                        <p class="language_text">
                            বাংলা সাহিত্যের প্রাচীন, মধ্য ও আধুনিক যুগের যা কিছু গর্বের
                            সম্পদ, যা কিছু উৎকৃষ্ট সাহিত্যনিদর্শন, তাকে সর্বজনের কাছে তুলে
                            ধরার জন্যে, অনুশীলনের ও নিত্যপাঠের সম্মান দেওয়ার জন্যেই তো
                            বিশ্ববিদ্যালয়গুলি বেছে বেছে সেসব গ্রন্থসম্পদ পাঠ্যতালিকাভুক্ত
                            করেন। আর চিন্তাশীল গবেষক, মননজীবী অধ্যাপক, প্রাবন্ধিকরা
                            সেগুলির পরিচিতি সাধনের জন্য রচনা করে চলেছেন সে সবের উপর
                            উজ্জ্বল টীকাভাষ্য, সৌন্দর্য-বিশ্লেষণের পদ্ধতিবিদ্যা; প্রসারিত
                            করে চলেছেন জ্ঞানের দিগন্ত।
                        </p>
                        <p class="language_text">
                            আমাদের কাজ সেইসব মননযোগ্য, স্মরণযোগ্য, অনুশীলনযোগ্য, সমালোচনা,
                            ভাষ্য, বিশ্লেষণ ও বিচার-সমীক্ষা-গ্রন্থ প্রকাশ করা। তরুণ
                            প্রজন্মকে সেরা সাহিত্যের রসগ্রহণে সহায়তা করাই আমাদের ব্ৰত।
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- learn language section  -->

<!-- best selling books section  -->
<section class="best_selling_books py-5">
    <div class="container">
        <div class="common_heading">
            <h2 class="text-center text-light">Best Selling Books</h2>
        </div>
        <div class="d-flex justify-content-center">
            <p class="text-center common_text_afterHeading text-light">
                পশ্চিমবঙ্গের ও ভারতের অন্য যেসব বিশ্ববিদ্যালয়ে স্নাতক ও স্নাতকোত্তর
                স্তরে বাংলা সাহিত্যের পঠন-পাঠন চালু আছে, সেই- সব সংশ্লিষ্ট পাঠ্যসূচি
                অর্থাৎ সিলেবাসের কপি আমাদের কাছে পাওয়া যাবে।
            </p>
        </div>
        <div class="books_cards pt-5">
            <div class="row mt-5">
                @forelse ($data['best_selling_books'] as $book)
                {{-- @forelse ($best_selling_book->books as $book) --}}
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="{{ route('book.view', ['slug' => $book->slug]) }}" class="text-decoration-none">
                        <div class="best_selling_card px-3">

                            <div class="card_square_yellow">
                                <img src="{{ asset('/storage/' . ($book->images[0]->image ?? '')) }}" alt="" />
                            </div>
                            <div class="books_details py-3 text-center text-light">
                                <h5 class="book_name">{{ $book->bengali_name }}</h5>
                                @foreach ($book->authors as $author)
                                <span class="author_name">{{ $author->name_bengali }}</span>
                                @endforeach
                            </div>

                        </div>
                    </a>
                </div>
                {{-- @empty
                            No data found
                        @endforelse --}}
                @empty
                <p>No data found</p>
                @endforelse
                {{-- <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="best_selling_card px-3">
                  <div class="card_square_rose">
                    <img src="./assets/images/img-2.jpeg" alt="" />
                  </div>
                  <div class="books_details py-3 text-center text-light">
                    <h5 class="book_name">ভাষার ইতিহাস : ভাষাতত্ত্ব</h5>
                    <span class="author_name">তপনকুমার চট্টোপাধ্যায়</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="best_selling_card px-3">
                  <div class="card_square_yellow">
                    <img src="./assets/images/img-3.jpg" alt="" />
                  </div>
                  <div class="books_details py-3 text-center text-light">
                    <h5 class="book_name">সাহিত্য সন্দর্শন</h5>
                    <span class="author_name">শ্রীশচন্দ্র দাশ</span>
                  </div>
                </div>
              </div> --}}
            </div>
            <div class="py-4 d-flex justify-content-center align-items-center">
                <button class="common_btn"><a href="{{ route('book.index') }}">All Books</a></button>
            </div>
        </div>
    </div>
</section>
<!-- best selling books section  -->

<!-- authors section  -->
<section class="authors-sec py-5 bg-light">
    <div class="container">
        <div class="author_sec_content">
            <h2 class="common_heading">Our Authors</h2>
            <p class="common_text_afterHeading d-flex flex-wrap">
                আমাদের প্রকাশিত গ্রন্থ সম্পর্কে অধ্যাপক, শিক্ষার্থী, গবেষক ও উৎসাহী
                পাঠকদের কাছ থেকে যে-কোনও পরামর্শ, প্রস্তাব কিংবা সমালোচনা সানন্দে ও
                সাগ্রহে বিবেচিত হবে
            </p>
        </div>
        <div class="row pt-5">
            <div class="owl-carousel owl-theme" id="bestseller_carousel">
                @forelse ($authors as $author)
                <div class="col-sm-3 pt-5 w-100 d-flex justify-content-center">
                    <div class="author_card_link">
                        <a href="{{ route('author.index') }}">
                            <div class="author_card">
                                <img src="{{ asset('/storage/' . ($author->image ?? '')) }}" alt="..." />

                                <p class="authorSection_name fw-semibold m-0 text-center">
                                    {{ $author->name_english }}
                                </p>
                                <span>Author</span>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <p>No Author Details Found</p>
                @endforelse
                {{-- <div class="col-sm-3 pt-5 w-100 d-flex justify-content-center">
                <div class="author_card">
                  <img src="./assets/images/Alok_Roy.jpg" alt="" />
  
                  <p class="authorSection_name fw-semibold m-0">ড. অলোক রায়</p>
                  <span>Author</span>
                </div>
              </div>
              <div class="col-sm-3 pt-5 w-100 d-flex justify-content-center">
                <div class="author_card">
                  <img src="./assets/images/author-2.jpg" alt="" />
  
                  <p class="authorSection_name fw-semibold m-0">আশিস ঘোষ</p>
                  <span>Author</span>
                </div>
              </div>
              <div class="col-sm-3 pt-5 w-100 d-flex justify-content-center">
                <div class="author_card">
                  <img src="./assets/images/author-3.jpg" alt="" />
  
                  <p class="authorSection_name fw-semibold m-0">
                    মৃণাল বন্দ্যোপাধ্যায়
                  </p>
                  <span>Author</span>
                </div>
              </div>
              <div class="col-sm-3 pt-5 w-100 d-flex justify-content-center">
                <div class="author_card">
                  <img src="./assets/images/author-4.jpeg" alt="" />
  
                  <p class="authorSection_name fw-semibold m-0">
                    উমা বন্দ্যোপাধ্যায়
                  </p>
                  <span>Author</span>
                </div>
              </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- authors section  -->

<!-- upcomming books section  -->
<section class="upcomming_books py-5">
    <div class="container">
        <div class="upcoming_books_content">
            <h2 class="common_heading text-center text-light">Upcoming Books</h2>
            <div class="text-center d-flex justify-content-center text-light">
                <p class="common_text_afterHeading">
                    নবীন ও তরুণ গবেষকদের বিশ্ববিদ্যালয় স্বীকৃত সাহিত্যগবেষণা পত্রের
                    মুদ্রণ, ISBN-সহ প্রকাশ ও প্রচারে আমরা যথাসম্ভব সাহায্য করি।
                </p>
            </div>
            <div class="row py-5">
                <div class="owl-carousel owl-theme" id="upcoming_books_carousel">
                    @forelse ($data['upcoming_books'] as $book)
                    {{-- @forelse ($upcoming_book->books as $book) --}}
                    <div class="col-sm-12 col-md-6 col-lg-4 w-100">
                        <a href="{{ route('book.view', ['slug' => $book->slug]) }}" class="text-decoration-none">
                            <div class="upcoming_books_card d-flex justify-content-center align-items-center flex-column p-0">

                                <div class="upcoming_books_upper_claybg">
                                    <img src="{{ asset('/storage/' . ($book->images[0]->image ?? '')) }}" alt="" />
                                </div>
                                <div class="upcoming_books_lower text-center bg-light w-100 text-dark">
                                    <h5>{{ $book->bengali_name }}</h5>
                                    @foreach ($book->authors as $author)
                                    <span>{{ $author->name_bengali }}</span>
                                    @endforeach
                                </div>

                            </div>
                        </a>
                    </div>
                    {{-- @empty
                            @endforelse --}}
                    @empty
                    <p>No data found</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcomming books section  -->
<style>
    .enquiry-preloader{
        position: absolute;
        top: auto;
        left:50%;
        display: none;
        
    }
</style>
<div class="enquiry-preloader" id="enquiry-preloader">
    <img src="{{ asset('preloader/1481.gif') }}" alt="">
</div>


<!-- form section  -->
<section class="form-sec py-5 bg-light" id="form-sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form_content">
                    <h2 class="form_heading">
                        Fill in the form and we’ll get in touch with you.
                    </h2>
                    <form id="userDetailsForm" onsubmit="enquryFromSubmit(this)">
                        <div class="mb-4 pt-3">
                            <input type="text" name="name" id="name" placeholder="Your Name" class="form-control" />
                            <p><small class="text-danger" id="error-name"></small></p>

                        </div>
                        <div class="mb-4">
                            <input type="email" name="email" id="email" placeholder="Your Email" class="form-control" />
                            <p><small class="text-danger" id="error-email"></small></p>
                        </div>
                        <div class="mb-4">
                            <input type="text" name="phone" id="phone" placeholder="Your Phone No" class="form-control" />
                            <p><small class="text-danger" id="error-phone"></small></p>
                        </div>
                        <div class="mb-4">
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                            <p><small class="text-danger" id="error-message"></small></p>
                        </div>

                        <div class="py-4 d-flex align-items-center">
                            <button type="submit" class="common_btn px-5">SEND 
                               
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="address-sec">
                    <div class="addressContact">
                        <div class="address">
                            <h5 class="fw-bolder">Kolkata Office</h5>
                            <p>৯/৩, রমানাথ মজুমদার স্ট্রিট, কলকাতা-৭০০০০৯</p>
                        </div>
                        <div class="contact">
                            <h5 class="fw-bolder pb-2">Contact Us</h5>
                            <div class="contact_info">
                                <div class="contact_icon">
                                    <i class="ri-phone-line"></i>
                                </div>
                                <div class="contact_text">
                                    <p class="fw-semibold">৯৮৩০৮ ৪৯৩৪৮</p>
                                </div>
                            </div>
                            <div class="contact_info">
                                <div class="contact_icon">
                                    <i class="ri-mail-line"></i>
                                </div>
                                <div class="contact_text">
                                    <p>pragya.bikash@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- form section  -->

<!-- Include Bootstrap toast container -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Thank you for your interest</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            You'll hear from us soon!!!
        </div>
    </div>
</div>

@endsection

@push('script-header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush



@push('script-footer')
<script>

const enquryFromSubmit = (e) => {

var form = document.getElementById('userDetailsForm');
event.preventDefault();

const _token = "{{ csrf_token() }}";
var formData = new FormData(form);
formData.append('_token', _token);

console.log('formdata', ...formData);

const url = "{{ url('/user-enquiry') }}";
document.getElementById('enquiry-preloader').style.display='block'
axios.post(url, formData)
    .then(function (response) {
        const data=response.data
        // Handle success response
        // console.log(response.data);
        // alert("You'll get a response soon");
        // $('#toast').toast('show');
        alertify.set('notifier', 'position', 'top-center');
        alertify.success(data.message);
        document.getElementById('enquiry-preloader').style.display='none'
        form.reset();
        // alertify
        //     .alert("Data added successfully.", function() {
        //         alertify.message('OK');
        //     });
    })
    .catch(function (error) {
        //console.error(error);
        const errorMessages = error.response.data.errors
        console.log('error:', errorMessages)

        document.getElementById('error-name').innerHTML = (errorMessages['name'].join('<br>'))
        document.getElementById('error-email').innerHTML = (errorMessages['email'].join('<br>'))
        document.getElementById('error-phone').innerHTML = (errorMessages['phone'].join('<br>'))
        document.getElementById('error-message').innerHTML = (errorMessages['message'].join('<br>'))

    });


}

    
</script>
@endpush