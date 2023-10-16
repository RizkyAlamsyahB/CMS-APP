<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function news()
{
    $news = News::all(); // Gantilah 'News' dengan model berita yang sesuai
    return view('admin.news.index', compact('news'));
}
}