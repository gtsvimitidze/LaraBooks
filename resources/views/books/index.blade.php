@extends('layouts.app')

@section('content')

<div class="container">
    <div style="padding: 5px 0px 5px 0px; text-align: right">
        <a href="/books/create"><button type="button" class="btn btn-primary">Add Book</button></a>
        <a href="/authors/create"><button type="button" class="btn btn-primary">Add Author</button></a>
    </div>
    <div class="row">
        @foreach($books as $book)
            <div class="col-6">
                <div class="card mb-3" style="max-width: 540px;" onClick="window.open('/books/{{ $book->id }}', '_self')">
                    <div class="row no-gutters">
                        <div class="col-md-4" style="vertical-align:middle"> {{-- style="background: url('{{ $book->image_url }}')" --}}
                            <img src="{{ $book->image_url }}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text" style="height: 5rem; overflow: auto">{{ $book->description }}</p>
                                <p class="card-text"><small class="text-muted">{{ $book->created_at }}</small></p>
                                <p class="card-text"><small class="text-muted">{{ $book->author_id }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  
</div>
@endsection
