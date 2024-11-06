@extends('layouts.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
<div class="topic-container">
    <h1 class="text-center">All Topics</h1>
    <div class="text-center mb-3">
        <button class="btn-purple" data-bs-toggle="modal" data-bs-target="#createTopicModal">Create New Topic</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="table-responsive mx-auto" style="width: 100%;">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topics as $topic)
                    <tr>
                        <td>{{ $topic->id }}</td>
                        <td>{{ $topic->title }}</td>
                        <td>{{ $topic->description }}</td>
                        <td>
                            @if($topic->post)
                                <img src="{{ asset('img/' . $topic->post->image) }}" alt="Image" width="50">
                            @else
                                <span>No Image</span> 
                            @endif
                        </td>
                        <td>{{ $topic->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $topic->category->title }}</td>
                        <td>
                            <a href="{{ route('listTopicById', $topic->id) }}" class="btn btn-success">View</a>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTopicModal"
                               data-id="{{ $topic->id }}" data-title="{{ $topic->title }}" 
                               data-description="{{ $topic->description }}" data-status="{{ $topic->status }}"
                               data-category="{{ $topic->category_id }}">Edit</a>
                            <button class="btn btn-danger" onclick="deleteTopic({{ $topic->id }})">Delete</button>
                            <form id="delete-form-{{ $topic->id }}" action="{{ route('deleteTopic', $topic->id) }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Create Topic Modal -->
<div class="modal fade" id="createTopicModal" tabindex="-1" aria-labelledby="createTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTopicModalLabel">Create New Topic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createTopicForm" action="{{ route('createTopic') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="viewName" value="{{request()->routeIs('welcome') ? 'welcome' : 'listAllTopics' }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" id="category" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Topic</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Topic Modal -->
<div class="modal fade" id="editTopicModal" tabindex="-1" aria-labelledby="editTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTopicModalLabel">Edit Topic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTopicForm" action="{{ route('updateTopic', '') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-topic-id" name="topic_id">
                    <div class="mb-3">
                        <label for="edit-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit-title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit-description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-status" class="form-label">Status</label>
                        <select class="form-control" id="edit-status" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-category" class="form-label">Category</label>
                        <select class="form-control" id="edit-category" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Topic</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    function deleteTopic(id) {
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

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    @endif

    var editTopicModal = document.getElementById('editTopicModal');
    editTopicModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var topicId = button.getAttribute('data-id');
        var topicTitle = button.getAttribute('data-title');
        var topicDescription = button.getAttribute('data-description');
        var topicStatus = button.getAttribute('data-status');
        var topicCategory = button.getAttribute('data-category');

        editTopicModal.querySelector('#edit-topic-id').value = topicId;
        editTopicModal.querySelector('#edit-title').value = topicTitle;
        editTopicModal.querySelector('#edit-description').value = topicDescription;
        editTopicModal.querySelector('#edit-status').value = topicStatus;
        editTopicModal.querySelector('#edit-category').value = topicCategory;

        var formAction = "{{ url('topics') }}" + '/' + topicId + '/update';
        editTopicModal.querySelector('form').setAttribute('action', formAction);
        console.log(formAction);
    });
</script>
@endsection
