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
{{-- {{ dd($book) }} --}}
<div class="container-fluid">
    <form class="p-4 bg-white shadow mb-3" action="{{ route('admin.book.image.update', ['id' => $book->id, 'image_id' => $image->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Upload Image:</label>
                    <input type="file" name="image" class="form-control">
                        @error('image')
                            <div><small class="text-danger">{{ $message }}</small></div>
                        @enderror
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

    <div class="text-center ">
        <img src="{{ asset('/storage/' . ($image->image ?? '')) }}" height="400" width="400" class="img-fluid rounded-start" alt="...">
    </div>


</div>
@endsection