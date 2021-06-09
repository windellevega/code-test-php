@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row" style="margin:10px 0;">
        <div class="col-md-6">
            <form action="{{ route('books.index') }}" method="GET">
                <div class="input-group">
                    <h5 style="margin: 8px 10px 0 0">Search by:</h5>
                    <select class="form-select" name="search_by" value="{{ old('search_by') }}">
                        <option selected value="1">Title</option>
                        <option value="2">ISBN</option>
                        <option value="3">Author</option>
                        <option value="4">Publisher</option>
                        <option value="5">Year Published</option>
                        <option value="6">Category</option>
                    </select>
                    <input type="text" class="form-control" style="width: 150px" name="keyword">
                    <button class="btn btn-outline-primary" type="submit">Search</button>

                </div>
            </form>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addBookModal"><i class="bi bi-journal-plus"></i> Add Book</button>
            <!-- Modal -->
            <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                            </div>
                            <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input class="form-control" name="title" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="ISBN" class="form-label">ISBN</label>
                                        <input class="form-control" name="isbn" value="{{ old('isbn') }}">
                                        @error('isbn')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="author" class="form-label">Author</label>
                                        <input class="form-control" name="author" value="{{ old('author') }}">
                                        @error('author')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="publisher" class="form-label">Publisher</label>
                                        <input class="form-control" name="publisher" value="{{ old('publisher') }}">
                                        @error('publisher')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="year_published" class="form-label">Year Published</label>
                                        <input class="form-control" name="year_published" value="{{ old('year_published') }}">
                                        @error('year_published')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="ISBN" class="form-label">Author</label>
                                        <select class="form-select" name="category_id">
                                            @foreach ($categories as $category)
                                                @if(old('category_id') == $category->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" >Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Title</th>
            <th scope="col">ISBN</th>
            <th scope="col">Author</th>
            <th scope="col">Publisher</th>
            <th scope="col">Year Published</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->year_published }}</td>
                    <td>{{ $book->category->category_name }}</td>
                    <td>
                        <a data-bs-toggle="modal" data-bs-target="#updateModal-{{ $book->id }}"><i class="bi bi-pencil-square"></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="updateModal-{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
                                        </div>
                                        <div class="modal-body">

                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input class="form-control" name="title" value="{{ $book->title }}">
                                                    @error('title')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ISBN" class="form-label">ISBN</label>
                                                    <input class="form-control" name="isbn" value="{{ $book->isbn }}">
                                                    @error('isbn')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="author" class="form-label">Author</label>
                                                    <input class="form-control" name="author" value="{{ $book->author }}">
                                                    @error('author')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="publisher" class="form-label">Publisher</label>
                                                    <input class="form-control" name="publisher" value="{{ $book->publisher }}">
                                                    @error('publisher')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="year_published" class="form-label">Year Published</label>
                                                    <input class="form-control" name="year_published" value="{{ $book->year_published }}">
                                                    @error('year_published')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ISBN" class="form-label">Author</label>
                                                    <select class="form-select" name="category_id">
                                                        @foreach ($categories as $category)
                                                            @if($book->category_id == $category->id)
                                                                <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                                            @else
                                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" >Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $book->id }}"><i class="bi bi-trash"></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this book?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" >Delete</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6"><center>No books found.</center></td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex">
        {!! $books->links() !!}
    </div
@endsection
