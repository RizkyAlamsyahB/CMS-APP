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
                <textarea id="myeditorinstance">Hello, World!</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
<script src="https://cdn.tiny.cloud/1/smde32rjrd6shockaewcz54x8lwtnp5rrx15lnqs9ta93i5w/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        // Initialize TinyMCE after the textarea is loaded
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: '#myeditorinstance',
                plugins: 'code table lists',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            });
        });
    </script>
@endsection
