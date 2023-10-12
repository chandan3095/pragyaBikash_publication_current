@extends('admin.layout')
@section('content')
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col" colspan="2">{{ $enquiry->name }}'s Enuiry:</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="w-25">Name:</th>
            <td>{{ $enquiry->name }}</td>
          </tr>
          <tr>
            <th scope="row" class="w-25">Book Name:</th>
            <td>{{ $enquiry->name }}</td>
          </tr>
          <tr>
            <th scope="row" class="w-25">Email:</th>
            <td>{{ $enquiry->email }}</td>
          </tr>
          <tr>
            <th scope="row" class="w-25">Phone No:</th>
            <td>{{ $enquiry->phone }}</td>
          </tr>
          <tr>
            <th scope="row" class="w-25">Address:</th>
            <td>{{ $enquiry->address }}</td>
          </tr>
          <tr>
            <th scope="row" class="w-25">Enquiry Date:</th>
            <td>{{ date('d/m/Y', strtotime($enquiry->created_at)) }}</td>
          </tr>
        </tbody>
      </table>
</div>
@endsection