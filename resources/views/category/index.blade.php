



@section('content')
    <h1>Categorias</h1>


    <div class="card">
        <div class="card-content">
            <div class="votes">
                <i class="fa-solid fa-chevron-up"></i>
                <span class="vote-count">0</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="question">
                <div class="question-top">
                    <h3 class="question-title">Titulo</h3>
                    <p id="question-date">hh:mm:ss</p>
</div>
                <p class="question-view">Descrição</p>
            </div>
        </div>
        <div class="views">
            <p><i class="fa-regular fa-eye"></i>0</p>
            <p><i class="fa-regular fa-comment"></i>0</p>
        </div>
        <div class="comments-section">
            <div class="comment">
                <p>Comentario</p>
                <span>Comentado em: dd/mm/aa hh:mm:ss</span>
            </div>
        </div>



        {{$category}}
    @endsection

    @section('actionButton')

<!-- Create Topic Modal -->
<div class="modal fade" id="createTopicModal" tabindex="-1" aria-labelledby="createTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTopicModalLabel">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createTopicForm" action="({ route('categories.store') })" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ViewName" value="#">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-controler" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Category</button>
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
                    <form id="editCategoryForm" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="deleteText">Confirm deletion of category xyz</p>
                    <form id="deleteCategoryForm" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-primary">Delete Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setId(e) {
            let id = e.dataset.id;
            let category = "Confirma a exclusão da categoria <b>'" + document.getElementById("category-" + id).innerHTML + "'</b>? <br/> Esta"
            document.getElementById("deleteText").innerHTML = category;
            document.getElementById("deleteCategoryForm").action = "/categories/destroy";
        }
    </script>

@endsection