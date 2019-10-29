@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/authors/{{$author->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value={{$author->name}}>
                </div>
                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" value={{$author->last_name}}>
                </div>
            </div>

            <div class="form-group row">
                <label for="image_url" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image_url" class="form-control-file" id="image_url">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">description</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="description" rows="5" style="resize: none;">{{$author->description}}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="born_date" class="col-sm-2 col-form-label">Date Born</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="born_date" name="born_date" placeholder="born_date" value={{$author->born_date}}>
                </div>
                <label for="died_date" class="col-sm-2 col-form-label">Date Died</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="died_date" name="died_date" placeholder="died_date" value={{$author->died_date}}>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">დამატება</button>
                </div>
            </div>

        </form>
        
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
