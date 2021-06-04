<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\News;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $author = Author::with('news')->get();
        return view('admin.author', ['author' => $author]);
        // return view('admin.author');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_author');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('picture')) {

        $destinationPath = 'profile/';

        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move($destinationPath, $profileImage);

        $input['picture'] = "$profileImage";

        }
        Author::create($input);
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
        return view('admin.update_author', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
        $request->validate([
        'name' => 'required',
        'address' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('picture')) {
            unlink('profile/'.$author->picture);
            $destinationPath = 'profile/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['picture'] = "$profileImage";
        }else{
            unset($input['picture']);
        } 

        $author->update($input);

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        unlink('profile/'.$author->picture);
        $author->delete();
        return redirect()->route('author.index');
    }
}
