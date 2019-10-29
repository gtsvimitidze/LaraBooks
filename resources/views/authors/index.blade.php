@extends('layouts.app')

@section('content')

<div class="container">
    <div style="padding: 5px 0px 5px 0px; text-align: right">
        <a href="/books/create"><button type="button" class="btn btn-primary">Add Book</button></a>
        <a href="/authors/create"><button type="button" class="btn btn-primary">Add Author</button></a>
    </div>
    <div class="row">
        @foreach($authors as $author)
            <div class="col-6">
                <div class="card" style="width: 18rem;">
                    <img src="{{$author->image_url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $author->name }} {{ $author->last_name }}</h5>
                        <p class="card-text">{{ $author->description }}</p>
                        <a href="/authors/{{$author->id}}" class="btn btn-primary">სრულად</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  
</div>
@endsection
