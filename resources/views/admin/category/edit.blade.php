@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <form class="p-4 bg-white shadow mb-3" action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="TextInput" class="form-label">Name(English):</label>
                    <input type="text" value="{{ $category->name_english }}" name="name_english" class="form-control" placeholder="Enter the name of the book in english" >
                    @error('name_english')
                        <div><small class="text-danger">{{ $message }}</small></div>
                        @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="TextInput" class="form-label">Name(Bengali):</label>
                    <input type="text" value="{{ $category->name_bengali }}" name="name_bengali" class="form-control" placeholder="বইয়ের নাম লিখুন" >
                    @error('name_bengali')
                        <div><small class="text-danger">{{ $message }}</small></div>
                        @enderror
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection