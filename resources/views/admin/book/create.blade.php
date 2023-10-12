@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <h2 class="pb-2 mb-3 bg-info py-1 px-2 text-white">Upload a new book</h2>
        <form class="p-4 bg-white shadow mb-3" action="{{ route('admin.book.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category:</label>
                        <select class="form-control" name="category_id" id="category_search" style="width:500px;"></select>
                            @error('category_id')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                      </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Author:</label>
                        <select class="form-control" multiple name="author_id[]" id="author_search" style="width:500px"></select>
                            @error('author_id')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                      </div>
                </div>
                <div class="col-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="TextInput" class="form-label">Name(Bengali):</label>
                        <input type="text" name="bengali_name" class="form-control" placeholder="বইয়ের নাম লিখুন">
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="TextInput" class="form-label">Name(Hindi):</label>
                        <input type="text" name="hindi_name" class="form-control" placeholder="Enter the name of the book in hindi">
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="TextInput" class="form-label">Name(English):</label>
                        <input type="text" name="english_name" class="form-control" placeholder="Enter the name of the book in english">
                            @error('english_name')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                    </div>
                </div>
                {{-- <div class="col-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="TextInput" class="form-label"> input</label>
                        <input type="text" name="name_" class="form-control" placeholder=" input" name="">
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description(Bengali):</label>
                        <textarea class="form-control" name="description_bengali" rows="2"></textarea>
                      </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description(Hindi):</label>
                        <textarea class="form-control" name="description_hindi" rows="2"></textarea>
                      </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description(English):</label>
                        <textarea class="form-control" name="description_english" rows="2"></textarea>
                      </div>
                </div>
                <div class="col-4 form-group">
                    <label for="inputAddress" class="form-label">Cost Price:</label>
                    <input type="text" class="form-control" name="cost_price">
                            @error('cost_price')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                </div>
                <div class="col-4 form-group">
                    <label for="inputAddress" class="form-label">Sale Price:</label>
                    <input type="text" class="form-control" name="sale_price">
                            @error('sale_price')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Stock:</label>
                        <select class="form-control" name="status">
                          <option value="in_stock">In Stock</option>
                          <option value="out_of_stock">Out of Stock</option>
                        </select>
                            @error('status')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                      </div>
                </div>
                <div class="col-6 form-group">
                    <label for="inputAddress" class="form-label">ISBN Code:</label>
                    <input type="text" class="form-control" name="isbn_code">
                </div>
                <div class="col-6 form-group">
                    <label for="inputAddress" class="form-label">Publishing Year:</label>
                    <input type="text" class="form-control" name="publishing_year">
                </div>
                {{-- <div class="col-12 form-group">
                    <label for="inputAddress2" class="form-label">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="col-md-6 form-group">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Example multiple select</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                </div> --}}
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
@endsection

@push('script-footer')
    <script>
        $(document).ready(function() {
            var path = "{{ url('admin/get_category') }}";
  
            $('#category_search').select2({
                // placeholder: 'Select the Category',
                ajax: {
                    url: path,
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name_english,
                                id: item.id
                            }
                        })
                    };
                    },
                    cache: true
                }
                });
        });
    </script>

<script>
    $(document).ready(function() {
        var path = "{{ url('admin/get_author') }}";

        $('#author_search').select2({
            ajax: {
                url: path,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name_english,
                            id: item.id
                        }
                    })
                };
                },
                cache: true
            }
            });
    });
</script>
@endpush