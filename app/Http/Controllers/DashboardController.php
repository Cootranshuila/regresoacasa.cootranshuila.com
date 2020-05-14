<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Viaje;
use App\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function programacionViaje() {
        $viajes = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.*', 'users.name', 'users.email')
                ->paginate(10);

        // dd($viajes);
        return view('dashboard.programacionViaje.index', ['viajes' => $viajes]);
    }

    public function verSolicitud($id) {
        $solicitud = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.*', 'users.name', 'users.email')
                ->where('programacion_viaje.id', $id)
                ->get();

        // dd($viajes);
        return ['solicitud' => $solicitud];
    }

    public function getCiudades(Request $request) {
        $viajes = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.*', 'users.name', 'users.email')
                ->where('ciudad_origen', $request->ciudad_origen)
                ->where('ciudad_destino', $request->ciudad_destino)
                ->paginate(10);

        // dd($viajes);
        return view('dashboard.programacionViaje.index', ['viajes' => $viajes]);
    }


    public function getOrigen() {
        $origenes = Viaje::select('ciudad_origen')->groupBy('ciudad_origen')->get();
        return ['origenes' => $origenes];
    }

    public function getDestino() {
        $destinos = Viaje::select('ciudad_destino')->groupBy('ciudad_destino')->get();
        return ['destinos' => $destinos];
    }
}
