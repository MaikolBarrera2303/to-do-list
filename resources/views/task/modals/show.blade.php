<div class="modal fade" id="show-task{{ $task->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    @if($task->state === 1)
                        <span class="badge text-bg-success mb-2">Completa</span>
                    @else
                        <span class="badge text-bg-warning mb-2">Incompleta</span>
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body row g-3">

                    <h5 class="text-center">{{ $task->title }}</h5>
                    <p style="text-align: justify">{{ $task->description }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
