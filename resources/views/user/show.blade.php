@extends("layouts.app")

@section("title","Perfil")

@section("content")

    @include("layouts.message")

    <div class="row" style="margin: 2rem 28rem 0 28rem;">
        <div class="col mx-lg-5 mx-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">   <h3 class="pb-4">EDITAR PERFIL</h3>     </div>

                        <form class="row g-3 needs-validation" method="post"
                              action="{{ route("user.update",$user->id) }}" autocomplete="off">
                            @method("PATCH")
                            @csrf

                            <div class="col-12" style="padding-top: 6px">
                                <label for="name" class="form-label h6">Nombre</label>
                                <input type="text" class="form-control border-black" id="name"
                                       name="name" required value="{{ $user->name }}">
                            </div>

                            <div class="col-12" style="padding-top: 6px">
                                <label for="email" class="form-label h6">Correo Electronico</label>
                                <input type="email" class="form-control border-black" id="email"
                                       name="email" required value="{{ $user->email }}">
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success mb-2">ACTUALIZAR</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                {{-- Cambio de contraseña--}}

                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">   <h3 class="pb-4">CAMBIAR CONTRASEÑA</h3>     </div>

                        <form class="row g-3 needs-validation" method="post"
                              action="{{ route("user.password",$user->id) }}" autocomplete="off">
                            @method("PATCH")
                            @csrf

                            <div class="col-12" style="padding-top: 6px">
                                <label for="current_password" class="form-label h6">Contraseña Actual</label>
                                <input type="password" class="form-control border-black" id="current_password"
                                       name="current_password" required>
                            </div>

                            <div class="col-12" style="padding-top: 6px">
                                <label for="password" class="form-label h6">Contraseña Nueva</label>
                                <input type="password" class="form-control border-black" id="password"
                                       name="password" required>
                            </div>

                            <div class="col-12" style="padding-top: 6px">
                                <label for="password_confirmation" class="form-label h6">Repetir Contraseña Nueva</label>
                                <input type="password" class="form-control border-black" id="password_confirmation"
                                       name="password_confirmation" required>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success mb-2">ACTUALIZAR</button>
                                    <form class="btn mt-4" action="{{ route("user.destroy",$user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return window.confirm('¿Quiere eliminar su cuenta?')">ELIMINAR CUENTA</button>
                                    </form>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            {{--  Eliminar cuenta  --}}
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">   <h3 class="pb-4">ELIMINAR CUENTA</h3>     </div>
                        <h6 class="text-center">Esta opcion es irreversible este seguro de que quiere eliminar su cuenta </h6>
                        <form class="row g-3 needs-validation" method="post"
                              action="{{ route("user.destroy",$user->id) }}" autocomplete="off">
                            @method("DELETE")
                            @csrf

                            <div class="col-12" style="padding-top: 20px">
                                <label for="current_password" class="form-label h6">Contraseña Actual</label>
                                <input type="password" class="form-control border-black" id="current_password"
                                       name="current_password" required>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return window.confirm('¿Quiere eliminar su cuenta?')">
                                        ELIMINAR CUENTA
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
