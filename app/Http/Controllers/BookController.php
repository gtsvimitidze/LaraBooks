<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // asatvirti
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'image_url' => ['required'],
            'description' => ['required', 'min:3', 'max:255'],
            'release_date' => ['required'],
            'author_id' => ['required'],
            'pages' => ['required'],
        ]);
        $attributes['user_id'] = auth()->id();
        Book::create($attributes);
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::all();
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $attributes = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => ['required', 'min:3', 'max:255'],
            'release_date' => ['required'],
            'author_id' => ['required'],
            'pages' => ['required'],
        ]);

        $imageName = time().'.'.$request->image_url->extension();  
        $request->image_url->move(public_path('uploads'), $imageName);
        
        $attributes['image_url'] = '/uploads'.'/'.$imageName;

        $book->update($attributes);

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
