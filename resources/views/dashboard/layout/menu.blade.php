<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menú</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div><span class="badge badge-pill badge-success float-right">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">
                    @routeIs('dashboard') Aplicaciones @else Aplicacion: @endif
                    <i>
                        @if ( Request::is('dashboard/programacion-viaje') || Request::is('dashboard/programacion-viaje/*') ) Programacion Viaje @endif
                        @if ( Request::is('dashboard/especial') || Request::is('dashboard/especial/*') ) Servicio Especial @endif
                        @if ( Request::is('dashboard/sanciones') || Request::is('dashboard/sanciones/*') ) Operativos y Sanciones @endif
                        @if ( Request::is('dashboard/modemygps') || Request::is('dashboard/modemygps/*') ) Modem y GPS @endif
                        @if ( Request::is('dashboard/postulados') || Request::is('dashboard/postulados/*') ) Postulados @endif
                        @if ( Request::is('dashboard/turismo') || Request::is('dashboard/turismo/*') ) Turismo @endif
                    </i> 
                </li>

                <!-- MENU del Index del Dashboard -->
                @routeIs('dashboard')

                    @canany(['viajes', 'universal'])
                        <li>
                            <a href="{{ route('programacion-viaje') }}" class=" waves-effect">
                                <div class="d-inline-block icons-sm mr-2"><i class="fas fa-calendar-alt"></i></div>
                                <span> Programacion de Viaje</span>
                            </a>
                        </li>
                    @endcanany

                    {{-- @canany(['servicio-especial', 'universal'])
                        <li>
                            <a href="{{ route('especial') }}" class=" waves-effect">
                                <div class="d-inline-block icons-sm mr-2"><i class="fas fa-tachometer-alt"></i></div>
                                <span> Servicio Especial</span>
                            </a>
                        </li>
                    @endcanany

                    @canany(['sanciones', 'universal'])
                        <li>
                            <a href="{{ route('sanciones') }}" class=" waves-effect">
                                <div class="d-inline-block icons-sm mr-2"><i class="fas fa-exclamation-triangle"></i></div>
                                <span> Sanciones</span>
                            </a>
                        </li>
                    @endcanany

                    @canany(['modem-gps', 'universal'])
                        <li>
                            <a href="{{ route('modemygps') }}" class=" waves-effect">
                                <div class="d-inline-block icons-sm mr-2"><i class="fas fa-wifi"></i></div>
                                <span> Modem y GPS</span>
                            </a>
                        </li>
                    @endcanany

                    @canany(['postulados', 'universal'])
                        <li>
                            <a href="{{ route('postulados') }}" class=" waves-effect">
                                <div class="d-inline-block icons-sm mr-3"><i class="fas fa-user-tie"></i></div>
                                <span> Postulados</span>
                            </a>
                        </li>
                    @endcanany

                    @canany(['turismo', 'universal'])
                        <li>
                            <a href="{{ route('turismo') }}" class=" waves-effect">
                                <div class="d-inline-block icons-sm mr-2"><i class="fas fa-plane-departure"></i></div>
                                <span> Turismo</span>
                            </a>
                        </li>
                    @endcanany --}}

                @endif

                <!-- MENU del PQR -->
                {{-- @if ( Request::is('dashboard/pqr') || Request::is('dashboard/pqr/*') )
                    <li>
                        <a href="{{ route('pqr-correos') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-2"><i class="fa fa-envelope"></i></div>
                            <span> Correos</span> 
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pqr-reclamos') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-2"><i class="fas fa-exclamation-triangle"></i></div>
                            <span> Reclamos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pqr-sugerencias') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-2"><i class="fa fa-briefcase"></i></div>
                            <span> Sugerencias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pqr-quejas') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-2"><i class="fas fa-clipboard-list"></i></div>
                            <span> Quejas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pqr-felicitaciones') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-2"><i class="fa fa-laugh-beam"></i></div>
                            <span> Felicitaciones</span>
                        </a>
                    </li>

                    <li class="menu-title">Otros</li>

                    <li>
                        <a href="{{ route('pqr-contestados') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-2"><i class="fa fa-envelope-open-text"></i></div>
                            <span> Contestados</span>
                        </a>
                    </li>
                @endif --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>