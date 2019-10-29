<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'last_name' => ['required'],
            'image_url' => ['required'],
            'description' => ['required', 'min:3', 'max:255'],
            'born_date' => ['required'],
            'died_date' => ['required'],
        ]);
        $attributes['user_id'] = auth()->id();
        Author::create($attributes);
        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author =  Author::find($id);
        return view('authors.edit', compact('author'));
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
        $author = Author::findOrFail($id);

        $attributes = $request->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => ['required', 'min:3', 'max:255'],
            'born_date' => ['required'],
            'died_date' => ['required'],
        ]);

        $imageName = time().'.'.$request->image_url->extension();  
        $request->image_url->move(public_path('uploads'), $imageName);
        
        $attributes['image_url'] = '/uploads'.'/'.$imageName;

        $author->update($attributes);

        return redirect('/authors');
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
