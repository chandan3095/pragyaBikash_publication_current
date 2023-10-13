{{-- header starts here  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>প্রজ্ঞাবিকাশ পাবলিকেশন</title>

    <!-- bootstrap CDN  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <!-- Remix icon cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.min.css"
        integrity="sha512-13RM4Q4wPLiDEFNxKQbZMoyM3qR3eIsTYoXy6hJlqWmPzFCBLyxG3LGx/48N+sTcLxvN3IoThkZYxo3yuaGSvw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <!-- owl carousel cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />

    {{-- favicon icon  --}}

    <link rel="icon" type="image/x-icon" href="{{ asset('images/PLogo.png') }}">

    @stack('script-header')
</head>

<body>
    <!-- navigation section  -->
    <section class="navigation-bar">
        <div class="container">
            <div class="nav-bar">
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-2 col-lg-2">
                        <a href="{{ route('site.home') }}">
                            <div class="logo">
                                <img src="{{ asset('images/PLogo.png') }}" alt=". . ." class="img-fluid" />
                            </div>
                        </a>
                    </div>

                    <div class="col-2 col-sm-2 col-md-2 col-lg-7 navHide">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <ul class="navigation d-flex align-items-center gap-3 m-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        All Categories
                                    </a>
                                    <ul class="dropdown-menu">
                                        @forelse ($categories_ as $category)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('book.category', ['name' => $category->name_english]) }}">{{ $category->name_bengali }}</a>
                                            </li>
                                        @empty
                                            <p>No Category Found</p>
                                        @endforelse
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" aria-current="page"
                                        href="{{ route('author.index') }}">
                                        Authors</a>
                                    {{-- <div>{{request()->route()->uri}}</div> --}}
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('book.new_release') }}">New
                                        Release</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('book.index') }}">Book Listing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light"
                                        href="{{ asset('/images/Pragya_Publication_Catalogue.pdf') }}"
                                        download="{{ asset('/images/Pragya_Publication_Catalogue.pdf') }}">Catalogue</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-6 col-sm-7 col-md-7 col-lg-3 p-0">
                        <div class="search_book d-flex align-items-center h-100">
                            <i class="ri-search-line"></i>
                            {{-- added by madhu below code  --}}
                            @if (request()->route()->uri=='author')
                            <input 
                            onkeyup="searchAuthor(this)"
                             type="text" name="searchBook" id="searchBook"
                            placeholder="Search Author..." class="w-100" />
                                
                            @else
                            <input onkeyup="searchBook(this)" type="text" name="searchBook" id="searchBook"
                            placeholder="Search  Your Book..." class="w-100" />
                                
                            @endif
                           
                        </div>
                        <!-- @@flip search popup div begin -->
                        <div class="d-flex justify-content-center search_box_show" id="search_popup_div">
                            <div class="search_results">
                                <ul class="p-0 m-0" id="search_popup">
                                    <!-- <hr class="m-1" /> -->
                                    {{-- <li class="d-flex justify-content-center align-items-center">
                                    <div class="search_resilts_row d-flex gap-3">
                                        <img src="./assets/images/book-1.jpg" alt="" />
                                        <div class="d-flex align-items-center">
                                            <p class="m-0">Book's Name (Author's Name)</p>
                                        </div>
                                    </div>
                                </li>
                                <hr class="m-1" />
                                <li class="d-flex justify-content-center align-items-center">
                                    <div class="search_resilts_row d-flex gap-3">
                                        <img src="./assets/images/book-1.jpg" alt="" />
                                        <div class="d-flex align-items-center">
                                            <p class="m-0">Book's Name (Author's Name)</p>
                                        </div>
                                    </div>
                                </li>
                                <hr class="m-1" />
                                <li class="d-flex justify-content-center align-items-center">
                                    <div class="search_resilts_row d-flex gap-3">
                                        <img src="./assets/images/book-1.jpg" alt="" />
                                        <div class="d-flex align-items-center">
                                            <p class="m-0">Book's Name (Author's Name)</p>
                                        </div>
                                    </div>
                                </li>
                                <hr class="m-1" />
                                <li class="d-flex justify-content-center align-items-center">
                                    <div class="search_resilts_row d-flex gap-3">
                                        <img src="./assets/images/book-1.jpg" alt="" />
                                        <div class="d-flex align-items-center">
                                            <p class="m-0">Book's Name (Author's Name)</p>
                                        </div>
                                    </div>
                                </li>
                                <hr class="m-1" />
                                <li class="d-flex justify-content-center align-items-center">
                                    <div class="search_resilts_row d-flex gap-3">
                                        <img src="./assets/images/book-1.jpg" alt="" />
                                        <div class="d-flex align-items-center">
                                            <p class="m-0">Book's Name (Author's Name)</p>
                                        </div>
                                    </div>
                                </li>
                                <hr class="m-1" />
                                <li class="d-flex justify-content-center align-items-center">
                                    <div class="search_resilts_row d-flex gap-3">
                                        <img src="./assets/images/book-1.jpg" alt="" />
                                        <div class="d-flex align-items-center">
                                            <p class="m-0">Book's Name (Author's Name)</p>
                                        </div>
                                    </div>
                                </li> --}}
                                    <!-- <hr class="m-1" /> -->
                                </ul>
                            </div>
                        </div>
                        <!-- @@flip search popup div end -->
                        @include('site.scripts.search')
                        @include('site.scripts.authorsearch')
                    </div>



                    <div class="col-3 col-sm-2 col-md-2 col-lg-7 bigScreenHide">
                        <div class="d-flex justify-content-end h-100 align-items-center">
                            <button class="btn border py-1" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="ri-menu-line text-light fs-2"></i>
                            </button>

                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                                aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navigation m-0">
                                        <li class="nav-item dropdown p-3">
                                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                All Categories
                                            </a>
                                            <ul class="dropdown-menu">
                                                @forelse ($categories_ as $category)
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('book.category', ['name' => $category->name_english]) }}">{{ $category->name_bengali }}</a>
                                                    </li>
                                                @empty
                                                    <p>No Category Found</p>
                                                @endforelse
                                            </ul>
                                        </li>
                                        <li class="nav-item p-3">
                                            <a class="nav-link" aria-current="page"
                                                href="{{ route('author.index') }}">Authors</a>
                                        </li>
                                        <li class="nav-item p-3">
                                            <a class="nav-link" href="{{ route('book.new_release') }}">New
                                                Release</a>
                                        </li>
                                        <li class="nav-item p-3">
                                            <a class="nav-link" href="{{ route('book.index') }}">Book Listing</a>
                                        </li>
                                        <li class="nav-item p-3">
                                            <a class="nav-link text-light"
                                                href="{{ asset('/images/Pragya_Publication_Catalogue.pdf') }}"
                                                download="{{ asset('/images/Pragya_Publication_Catalogue.pdf') }}">Catalogue</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- navigation section  -->
    {{-- header ends here  --}}
    {{-- href="{{ url('/storage/' . Pragya_Publication_Catalogue.pdf) }}" --}}
    @yield('site')


    {{-- footer starts here  --}}
    <!-- footer section  -->
    <footer class="footer-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 d-flex align-items-center">
                    <div class="logo_social_links d-flex flex-column gap-4 pe-5">
                        <div class="d-flex">
                            <a href="{{ route('site.home') }}">
                                <div class="footer_logo">
                                    <img src="{{ asset('images/PLogo.png') }}" alt="..." />
                                </div>
                            </a>
                            <h4 class="footer_name">প্রজ্ঞাবিকাশ বামা পুস্তকালয়</h4>

                        </div>
                        <div>
                            <p class="text-white m-0">
                                ৪বি, রমানাথ মজুমদার স্ট্রিট, (দোতলায়) কলকাতা-৭০০০০৯,
                            </p>
                            <p class="text-white m-0">
                                ৭৫/১এ,হরিঘোষ স্ট্রিট, কলকাতা-৭০০০০৬
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="footer_content d-flex justify-content-center pt-5">
                        <div class="w-100">
                            <h5 class="footer_heading">Support</h5>
                            <ul class="footer_link">
                                <li>
                                    <a href="#form-sec" class="text-decoration-none text-white">Contact</a>
                                </li>
                                <li>
                                    <a href="{{ route('author.index') }}" class="text-white">Authors</a>
                                </li>
                                <li>
                                    <a href="{{ route('book.index') }}" class="text-white">Books Listing</a>
                                </li>
                                <li>
                                    <a href="{{ route('book.new_release') }}" class="text-white">New Release</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="copywrite d-flex flex-column justify-content-center align-items-center h-10">
                <hr class="w-100" />
                <p class="text-light text-center">
                    &copy;2023, PragyaBikash Publication, All Rights Reserved. -
                    Maintained by Web Idea Solution.
                </p>
            </div>
        </div>
    </footer>
    <!-- footer section  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- axios cdn  --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
@stack('script-footer')

</html>
{{-- footer ends here  --}}
