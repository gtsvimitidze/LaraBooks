@extends('layouts.app')

@section('content')

<div class="container">
    {{-- <div style="padding: 5px 0px 5px 0px; text-align: right">
        <a href="/books/create"><button type="button" class="btn btn-primary">Add Book</button></a>
        <a href="/authors/create"><button type="button" class="btn btn-primary">Add Author</button></a>
    </div> --}}
    <div class="pagination justify-content-end">{{ $books->links() }}</div>
    <div class="row">
        @foreach($books as $book)
            <div class="col-2" style="padding: 5pt">
                <a href="/books/{{$book->id}}}">
                    <div class="index-book-div">
                        <div class="index-book-img">{{-- $book->image_url --}}
                        <img src="{{ 'http://www.lifescience.org.ge/images/about/2427301NO_IMG_600x600.png' }}" width="100%">
                        </div>
                        <div class="index-book-divTitle">{{$book->title}}</div>
                        <div class="index-book-divDescription">{{$book->description}}</div>
                        <div style="text-align:right; color: grey">
                            <small><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $book->created_at ? date('d M Y', strtotime($book->created_at)) : ''}}</small>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
  
</div>
@endsection
