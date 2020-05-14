@extends('dashboard.layout.app')

@section('title') Programcion de Viaje @endsection

@section('content')
<div id="layout-wrapper">

    @include('dashboard.layout.header')
        
    @include('dashboard.layout.menu')

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

            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-xl-5 p-md-3">                   
                                        <div class="table-responsive mb-3" id="Resultados">
                                            <table class="table table-centered table-hover table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                    <th colspan="12" class="text-center">
                                                        <div class="d-inline-block icons-sm mr-2"><i class="fas fa-calendar-alt"></i></div>
                                                        <span class="header-title mt-2">Programacion de viajes enviados por la pagina web</span>
                                                    </th>
                                                </tr>
                                                <!--Parte de busqueda de datos-->
                                                <tr>
                                                    <th colspan="12" class="text-center">
                                                        <form action="/dashboard/programacion-viaje/get-ciudades" method="post" class="d-inline-block w-50">
                                                            @csrf

                                                            <div class="row col-12 text-center">
                                                                <div class="styled-select col-5">
                                                                    <select class="form-control required" id="ciudad_origen" name="ciudad_origen" required onchange="ciudadDestino(this.value)">
                                                                        <option value="">Ciudad Origen</option>
                                                                    </select>
                                                                </div>
                                                                <div class="styled-select col-5">
                                                                    <select class="form-control required" id="ciudad_destino" name="ciudad_destino" required>
                                                                        <option value="">Ciudad Destino</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-2">
                                                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </th>
                                                </tr>
                                                <!--Fin parte de busqueda de datos-->
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Excepcion</th>
                                                        <th scope="col">Origen</th>
                                                        <th scope="col">Destino</th>
                                                        <th scope="col" width="120px">Telefono</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($viajes as $viaje)
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="#">{{ $viaje->id }}</a>
                                                            </th>
                                                            <td>{{ Str::limit($viaje->name, 20) }}</td>
                                                            <td>{{ Str::limit($viaje->tipo_excepcion, 15) }}</td>
                                                            <td>{{ $viaje->ciudad_origen }}</td>
                                                            <td>{{ $viaje->ciudad_destino }}</td>
                                                            <td>{{ $viaje->telefono }}</td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="verSolicitud({{ $viaje->id }})" data-toggle="tooltip" data-placement="top" title="Ver Solicitud">
                                                                    <i class="mdi mdi-eye"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        {{$viajes->links()}}
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row -->

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

</div>
@endsection

