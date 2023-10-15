@extends('layouts.app')

@section('content')
<div class="col-sm-6">
    <h1 class="m-0 text-dark">Edit Category</h1>
</div>
<div class="ml-5 col-5">
    @if ($message = Session::get('success'))
        @if (strpos($message, 'Updated') !== false)
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #f3f3f3; color: #333;">
                Category Successfully Updated
                <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm" style="margin-left: 10px;">Back to Index</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
        @endif
    @endif


    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
