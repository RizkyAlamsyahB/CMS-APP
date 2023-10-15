<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = News::paginate(2);
        $search = $request->input('search');

        $news = News::where('title', 'like', "%$search%")
            ->paginate(2);

        return view('news.index', compact( 'news')) ->with('i', ($news->currentPage() - 1) * 2);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image-news' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Mengunggah gambar dan mendapatkan path
        if ($request->file('image-news')) {
            $imageName = $request->file('image-news')->store('images', 'public');
        }

        $user = auth()->user();

        $news = new News;
        $news->title = $request->input('title');
        $news->content = html_entity_decode($request->input('content')); // Menggunakan html_entity_decode untuk menghilangkan paragraf HTML
        $news->user_id = $user->id;
        $news->category_id = $request->input('category_id');
        $news->image = $imageName; // Simpan hanya nama file gambar
        session()->flash('success', 'News article created successfully');


        $news->save();

        return redirect()->route('news.index');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $news = News::findOrFail($id); // Find the news article by its ID

        return view('news.show', compact('news'));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
