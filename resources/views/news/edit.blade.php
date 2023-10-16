@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit News</h1>
        <!-- Tampilkan informasi pengguna -->
        <p>Created by: {{ auth()->user()->name }}</p>

        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Ini diperlukan untuk mengubah data --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $news->title }}">
            </div>
            <div class="form-group">
                <label for="title">Images</label>
                <br>
                <input type="file" name="image-news" accept="image/*">
            </div>
            <br>
            <label for="category_id">Category</label>
            <div class="form-check">
                <div class="form-group">
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="10">{{ $news->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
