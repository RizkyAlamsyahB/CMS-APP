<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


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

        return view('news.index', compact('news'))->with('i', ($news->currentPage() - 1) * 2);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('manage-news')) {
            // Izinkan admin untuk membuat berita
            $categories = Category::all(); // Ambil semua kategori
            return view('news.create', compact('categories'));
        } else {
            // Izin ditolak, mungkin ingin menampilkan pesan kesalahan atau mengarahkan pengguna
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk membuat berita.');
        }
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
    $news->slug = Str::slug($request->input('title')); // Generate and save the slug
    $news->content = html_entity_decode($request->input('content'));
    $news->user_id = $user->id;
    $news->category_id = $request->input('category_id');
    $news->image = $imageName;

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
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();

        return view('news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $news = News::findOrFail($id);

        $news->title = $request->input('title');
        $news->content = html_entity_decode($request->input('content'));
        $news->category_id = $request->input('category_id');

        if ($request->file('image-news')) {
            $request->validate([
                'image-news' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Mengunggah gambar baru dan mendapatkan path
            $imageName = $request->file('image-news')->store('images', 'public');

            // Hapus gambar lama (jika ada) dan simpan gambar baru
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $news->image = $imageName;
        }

        $news->save();

        session()->flash('success', 'News article updated successfully');

        return redirect()->route('news.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news) {
            // Hapus gambar terkait jika ada
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $news->delete();

            session()->flash('success', 'News article deleted successfully');
        } else {
            session()->flash('error', 'News article not found');
        }

        return redirect()->route('news.index');
    }
}
