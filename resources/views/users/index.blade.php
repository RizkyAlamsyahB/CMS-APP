@extends('layouts.app')

@section('content')
<div class="row ml-5">
        <h1 class="m-0 text-dark"><b>User</b></h1>

    </div>
    <br>

    <div class="row ml-5">
        <div class="col-12">
            <!-- Tombol "Tambah Kategori" -->

            <hr>

            <div class="card">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <script>
                        // Hapus pesan flash setelah 2 detik
                        $(document).ready(function() {
                            setTimeout(function() {
                                $("#success-alert").alert('close');
                            }, 2000); // 2000 milidetik (2 detik)
                        });
                    </script>
                @endif
                <div class="card-body">
                    <form method="GET" action="{{ route('users.index') }}" class="mb-3">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search Category">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">


                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{$user->role}}</td>

                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary"
                                                    href="{{ route('users.edit', $user->id) }}">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- <div>
                        Showing
                        {{ $categories->firstItem() }}
                        of
                        {{ $categories->lastItem() }}
                        to
                        {{ $categories->total() }}
                        entries
                    </div>
                </div>
                <div class="d-flex flex-row-reverse ">
                    {{ $categories->links() }}
                </div> --}}
            </div>
        </div>
    </div>


    <!-- Modal "Add Category" -->


    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi formulir untuk menambahkan kategori -->
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="name" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
