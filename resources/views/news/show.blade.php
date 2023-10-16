@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    @if ($news->image)
                        <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->title }}">
                    @endif
                    <div class="card-body">
                        <div class="card-header">
                            <h1 class="d-flex justify-content-center">
                                <strong>{{ $news->title }}</strong>
                            </h1>
                            <p>Category: {{ optional($news->category)->name ?? '-' }}</p>

                            <p>Author: {{ $news->user->name }}</p>
                            <p>Published on: {{ $news->created_at->format('F d, Y H:i:s') }}</p>
                        </div>
                        <p class="card-text">{!! htmlspecialchars_decode($news->content) !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary d-flex justify-content-around">Back</a>

    </div>
@endsection
