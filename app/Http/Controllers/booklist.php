<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;
use App\Http\Controllers\strage;
use Illuminate\Support\Facades\Storage;




class booklist extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $books = books::all();
        return view('about', ['books' => $books]);

    }
    public  function input  ()
    {
        return view('input');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'           => 'required|min:5',
            'description'     => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //store data to database
        $books = new books();
        $books->image = $image->hashName();
        $books->title = $request->title;
        $books->description = $request->description;
        $books->save();

        return redirect('/about');

    }

    /**
     * Display the specified resource.
     */
    public function edit(books $id)
    {
        return view('edit', compact('id'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, books $id){
        $book = $id;
        //validasi rikues
        $this->validate($request, [
            'image'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'           => 'required|min:5',
            'description'     => 'required|min:10'
        ]);

        if($request->hasFile('image')){
            //masukan data
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete image dulu
            Storage::delete('public/posts/'. $book->image);

            //update field
            $book ->update(
                [
                    'image' => $image->hashName(),
                    'title' => $request->title,
                    'description' => $request->description

                ]

            );

        } else {
            //update field
            $book ->update(
                [
                    'title' => $request->title,
                    'description' => $request->description
                ]
            );
        }

        return redirect('/about');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(books $id)
    {
        // dd($id);
        //
        Storage::delete('public/posts/'. $id->image);
        $id->delete();
        return redirect('/about');
    }
}
