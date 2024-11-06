@extends ('layouts.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
<div class="topic-container">
    <h1 class="text-center">All Tags</h1>
    <div class="text-center mb-3">
        <button class="btn-purple" data-bs-toggle="modal" data-bs-target="#createTagModal">Create New Tag</button>
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
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->title }}</td>
                        <td>
                            <a href="{{ route('listTagById', $tag->id) }}" class="btn btn-success">View</a>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTagModal" data-id="{{ $tag->id }}" data-title="{{ $tag->title }}">Edit</a>
                            <button class="btn btn-danger" onclick="deleteTag({{ $tag->id }})">Delete</button>
                            <form id="delete-form-{{ $tag->id }}" action="{{ route('deleteTag', $tag->id) }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="createTagModal" tabindex="-1" aria-labelledby="createTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTagModalLabel">Create New Tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createTagForm" action="{{ route('createTag') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Tag</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTagModalLabel">Edit Tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTagForm" action="{{ route('updateTag', '') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-tag-id" name="tag_id">
                    <div class="mb-3">
                        <label for="edit-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit-title" name="title" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Tag</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-JFNSi4fY/Mpt/i2//0gqK1tU8W0NzxMD0L4FYV+U8H7vZp0n6eP+k20w0H4xhIgL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-DyZvW+1C0C6/Qu4/TPfgST4L5XgGB6V5pcS7I1cf2HcnUMRZz3RkgbpA/m9ow4B7" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function deleteTag(id) {
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

    var editTagModal = document.getElementById('editTagModal');
    editTagModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; 
        var tagId = button.getAttribute('data-id'); 
        var tagTitle = button.getAttribute('data-title'); 

        var modalTitle = editTagModal.querySelector('.modal-title'); 
        var editTagIdInput = editTagModal.querySelector('#edit-tag-id'); 
        var editTagTitleInput = editTagModal.querySelector('#edit-title'); 

        modalTitle.textContent = 'Edit Tag ' + tagTitle;
        editTagIdInput.value = tagId; 
        editTagTitleInput.value = tagTitle; 
        var formAction = "{{ url('tags') }}" + '/' + tagId + '/update'; 
        editTagModal.querySelector('form').setAttribute('action', formAction); 
    });

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    @endif
</script>

@endsection
