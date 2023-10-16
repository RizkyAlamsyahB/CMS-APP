@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="d-flex justify-content-center">News</h1>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($newsList as $news)
                <div class="col">
                    <div class="card">
                        @if ($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top"
                                alt="{{ $news->title }}" style="width: 555px; height: 300px;">
                        @endif
                        <div class="card-body">
                            <strong class="d-flex justify-content-center"
                                style="font-size:30px">{{ $news->title }}</strong>
                            <br>
                            <p>Category: {{ $news->category->name ?? '-' }}</p>
                            <p>Author: {{ $news->user->name }}</p>
                            <p>Published on: {{ $news->created_at->format('F d, Y H:i:s') }}</p>
                            <p class="card-text">
                                {{ \Str::limit(strip_tags(htmlspecialchars_decode($news->content)), 200) }}
                            </p>
                            @if (strlen(strip_tags(htmlspecialchars_decode($news->content))) > 200)
                            <a href="{{ route('newsShow', $news->id) }}" class="btn btn-primary">Read More</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center ">
            Showing
            {{ $newsList->firstItem() }}
            of
            {{ $newsList->lastItem() }}
            to
            {{ $newsList->total() }}
            entries
        </div>
        <div class="d-flex justify-content-center ">
            {{ $newsList->links() }}
        </div>

        </div>
    </div>
@endsection
