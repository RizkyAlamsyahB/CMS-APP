@extends('layouts.script')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">

                @foreach ($news as $item)
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}"
                            style="width: 100%; height: auto;">
                    @endif

                    <div class="card-body">
                        <strong class="d-flex justify-content-center" style="font-size:30px">{{ $item->title }}</strong>
                        <div class="card-header">
                            <p>Category: {{ $item->category->name }}</p>
                            <p>Author: {{ $item->user->name }}</p>
                            <p>Published on: {{ $item->created_at->format('F d, Y H:i:s') }}</p>
                        </div>
                        <p class="card-text custom-font">{!! htmlspecialchars_decode($item->content) !!}</p>
                    </div>
                @endforeach

                <!-- Tampilkan tombol navigasi paginasi -->
                <div class="pagination">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary d-flex justify-content-around">Back</a>
</div>

