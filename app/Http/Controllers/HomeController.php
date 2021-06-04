<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with(['authors'])
            ->where('is_published', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        return view("index", ['news' => $news]);
    }

    public function profile()
    {
        //
        return view("profile");
    }

    public function listapp()
    {
        //
        return view("listapp");
    }



}
