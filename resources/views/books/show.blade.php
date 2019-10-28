@extends('layouts.app')

@section('content')
<div class="container">

        <div class="card mb-3" style="width: 100%;">
            <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{$book->image_url}}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">
                    <table class="table">
                        <tr>
                            <td>ინფორმაცია: </td>
                            <td>{{ $book->description }}</td>
                        </tr>
                        <tr>
                            <td>გამოშვების თარიღი: </td>
                            <td>{{ $book->release_date }}</td>
                        </tr>
                        <tr>
                            <td>გვერდები: </td>
                            <td>{{ $book->pages }}</td>
                        </tr>
                    </table>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            </div>
        </div>


    <table>
        <tr>
            <td>
                <img src="" alt="">
            </td>
            <td>
                
            </td>
        </tr>
    </table>
    <a href="/books/{{ $book->id }}/edit"><button type="button" class="btn btn-primary">რედაქტირება</button></a>
</div>
@endsection
