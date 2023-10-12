@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <h2>All the Enquiries:</h2>

        <div class="table-responsive">
            <table class="table" id="user_enquiry_table">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                @forelse ($book_enquiries as $enquiry)
                  <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $enquiry->name }}</td>
                    <td>{{ $enquiry->book->bengali_name }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td>{{ $enquiry->phone }}</td>
                    <td>{{ date('d/m/Y', strtotime($enquiry->created_at)) }}</td>
                    <td>
                        <a href="{{ route('admin.book_enquiry.show', ['id' => $enquiry->id]) }}" class="btn btn-sm btn-info">view</a>
                        {{-- <a href="#" class="btn btn-sm btn-danger">Delete</a> --}}
                        <form action="{{ route('admin.book_enquiry.delete', ['id' => $enquiry->id]) }}" method="post">
                            @csrf
                            @method('Delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
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
    $('#user_enquiry_table').DataTable();
</script>
@endpush