@extends('layouts.main')


@section('content')
    <h1>Categories</h1>

    @foreach ($categories as $category)
    <div class="card new_card">
        <div class="category_list">
            <div>
                <h2 id="category-{{ $category->id }}">{{ $category->title }}</h2>
                <p id="description-{{ $category->id }}">{{ $category->description }}</p>
            </div>
            <div>
                <button data-bs-toggle="modal" data-bs-target="#editCategoryModal" data-id="{{ $category->id }}"
                    onclick="editCat(this)">
                    Editar <i class="bi bi-pencil-square"></i></button>
                <button data-bs-toggle="modal" data-bs-target="#deleteCategoryModal" data-id="{{ $category->id }}"
                    onclick="delCat(this)">
                    Excluir <i class="bi bi-trash"></i></button>
            </div>
        </div>
    </div>
    @endforeach

@endsection

@section('actionButton')
     
    <div class="topics">
        <button data-bs-toggle="modal" data-bs-target="#createCategoryModal"><i class="fa-solid fa-plus" ></i>Create a Category</button>
    </div>

    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createCategoryForm" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit-title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit-description" name="description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="deleteText">Confirm deletion of category xyz</p>
                    <form id="deleteCategoryForm" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Delete Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editCat(e) {
            let id = e.dataset.id;
            document.getElementById("edit-title").value = document.getElementById("category-" + id).innerHTML;
            document.getElementById("edit-description").innerHTML = document.getElementById("description-" + id).innerHTML;
            document.getElementById("editCategoryForm").action = "/categories/" + id;
        }

        
        function delCat(e) {
            let id = e.dataset.id;
            let category = "Confirma a exclusão da categoria <b>'" + document.getElementById("category-" + id).innerHTML + "'</b>? <br/> Esta ação é irreversível!"
            document.getElementById("deleteText").innerHTML = category;
            document.getElementById("deleteCategoryForm").action = "/categories/" + id;
        }
    </script>

@endsection
