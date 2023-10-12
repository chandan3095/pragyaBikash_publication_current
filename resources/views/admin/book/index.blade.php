@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <h2>All the Books:</h2>

        <div class="table-responsive">
            <table class="table" id="book_table">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Name(English)</th>
                    <th scope="col">Name(Bengali)</th>
                    <th scope="col">Description(English)</th>
                    <th scope="col">Description(Bengali)</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                @forelse ($books as $book)
                  <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $book->category->name_bengali }}</td>
                    <td>{{ $book->english_name }}</td>
                    <td>{{ $book->bengali_name }}</td>
                    <td>{{ $book->description_english }}</td>
                    <td>{{ $book->description_bengali }}</td>
                    <td>
                        <a href="{{ route('admin.book.show', ['id' => $book->id]) }}" class="btn btn-sm btn-info">view</a>
                        <a href="{{ route('admin.book.edit', ['id' => $book->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('admin.book.image.create', ['id' => $book->id]) }}" class="btn btn-sm btn-success">Images</a>
                    </td>
                  </tr>
                @empty
                    <p>No data of authors found</p>
                @endforelse
                </tbody>
              </table>
        </div>
    </div>
@endsection

@push('script-footer') 
<script>
    $('#book_table').DataTable();
</script>
@endpush