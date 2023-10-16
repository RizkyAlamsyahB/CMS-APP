<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
     public function index()
     {
         if (Gate::allows('manage-dashboard')) {
             $newsCount = News::count();
             $userCount = User::count();
             $categoryCount = Category::count(); // Mengambil jumlah kategori

             return view('dashboard.index', compact('newsCount', 'userCount', 'categoryCount'));
         } else {
             // Izin ditolak, mungkin ingin menampilkan pesan kesalahan atau mengarahkan pengguna
             return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk mengakses dashboard.');
         }
     }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}