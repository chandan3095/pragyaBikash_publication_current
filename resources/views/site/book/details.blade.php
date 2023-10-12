@extends('site.layout')
@section('site')

    <!-- books details section  -->
    <section class="books_details_sec py-3">
        <div class="container">
            <div class="book_details bg-light p-3">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-5 p-0">
                        <div class="detail_books_topSm">
                            <h4>{{ $book->bengali_name }}</h4>
                            <span class="stock">{{ $book->status == 'in_stock' ? 'In Stock' : 'Out of Stock' }}</span>
                        </div>
                        <div class="description_books d-flex gap-2">
                            <div class="books_imgs">
                                @if (!empty($book->images))
                                    @php
                                        $count = 0;
                                    @endphp
                                    @forelse ($book->images as $image)
                                        <img src="{{ asset('/storage/' . ($image->image ?? '')) }}" alt=". . ."
                                            class="preview_img" onclick="hoverImg(id)" id="{{ $count++ }}" />
                                    @empty
                                        <p>No Image Found For This Book</p>
                                    @endforelse
                                @else
                                    <p>No Image Found</p>
                                @endif
                            </div>
                            <div class="book_details_img">
                                <span class="discount">{{ round(100 - (100 * $book->sale_price) / $book->cost_price) }}%
                                    Discount</span>
                                <img src="{{ asset('/storage/' . ($book->images[0]->image ?? '')) }}" alt=". . ."
                                    class="w-100 h-100 previewon_hover" id="bigImg" />

                                <span class="onhover_details onhover_active">
                                    @foreach ($book->authors as $author)
                                        <h5 class="Author_name">{{ $author->name_bengali }} <br> <br></h5>
                                    @endforeach
                                    <p class="author_content">
                                        <strong>{{ $book->category->name_bengali }}</strong>
                                    </p>
                                </span>

                                <span class="author_details">Details<i class="ri-information-line ps-1"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <div class="book_details_content">
                            <!--<h4>{{ $book->bengali_name }}</h4>-->
                            <!--<span class="stock">{{ $book->status == 'in_stock' ? 'In Stock' : 'Out of Stock' }}</span>-->

                            <div class="detail_books">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ $book->bengali_name }}</h4>

                                    <button type="button" class="btn btn-outline-secondary border-none"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Get This Book
                                    </button>

                                </div>
                                <span class="stock">{{ $book->status == 'in_stock' ? 'In Stock' : 'Out of Stock' }}</span>
                            </div>
                            <div class="book_description_field p-5">
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <span class="book_details_heading">Category Name</span>
                                    <span>{{ $book->category->name_bengali }}</span>
                                </div>
                                <hr />
                                <!--<div class="d-flex justify-content-between">-->
                                <!--    <span>Book Details</span>-->
                                <!--    <span>{{ $book->description_bengali }}</span>-->
                                <!--</div>-->
                                <!--<hr />-->
                                <div class="active_smScreen">
                                    <div class="d-flex justify-content-between">
                                        <span class="book_details_heading">Author Name</span>
                                        @foreach ($book->authors as $author)
                                            <span>{{ $author->name_bengali }}</span>
                                        @endforeach
                                    </div>
                                    <hr />
                                    <div class="d-flex justify-content-between">
                                        <span class="book_details_heading">Author Details</span>
                                        <span>{{ $book->category->name_bengali }}</span>
                                    </div>
                                    <hr />
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="book_details_heading">Cost Price</span>
                                    <span class="Price">₹ {{ $book->cost_price }}.00</span>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <span class="book_details_heading">Sale Price</span>
                                    <span class="Price">₹ {{ $book->sale_price }}.00</span>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <span class="book_details_heading">Publishing Year</span>
                                    <span>{{ $book->publishing_year }}</span>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <span class="book_details_heading">ISBN Code</span>
                                    <span>{{ $book->isbn_code }}</span>
                                </div>
                                <hr />
                            </div>
                        </div>

                        {{-- Modal --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Book Enquiry</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" id="bookEnquiryForm">
                                            <div class="mb-1">
                                                <label for="name" class="form-label w-100">Name :
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        required>
                                                </label>
                                            </div>

                                            <div class="mb-1">
                                                <label for="Name" class="form-label">Email :</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    required>
                                            </div>

                                            <div class="mb-1">
                                                <label for="Name" class="form-label">Contact :</label>
                                                <input type="text" name="phone" id="phone" class="form-control"
                                                    required>
                                                <div>
                                                      <p class="text-danger belownone" id="contact">Phone Number is Below 10 Digits</p>
                                                      <p class="text-danger belownone" id=contact1>Phone Number exceeding 10 Digits</p>
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="Name" class="form-label">Quantity :</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="number" name="quantity" id="quantity" min="0"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="Name" class="form-label">Address :</label>
                                                <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
                                            </div>

                                            <div class="modal-footer border-top-0">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- Modal End  --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- books details section  -->

 <!-- related products section  -->
 <section class="related_product_sec py-5">
    <div class="container">
       <div class="related_products_container bg-light p-3">
          <h4 class="common_heading">Related Books</h4>
          <hr />
 
 
          <div class="forDesktopShow">
             <div class="row">
                @forelse ($related_books as $related_book)
                {{-- {{ dd($related_book) }} --}}
                <div class="col-sm-12 col-md-4 col-lg-4">
                   <div class="related_product_card">
                      <div class="related_product_bookImg">
                         <a href="{{ route('book.view', ['slug' => $related_book->slug]) }}" class="text-decoration-none">
                            <div class="card mb-3" style="max-width: 540px">
                               <div class="row g-0">
                                  <div class="col-sm-12 col-md-4 col-lg-4">
                                     <div class="related_book_img w-100">
                                        <img src="{{ asset('/storage/' . ($related_book->images[0]['image'] ?? '')) }}" class="img-fluid rounded-start h-100" alt="..." />
                                     </div>
                                  </div>
                                  <div class="col-sm-12 col-md-8 col-lg-8">
                                     <div class="card-body">
                                        <h5 class="card-title">{{ $related_book->bengali_name }}</h5>
                                        @foreach ($related_book->authors as $author)
                                        <p class="m-0">{{ $author->name_bengali }}</p>
                                        @endforeach
                                        <p class="card-text">
                                           <small class="book_price">₹
                                              {{ $related_book->cost_price }}.00</small>
                                        </p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </a>
                      </div>
                   </div>
                </div>
                @empty
                <p>No More Book For This Category Found</p>
                @endforelse
             </div>
          </div>
 
          <!-- for Small devices  -->
 
          <div class="forsmDevices">
             <div class="row">
                 @forelse ($related_books as $related_book)
                <div class="col-sm-12 col-md-4 col-lg-4 pb-3">
                   <div class="related_cards">
                       <a href="{{ route('book.view', ['slug' => $related_book->slug]) }}" class="text-decoration-none">
                      <div class="card">
                         <div class="related_book_img_forSM w-100">
                                        <img src="{{ asset('/storage/' . ($related_book->images[0]['image'] ?? '')) }}" class="img-fluid rounded-start h-100 w-100" alt="..." />
                                     </div>
                         <div class="card-body text-center">
                            <h5 class="card-title">{{ $related_book->bengali_name }}</h5>
                            @foreach ($related_book->authors as $author)
                            <p>{{ $author->name_bengali }}</p>
                            @endforeach
                            <p class="card-text">
                               <small class="book_price">{{ $related_book->cost_price }}.00</small>
                            </p>
                         </div>
                      </div>
                      </a>
                   </div>
                </div>
                @empty
                <p>No More Book For This Category Found</p>
                @endforelse
             </div>
          </div>
       </div>
    </div>
 </section>
     <!-- related products section  -->

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

@push('script-footer')
    <script>
        var form = document.getElementById('bookEnquiryForm');
        var contactText=document.getElementById('contact')
        var contact1=document.getElementById('contact1')

        form.addEventListener('submit', function(event) {
            event.preventDefault();


            const _token = "{{ csrf_token() }}";
            var formData = new FormData(form);

            var phone= formData.get("phone");
            const validatePhone=(phone)=>{
               if(phone.length < 10){
                   contactText.classList.remove('belownone')
                  contactText.classList.add('belowShow')
               }else if(phone.length > 10){
                  contact1.classList.remove('belownone')
                  contact1.classList.add('belowShow')
               }
               else{
                    var book_id = {{ $book->id }};
            formData.append('_token', _token);
            formData.append('book_id', book_id);

            console.log('formdata', ...formData);
            

            const url = "{{ url('/book-enquiry') }}";
            axios.post(url, formData)
                .then(function(response) {
                    $('#toast').toast('show');
                    form.reset();
                    $('#exampleModal').modal('hide');
                })
                .catch(function(error) {
                    console.error(error);
                });
               }
            }

          validatePhone(phone)
        });
    </script>
@endpush
