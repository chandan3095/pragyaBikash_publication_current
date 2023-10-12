@extends('admin.layout')
@section('content')
    <div class="author-list">
        <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('/storage/' . ($book->images['0']->image ?? '')) }}" height="400" width="400" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body pl-0">
                  <h5 class="card-title"> About the Book: </h5>
                  <ul class="list-unstyled author-list">
                    <li>
                        <p class="mb-1 title-heading"><strong>Name in English: </strong></p>
                        <p class="card-text fw-bold title-text">{{ $book->english_name }}</p>
                    </li>
                    <li>
                        <p class="mb-1 title-heading"><strong>Name in Bengali: </strong></p>
                        <p class="card-text fw-bold title-text">{{ $book->bengali_name ?? 'There is no data' }}</p>
                    </li>
                    <li>
                        <p class="mb-1 title-heading"><strong>Description in English:</strong></p>
                        <p class="card-text fw-bold title-text">
                            {{ $book->description_english ?? 'There is no data' }}
                        </p>
                    </li>
                    <li>
                        <p class="mb-1 title-heading"><strong>Description in Bengali:</strong></p>
                        <p class="card-text fw-bold title-text">{{ $book->description_bengali ?? 'There is no data' }}</p>
                    </li>
                  </ul>
                  @if ($book->updated_at)
                  <p class="card-text"><small class="text-muted">Last updated at {{ $book->updated_at }}</small></p>
                  @endif
                  <div class="text-center">
                    <form action="{{ route('admin.book.delete', ['id' => $book->id]) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection