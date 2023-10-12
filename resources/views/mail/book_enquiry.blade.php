<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div>
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $bookEnquiryObj->name??'' }}</td>
                    </tr>
                    {{-- @php
                        $book_name = \App\Model\Book::where('id', $bookEnquiryObj->book_id)->first();
                    @endphp --}}
                    <tr>
                        <th>Book Name</th>
                        <td>{{ $bookEnquiryObj->book->bengali_name??'' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $bookEnquiryObj->email??'' }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $bookEnquiryObj->phone??'' }}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>{{ $bookEnquiryObj->quantity??'' }}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{{ $bookEnquiryObj->address??'' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   </div>
</body>
</html>