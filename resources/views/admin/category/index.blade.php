@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <form class="p-4 bg-white shadow mb-3" action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="TextInput" class="form-label">Name(English):</label>
                    <input type="text" name="name_english" class="form-control" placeholder="Enter the name of the book in english" >
                    @error('name_english')
                        <div><small class="text-danger">{{ $message }}</small></div>
                        @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="TextInput" class="form-label">Name(Bengali):</label>
                    <input type="text" name="name_bengali" class="form-control" placeholder="বইয়ের নাম লিখুন" >
                    @error('name_bengali')
                        <div><small class="text-danger">{{ $message }}</small></div>
                        @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table" id="category_table">
        <thead>
          <tr>
            <th scope="col">Sl. No</th>
            <th scope="col">Name(English)</th>
            <th scope="col">Name(Bengali)</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        @php
            $count = 1;
        @endphp
        @foreach ($categories as $category)    
        <tbody>
          <tr>
            <th scope="row">{{ $count++ }}</th>
            <td>{{ $category->name_english }}</td>
            <td>{{ $category->name_bengali }}</td>
            <td>
              <div class="d-flex">
                <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                <form action="{{ route('admin.category.delete', ['id' => $category->id]) }}" method="POST">
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
    $('#category_table').DataTable();
</script>
@endpush