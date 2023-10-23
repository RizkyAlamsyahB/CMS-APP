<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; // Pastikan Anda telah mengimpor model Category.

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']); // Tambahkan middleware 'verified' pada constructor HomeController.php.
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $name = $user->name;


        // Fetch news articles
        $newsList = News::all();
        $newsList = News::paginate(2);

        // Menghitung jumlah User
        $userCount = User::count();

        // Menghitung jumlah News
        $newsCount = News::count();

        // Menghitung jumlah Category
        $categoryCount = Category::count();

        return view('home', compact('name', 'newsList', 'userCount', 'newsCount', 'categoryCount'));
    }
}