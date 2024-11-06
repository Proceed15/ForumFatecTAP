@extends('layouts.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
<div class="posts-container">
    <h1>All Posts</h1>
    <div class="text-center mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">Create New Post</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editPostModal" 
                                data-id="{{ $post->id }}" 
                                data-title="{{ $post->title }}" 
                                data-description="{{ $post->description }}">Edit</button>
                        <button class="btn btn-danger" onclick="deletePost({{ $post->id }})">Delete</button>
                        <form id="delete-form-{{ $post->id }}" action="{{ route('deletePost', $post->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Post Modal -->
<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostModalLabel">Create New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createPostForm" action="{{ route('createPost') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Post Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPostForm" action="{{ route('updatePost', '') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-post-id" name="post_id">
                    <div class="mb-3">
                        <label for="edit-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit-title" name="title" required>
                        <label for="edit-description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="edit-description" name="description" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-JFNSi4fY/Mpt/i2//0gqK1tU8W0NzxMD0L4FYV+U8H7vZp0n6eP+k20w0H4xhIgL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-DyZvW+1C0C6/Qu4/TPfgST4L5XgGB6V5pcS7I1cf2HcnUMRZz3RkgbpA/m9ow4B7" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function deletePost(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

    var editPostModal = document.getElementById('editPostModal');
    editPostModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; 
        var postId = button.getAttribute('data-id'); 
        var postTitle = button.getAttribute('data-title'); 
        var postDescription = button.getAttribute('data-description'); 

        editPostModal.querySelector('#edit-post-id').value = postId;
        editPostModal.querySelector('#edit-title').value = postTitle;
        editPostModal.querySelector('#edit-description').value = postDescription;

        var formAction = "{{ url('posts') }}" + '/' + postId + '/update';
        editPostModal.querySelector('form').setAttribute('action', formAction);
    });
</script>

@endsection
