@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <h2>All the Authors:</h2>

        <div class="table-responsive">
            <table class="table" id="author_table">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
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
                @forelse ($authors as $author)
                  <tr>
                    <th scope="row">{{ $count++ }}</th>
                    <td>{{ $author->name_english }}</td>
                    <td>{{ $author->name_bengali }}</td>
                    <td>{{ substr($author->description_english, 0, 15)}} @if($author->description_english) . . . @endif </td>
                    <td>{{ substr($author->description_bengali, 0, 15)}} . . .</td>
                    <td>
                        <a href="{{ route('admin.author.show', ['id' => $author->id]) }}" class="btn btn-sm btn-info">view</a>
                        <a href="{{ route('admin.author.edit', ['id' => $author->id]) }}" class="btn btn-sm btn-primary">Edit</a>
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
    $('#author_table').DataTable();
</script>
@endpush