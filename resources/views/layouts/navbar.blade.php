<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

            <a class="btn btn-outline-primary" style="margin-right: 20px" type="submit" href="{{ route("task.index") }}">
                <i class="bi bi-journal-x"></i>
                Tareas
            </a>

            <a class="btn btn-outline-dark" style="margin-right: 20px" type="submit" href="{{ route("task.bin") }}">
                <i class="bi bi-journal-x"></i>
                Papelera
            </a>

            <a class="btn btn-outline-secondary" style="margin-right: 20px" type="submit" href="{{ route("user.show",auth()->id()) }}">
                <i class="bi bi-person-fill-gear"></i>
                Perfil
            </a>

            <form class="d-flex" action="{{ route("logout") }}" method="post">
                @csrf
                <button class="btn btn-outline-danger" type="submit">
                    <i class="bi bi-box-arrow-right"></i>
                    Cerrar Sesion
                </button>
            </form>
        </div>
    </div>
</nav>
