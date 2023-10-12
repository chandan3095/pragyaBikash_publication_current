@extends('admin.layout')
@section('content')
<style>
    .form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem);
    padding: 0 ;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d3e2;
    border-radius: 0.35rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
<div class="container-fluid">
    <form class="p-4 bg-white shadow mb-3" action="{{ route('admin.book.image.store', ['id' => $book->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Upload Image:</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                        @error('images')
                            <div><small class="text-danger">{{ $message }}</small></div>
                        @enderror
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <table class="table" id="image_table">
        <thead>
          <tr>
            <th scope="col">Sl. No</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        @php
            $count = 1;
        @endphp
        @foreach ($book_images as $book_image)    
        <tbody>
          <tr>
            <th scope="row">{{ $count++ }}</th>
            <td>
              <img src="{{ asset('/storage/' . ($book_image->image ?? '')) }}" height="100" width="100" class="img-fluid rounded-start" alt="...">
            </td>
            <td>
              <div class="d-flex">
                <a href="{{ route('admin.book.image.edit', ['id' => $book->id, 'image_id' => $book_image->id]) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                <a href="{{ asset('/storage/' . ($book_image->image ?? '')) }}" class="btn btn-sm btn-info mr-2">View</a>
                <form action="{{ route('admin.book.image.delete', ['id' => $book->id, 'image_id' => $book_image->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
</div>
@endsection

@push('script-footer')
    <script>
      $("#image_table").DataTable();
    </script>
@endpush