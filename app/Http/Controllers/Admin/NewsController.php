<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Author;
use App\Models\AuthorNew;
use DB;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with(['authors'])->get();
        return view('admin.news', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $author = Author::all();
        return view('admin.create_news', ['author' => $author]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'is_published' => 'required',
            'author_id' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('picture')) {

        $destinationPath = 'img/';

        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move($destinationPath, $profileImage);

        $input['picture'] = "$profileImage";

        }
        News::create($input);
        $newsid = DB::getPdo()->lastInsertId();
        $News = News::find($newsid);
        $News->authors()->attach($input['author_id']);

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::with(['authors'])
        ->where('id', $id)
        ->first();
        $author_id = $news['authors']['0']->id;
        $author = Author::where('id', '!=', $author_id)->get();
        return view('admin.update_news', compact('news', 'author'));
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
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'is_published' => 'required',
            'author_id' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('picture')) {
        unlink('img/'.$news->picture);
        $destinationPath = 'img/';

        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move($destinationPath, $profileImage);

        $input['picture'] = "$profileImage";

        }else{
            unset($input['picture']);
        } 
        $news->update($input);
        $newsid = $news->id;
        $News = News::find($newsid);
        $News->authors()->sync($input['author_id'], $newsid);
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $newsid = $news->id;
        $author_id = $news['authors']['0']->id;
        $News = News::find($newsid);
        $News->authors()->detach($author_id, $newsid);

        unlink('img/'.$news->picture);
        $news->delete();
        return redirect()->route('news.index');
    }
}
