<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Viaje extends Model
{
    protected $table = 'programacion_viaje';

    protected $fillable = [
        'id', 'tipo_excepcion', 'dpt_origen', 'ciudad_origen', 'dpt_destino', 'ciudad_destino', 'tipo_identificacion', 'numero_identificacion', 'telefono', 'menor_edad', 'edad_del_menor', 'dir_actual', 'dir_destino', 'file_certificado', 'file_registro_civil', 'file_solicitud', 'user_id'
    ]; 

    public static function setFoto($foto) {
        if ($foto) {
            $imageName = Str::random(20).'.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);

            Storage::disk('public')->put('imagenes/certificados/'.$imageName, $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
        
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

         	   