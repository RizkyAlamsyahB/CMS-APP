@extends('layouts.app')

@section('content')

<div class="col-sm-6">
    <h1 class="m-0 text-dark">News</h1>
</div>
<br>


<div class="row ml-5">
    <div class="col-12">
        <!-- Tombol "Tambah Berita" -->
        <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Add a News</a>

        <hr>

        <div class="card">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <script>
                    // Hapus pesan flash setelah 2 detik
                    $(document).ready(function() {
                        setTimeout(function() {
                            $(".alert").alert('close');
                        }, 2000); // 2000 milidetik (2 detik)
                    });
                </script>
            @endif

            <div class="card-body">
                <form method="GET" action="{{ route('news.index') }}" class="mb-3">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search News">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-1">No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ optional($item->category)->name ?? '-' }}</td>

                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-secondary">Details</a>
                                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    Showing
                    {{ $news->firstItem() }}
                    to
                    {{ $news->lastItem() }}
                    of
                    {{ $news->total() }}
                    entries
                </div>
            </div>
            <div class="d-flex flex-row-reverse">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
