<div class="modal fade" id="edit-task{{ $task->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Tarea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body row g-3">
                    <form action="{{ route("task.update",$task->id) }}" method="post" autocomplete="off">
                        @method("PATCH")
                        @csrf

                        <div class="col-12">
                            <label for="title" class="form-label">Titulo</label>
                            <input type="text" id="title" name="title" class="form-control"
                                   value="{{ $task->title }}" required>
                        </div>

                        <div class="col-12 mt-2">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea id="description" name="description" class="form-control"
                                      required>{{ $task->description }}</textarea>
                        </div>

                        <div class="col-12 mt-4 text-center">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">ACTULIAZAR</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
