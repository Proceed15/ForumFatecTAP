@extends('layouts.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
<div class="comment-container">
    <h1 class="text-center">Comments</h1>
    <div class="text-center mb-3">
        <button type="button" class="btn btn-purple mb-3" data-bs-toggle="modal" data-bs-target="#createCommentModal">
            Create New Comment
        </button>
    </div>

    <div class="table-responsive mx-auto" style="width: 100%;">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>
                        @if($comment->postable && $comment->postable->image)
                            <img src="{{ asset('storage/' . $comment->postable->image) }}" width="100" alt="Comment Image">
                        @else
                            No image
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCommentModal{{ $comment->id }}">
                            Edit
                        </button>
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="editCommentModalLabel{{ $comment->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCommentModalLabel{{ $comment->id }}">Edit Comment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('comments.update', $comment) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea name="content" class="form-control" required>{{ old('content', $comment->content) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        @if($comment->postable && $comment->postable->image)
                                            <img src="{{ asset('storage/' . $comment->postable->image) }}" width="100" alt="Comment Image"><br>
                                        @endif
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de criação -->
    <div class="modal fade" id="createCommentModal" tabindex="-1" aria-labelledby="createCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCommentModalLabel">Create Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('createComment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="topic_id" class="form-label">Select Topic</label>
                        <select name="topic_id" class="form-select" required>
                            <option value="">Select a Topic</option>
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" class="form-control" required>{{ old('content') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Create Comment</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
