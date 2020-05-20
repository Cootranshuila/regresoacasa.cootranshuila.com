<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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

        $num_vistos = 0;

        if(auth()->user()->can('universal')){
            $viajes = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.*', 'users.name', 'users.email')
                ->whereNull('visto_at')
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            $date = Carbon::now('America/Bogota');

            $vistos = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.visto_at', 'programacion_viaje.visto_for', 'users.id')
                ->where('visto_at', $date->isoFormat('Y-MM-D'))
                ->where('visto_for', auth()->user()->id)
                ->get();

            $num_vistos = $vistos->count();

            if ($num_vistos < 20) {
                $viajes = DB::table('programacion_viaje')
                    ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                    ->select('programacion_viaje.*', 'users.name', 'users.email')
                    ->whereNull('visto_at')
                    ->orderBy('id', 'desc')
                    ->limit(10)
                    ->get();
            } else {
                $viajes = ['code' => 0, 'registros' => $num_vistos];
            }
            
        }

        // dd(['viajes' => $viajes, 'registros' => $num_vistos]);
        return view('dashboard.programacionViaje.index', ['viajes' => $viajes, 'registros' => $num_vistos]);
    }

    public function verSolicitud($id) {
        if (auth()->user()->can('universal')) {
            $solicitud = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.*', 'users.name', 'users.email')
                ->where('programacion_viaje.id', $id)
                ->get();
        } else {
            $date = Carbon::now('America/Bogota');
            $solicitud_update = Viaje::where('id', $id)
                ->update(['visto_at' => $date, 'visto_for' => auth()->user()->id]);

            $solicitud = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.*', 'users.name', 'users.email')
                ->where('programacion_viaje.id', $id)
                ->get();
        }

        return ['solicitud' => $solicitud];
    }

    public function getCiudades(Request $request) {
        $num_vistos = 0;

        if(auth()->user()->can('universal')){
            $viajes = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.*', 'users.name', 'users.email')
                ->where('ciudad_origen', $request->ciudad_origen)
                ->where('ciudad_destino', $request->ciudad_destino)
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            $date = Carbon::now('America/Bogota');

            $vistos = DB::table('programacion_viaje')
                ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                ->select('programacion_viaje.visto_at', 'programacion_viaje.visto_for', 'users.id')
                ->where('visto_at', $date->isoFormat('Y-MM-D'))
                ->where('visto_for', auth()->user()->id)
                ->get();

            $num_vistos = $vistos->count();

            if ($num_vistos < 20) {
                $viajes = DB::table('programacion_viaje')
                    ->join('users', 'programacion_viaje.user_id', '=', 'users.id')
                    ->select('programacion_viaje.*', 'users.name', 'users.email')
                    ->where('ciudad_origen', $request->ciudad_origen)
                    ->where('ciudad_destino', $request->ciudad_destino)
                    ->whereNull('visto_at')
                    ->orderBy('id', 'desc')
                    ->limit(10)
                    ->get();
            } else {
                $viajes = ['code' => 0, 'registros' => $num_vistos];
            }
        }

        // dd($viajes);
        return view('dashboard.programacionViaje.index', ['viajes' => $viajes, 'registros' => $num_vistos]);
    }

    public function getOrigen() {
        $origenes = Viaje::select('ciudad_origen')->groupBy('ciudad_origen')->get();
        return ['origenes' => $origenes];
    }

    public function getDestino() {
        $destinos = Viaje::select('ciudad_destino')->groupBy('ciudad_destino')->get();
        return ['destinos' => $destinos];
    }

    public function register(Request $request) {
        $user_silog = DB::table('taquilleros_silog')
            ->select('taquilleros_silog.*')
            ->where('cedula', $request['identificacion'])
            ->get();

        if($user_silog->count() == 1){
            $new_user = User::create([
                'name' => $request['name'],
                'identificacion' => $request['identificacion'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            
            if($new_user->save()){
                $new_user->assignRole('taquillero');
    
                return redirect()->route('login-dashboard', ['success' => 1]);
            }
        } else {
            return redirect()->route('register-dashboard', ['error' => 1]);
        }
    }
}
