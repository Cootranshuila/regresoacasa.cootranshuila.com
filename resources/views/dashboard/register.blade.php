@extends('dashboard.layout.app')

@section('title') Registrarse @endsection

@section('content')
<body class="bg-primary bg-pattern">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <a href="login" class="logo"><img src="{{ asset('assets_admin/images/logo-light.png') }}" height="60" alt="logo"></a>
                        <h5 class="font-size-16 text-white-50 mt-2 mb-4">Dashboard Admin - Cootranshuila LTDA</h5>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-xl-5 col-sm-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Ingresa con tu cuenta.</h5>
                                @if(isset($_GET['error']))
                                    <div class="alert alert-danger bg-danger text-white border border-danger text-center mb-4" role="alert">
                                        Ocurrio un error, contacte al soporte.
                                    </div>
                                @endif
                                
                                <form class="form-horizontal" method="POST" action="{{route('dashboard-register') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="name" class="form-control" id="name" name="name" required autofocus>
                                                <label for="name">Nombre</label>
                                            </div>

                                            <div class="form-group form-group-custom mb-4">
                                                <input type="identificacion" class="form-control" id="identificacion" name="identificacion" required>
                                                <label for="identificacion">Identificación</label>
                                            </div>

                                            <div class="form-group form-group-custom mb-4">
                                                <input type="email" class="form-control" id="email" name="email" required>
                                                <label for="email">Correo</label>
                                            </div>

                                            <div class="form-group form-group-custom mb-4">
                                                <input type="password" class="form-control" id="password" name="password" required>
                                                <label for="password">Contraseña</label>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Registrarse</button>
                                            </div>
                                            <div class="mt-5 text-center">
                                                <h6 class="text-muted">Cootranshuila @ 2020</h6>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</body>
@endsection