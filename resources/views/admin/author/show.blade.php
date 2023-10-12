@extends('admin.layout')
@section('content')
    <div class="author-list">
        <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('/storage/' . ($author->image ?? '')) }}" height="400" width="400" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body pl-0">
                  <h5 class="card-title"> About the Author: </h5>
                  <ul class="list-unstyled author-list">
                    <li>
                        <p class="mb-1 title-heading"><strong>Name in English: </strong></p>
                        <p class="card-text fw-bold title-text">{{ $author->name_english }}</p>
                    </li>
                    <li>
                        <p class="mb-1 title-heading"><strong>Name in Bengali: </strong></p>
                        <p class="card-text fw-bold title-text">{{ $author->name_bengali ?? 'There is no data' }}</p>
                    </li>
                    <li>
                        <p class="mb-1 title-heading"><strong>Description in English:</strong></p>
                        <p class="card-text fw-bold title-text">
                            {{ $author->description_english ?? 'There is no data' }}
                        </p>
                    </li>
                    <li>
                        <p class="mb-1 title-heading"><strong>Description in Bengali:</strong></p>
                        <p class="card-text fw-bold title-text">{{ $author->description_bengali ?? 'There is no data' }}</p>
                    </li>
                  </ul>
                  @if ($author->updated_at)
                  <p class="card-text"><small class="text-muted">Last updated at {{ $author->updated_at }}</small></p>
                  @endif
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection