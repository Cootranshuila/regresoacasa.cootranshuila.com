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

    public function programacionViaje()
    {
        $viajes = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.*', 'users.name', 'users.email')
                ->paginate(10);

        // dd($viajes);
        return view('dashboard.programacionViaje.index', ['viajes' => $viajes]);
    }

    public function verSolicitud($id)
    {
        $solicitud = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.*', 'users.name', 'users.email')
                ->where('programacion_viaje.id', $id)
                ->get();

        // dd($viajes);
        return ['solicitud' => $solicitud];
    }
}
