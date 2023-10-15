@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create News</h1>
        <!-- Tampilkan informasi pengguna -->
        <p>Created by: {{ auth()->user()->name }}</p>

        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Images</label>
                <br>
                <input type="file" name="image-news" accept="image/*" required>
            </div>
            <br>
            <label for="category_id">Category</label>
            <div class="form-check">
                <div class="form-group">

                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="10" required>
                    Start to Your Content!
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
