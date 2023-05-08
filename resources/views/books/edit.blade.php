@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Edit Book</h2>
                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="author_name">Author</label>
                        <input type="text" name="author_name" id="author_name" class="form-control" value="{{ $book->author->name }}" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <div>
                            <a href="{{ route('books.index') }}" class="btn btn-warning mr-2">Cancel</a>
                            <a href="{{ route('books.destroy', $book->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>
                        </div>
                    </div>
                </form>
                <form id="delete-form" action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
@endsection
