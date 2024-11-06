@extends ('layouts.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
<div class="topic-container">
    <h1 class="text-center">All Categories</h1>
    <div class="text-center mb-3">
        <button class="btn-purple" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Create New Category</button>
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
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('listCategoryById', $category->id) }}" class="btn btn-success">View</a>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editCategoryModal" data-id="{{ $category->id }}" data-title="{{ $category->title }}" data-description="{{ $category->description }}">Edit</button>
                            <button class="btn btn-danger" onclick="deleteCategory({{ $category->id }})">Delete</button>
                            <form id="delete-form-{{ $category->id }}" action="{{ route('deleteCategory', $category->id) }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryModalLabel">Create New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createCategoryForm" action="{{ route('createCategory') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" action="{{ route('updateCategory', '') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-category-id" name="category_id">
                    <div class="mb-3">
                        <label for="edit-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit-title" name="title" required>
                        <label for="edit-description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="edit-description" name="description" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-JFNSi4fY/Mpt/i2//0gqK1tU8W0NzxMD0L4FYV+U8H7vZp0n6eP+k20w0H4xhIgL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-DyZvW+1C0C6/Qu4/TPfgST4L5XgGB6V5pcS7I1cf2HcnUMRZz3RkgbpA/m9ow4B7" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function deleteCategory(id) {
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

    var editCategoryModal = document.getElementById('editCategoryModal');
    editCategoryModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; 
        var categoryId = button.getAttribute('data-id'); 
        var categoryTitle = button.getAttribute('data-title'); 
        var categoryDescription = button.getAttribute('data-description'); 

        editCategoryModal.querySelector('#edit-category-id').value = categoryId;
        editCategoryModal.querySelector('#edit-title').value = categoryTitle;
        editCategoryModal.querySelector('#edit-description').value = categoryDescription;

        var formAction = "{{ url('categories') }}" + '/' + categoryId + '/update';
        editCategoryModal.querySelector('form').setAttribute('action', formAction);
    });

    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
</script>

@endsection
