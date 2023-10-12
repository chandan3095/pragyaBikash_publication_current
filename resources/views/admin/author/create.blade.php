@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <form class="p-4 bg-white shadow mb-3" action="{{ route('admin.author.store') }}" method="POST" enctype="multipart/form-data">
        {{ @csrf_field() }}
        <h2 class="pb-2 mb-3 bg-info py-1 px-2 text-white">Fill out the details of the Author:</h2>
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="TextInput" class="form-label">Name(English):</label>
                    <input type="text" class="form-control" placeholder="Enter the name of the author in english" name="name_english">
                    @error('name_english')
                        <div><small class="text-danger">{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="TextInput" class="form-label">Name(Bengali):</label>
                    <input type="text" class="form-control" placeholder="Enter the name of the author in Bengali" name="name_bengali">
                    @error('name_bengali')
                        <div><small class="text-danger">{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="TextInput" class="form-label">Name(Hindi):</label>
                    <input type="text" class="form-control" placeholder="Enter the name of the author in hindi" name="name_hindi">
                    @error('name_hindi')
                        <div><small class="text-danger">{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description(Bengali):</label>
                    <textarea class="form-control" name="description_bengali" rows="2"></textarea>
                    @error('description_bengali')
                        <div><small class="text-danger">{{ $message }}</small></div>
                    @enderror
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description(Hindi):</label>
                    <textarea class="form-control" name="description_hindi" rows="2"></textarea>
                    @error('description_hindi')
                        <div><small class="text-danger">{{ $message }}</small></div>
                    @enderror
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description(English):</label>
                    <textarea class="form-control" name="description_english" rows="2"></textarea>
                    @error('description_english')
                        <div><small class="text-danger">{{ $message }}</small></div>
                    @enderror
                  </div>
            </div>
            <div class="col-md-12 form-group">
                <label for="inputAddress" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image">
                @error('image')
                        <div><small class="text-danger">{{ $message }}</small></div>
                    @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection