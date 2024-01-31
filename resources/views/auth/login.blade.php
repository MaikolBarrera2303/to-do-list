@extends("layouts.app")

@section("title","Inicion de Sesion")

@section("content")

    <div class="row" style="margin: 10rem 28rem 0 28rem;">
        <div class="col mx-lg-5 mx-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">   <h3 class="pb-4">INICIO SESION</h3>     </div>

                        <form class="row g-3 needs-validation" method="post" action="{{ route("login") }}" autocomplete="off">
                            @csrf

                            <div class="col-12" style="padding-top: 6px">
                                <label for="email" class="form-label h6">Correo Electronico</label>
                                <input type="email" class="form-control border-black" id="email"
                                       name="email" required value="{{ old("email") }}">
                            </div>

                            <div class="col-12" style="padding-top: 6px">
                                <label for="password" class="form-label h6">Contraseña</label>
                                <input type="password" class="form-control border-black" id="password"
                                       name="password" required>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">INICIAR SESION</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
