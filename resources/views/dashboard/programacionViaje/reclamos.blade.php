@extends('dashboard.layout.app')

@extends('dashboard.layout.modal')

@section('title') PQR @endsection

<div id="layout-wrapper">

@extends('dashboard.layout.header')

@extends('dashboard.layout.menu')

@section('content')
<div class="main-content">

    <div class="page-content">
        
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Dashboard</h4>
                        <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Panel del Administrador</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                            <div class="date text-white">
                                <span id="weekDay" class="weekDay"></span>, 
                                <span id="day" class="day"></span> de
                                <span id="month" class="month"></span> del
                                <span id="year" class="year"></span>
                            </div>
                            <div class="clock text-white text-right">
                                <span id="hours" class="hours"></span> :
                                <span id="minutes" class="minutes"></span> :
                                <span id="seconds" class="seconds"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <style>
         .right{
            float: right; 
        }
        </style>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-5">                   
                                    <div class="table-responsive mb-3" id="Resultados">
                                        <table class="table table-centered table-hover table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th colspan="12" class="text-center">
                                                <div class="d-inline-block icons-sm mr-2"><i class="far fa-angry"></i></div>
                                                    <span class="header-title mt-2">Reclamos enviados desde la página web</span>
                                                </th>
                                            </tr>
                                            <!--Parte de busqueda de datos-->
                                            <tr>
                                                <th colspan="12">
                                                    <div class="col-8 right mt-2">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="texto" placeholder="Ingrese nombre">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Buscar</span>
                                                                </div>
                                                        </div> 
                                                    </div>
                                                </th>
                                            </tr>
                                            <!--Fin parte de busqueda de datos-->
                                                <tr>
                                                    <th scope="col">N°</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Teléfono</th>
                                                    <th scope="col">Correo</th>
                                                    <th scope="col">Mensaje</th>
                                                    <th scope="col" width="120px">Fecha</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reclamos as $reclamo)
                                                    <tr>
                                                        <th scope="row">
                                                            <a href="#">{{ $reclamo->num_correo }}</a>
                                                        </th>
                                                        <td>{{ Str::limit($reclamo->nombre_usu, 15) }}</td>
                                                        <td>{{ $reclamo->telefono_usu }}</td>
                                                        <td>{{ Str::limit($reclamo->correo_usu, 20) }}</td>
                                                        <td>{{ Str::limit($reclamo->mensaje_usu, 60) }}</td>
                                                        <td>{{ $reclamo->fecha_correo }}</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="verPQR({{ $reclamo->num_correo }})" data-toggle="tooltip" data-placement="top" title="Ver Reclamo">
                                                                <i class="mdi mdi-eye"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{$reclamos->links()}}
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>

     <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-sm-right d-none d-sm-block">
                        2020 © Cootranshila.
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
</div>