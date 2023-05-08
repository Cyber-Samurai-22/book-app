@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Book Details</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $book->id }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $book->title }}</td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>{{ $book->author->name }}</td>
                    </tr>
                </table>
                <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books</a>
            </div>
        </div>
    </div>
@endsection
