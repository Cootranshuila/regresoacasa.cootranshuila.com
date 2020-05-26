<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Mail\ConfirmacionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Viaje;
use App\User;

class ViajeController extends Controller
{
    public function registrar(Request $request) {
        
        // Cargar la imagen al Servidor
        if (!$request['file_certificado']) {
            $foto = 'avatar.png';
        } else {
            if ($foto = Viaje::setFoto($request->file_certificado)) {
                $request->request->add(['fotoName' => $foto]);

                $name_certificado = $request['fotoName'];
            }
        }

        // Cargar la imagen al Servidor
        if ($request['file_registro_civil']) {
            if ($foto = Viaje::setFoto($request->file_registro_civil)) {
                $request->request->add(['fotoName' => $foto]);

                $name_registro_civil = $request['fotoName'];
            }
        } else {
            $name_registro_civil = NULL;
        }

        // Subimos al servidor la solicitud juramentada
        $name_file_solicitud = Str::random(20).'.pdf';
        Storage::disk('public')->put('docs/solicitud/'.$name_file_solicitud, File::get($request->file('file_solicitud')));

        // Buscamos si el Usuario ya esta creado
        $user = User::where('email', $request['email'])->get();

        // Si no esta creado lo creamos
        if ($user->isEmpty()) {
            $new_user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            $new_user->save();
        }

        // Asignamos el id del usuario para la relacion
        if ($user->isEmpty()) {
            $user_id = $new_user->id;
            $user_name = $new_user->name;
            $user_email = $new_user->email;
        } else {
            $user_id = $user[0]->id;
            $user_name = $user[0]->name;
            $user_email = $user[0]->email;
        }
        
        // Creamos el negocio
        $new_viaje =  Viaje::create([
            'tipo_excepcion' => $request['tipo_excepcion'],
            'dpt_origen' => $request['departamento_origen'],
            'ciudad_origen' => $request['ciudad_origen'],
            'dpt_destino' => $request['departamento_destino'],
            'ciudad_destino' => $request['ciudad_destino'],
            'tipo_identificacion' => $request['tipo_identificacion'],
            'numero_identificacion' => $request['numero_identificacion'],
            'telefono' => $request['telefono'],
            'menor_edad' => $request['menor_edad'],
            'edad_del_menor' => $request['edad_del_menor'],
            'dir_actual' => $request['dir_actual'],
            'dir_destino' => $request['dir_destino'],
            'file_certificado' => $name_certificado,
            'file_registro_civil' => $name_registro_civil,
            'file_solicitud' => $name_file_solicitud,
            'user_id' => $user_id,
        ]);
            
        // Retornamos la vista con el mensaje
        if ($new_viaje->save()) {
            $data_mail = ['nombre' => $user_name, 'correo' => $user_email, 'origen' => $new_viaje->ciudad_origen, 'destino' => $new_viaje->ciudad_destino];

            Mail::to($user_email)->send(new ConfirmacionMail($data_mail));
            // dd($data_mail);
            return redirect()->route('welcome', ['success' => 'El registro de programacion de viaje se realizo correctamente.']);
        } else {
            return redirect()->route('welcome', ['error' => 'Ocurrio algun problema, por favor intentelo de nuevo en unos minutos o contactese con el soporte tecnico.']);
        }
    }
}
