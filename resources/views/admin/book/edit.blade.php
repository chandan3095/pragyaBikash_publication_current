@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <h2 class="pb-2 mb-3 bg-info py-1 px-2 text-white">Upload a new book</h2>
        <form class="p-4 bg-white shadow mb-3" action="{{ route('admin.book.update', ['id' => $book->id]) }}" method="POST" enctype="multipart/form-data">
            {{ @csrf_field() }}
             @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category:</label>
                        <select class="form-control" name="category_id" id="category_search" style="width:500px;">
                            @foreach($categories as $category)
                                <option value="{{ $book->category_id }}" >{{ $category->name_english }}</option>
                            @endforeach
                        </select>
                            @error('category_id')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                      </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Author:</label>
                        <select class="form-control" name="author_id[]" multiple id="author_search" style="width:500px">
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ in_array($author->id, $book->authors->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $author->name_english }}</option>
                            @endforeach
                        </select>
                            @error('author_id')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                      </div>
                </div>
                <div class="col-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="TextInput" class="form-label">Name(Bengali):</label>
                        <input type="text" name="bengali_name" class="form-control" placeholder="বইয়ের নাম লিখুন" value="{{ $book->bengali_name }}">
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="TextInput" class="form-label">Name(Hindi):</label>
                        <input type="text" name="hindi_name" class="form-control" placeholder="Enter the name of the book in hindi" value="{{ $book->hindi_name }}">
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="TextInput" class="form-label">Name(English):</label>
                        <input type="text" name="english_name" class="form-control" placeholder="Enter the name of the book in english" value="{{ $book->english_name }}">
                            @error('name_english')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description(Bengali):</label>
                        <textarea class="form-control" name="description_bengali" rows="2">{{ $book->description_bengali }}</textarea>
                      </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description(Hindi):</label>
                        <textarea class="form-control" name="description_hindi" rows="2">{{ $book->description_hindi }}</textarea>
                      </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description(English):</label>
                        <textarea class="form-control" name="description_english" rows="2">{{ $book->description_english }}</textarea>
                      </div>
                </div>
                <div class="col-4 form-group">
                    <label for="inputAddress" class="form-label">Cost Price:</label>
                    <input type="text" class="form-control" name="cost_price" value="{{ $book->cost_price }}">
                            @error('cost_price')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                </div>
                <div class="col-4 form-group">
                    <label for="inputAddress" class="form-label">Sale Price:</label>
                    <input type="text" class="form-control" name="sale_price" value="{{ $book->sale_price }}">
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
                    <input type="text" class="form-control" name="isbn_code" value="{{ $book->isbn_code }}">
                </div>
                <div class="col-6 form-group">
                    <label for="inputAddress" class="form-label">Publishing Year:</label>
                    <input type="text" class="form-control" name="publishing_year" value="{{ $book->publishing_year }}">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
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