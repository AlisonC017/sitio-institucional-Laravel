<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{

    // Omita esta propiedad si la tabla se llama personas.
    protected $table = 'Noticias';

    // Omita esta propiedad si la llave primaria se llama id.
    protected $primaryKey = 'id_noticia';

    // Utilice false solo si estas columnas no existen.
    public $timestamps = false;

    public static function topTresRecientes()
    {
        //Esto es parche XD, ordena por id ya que es autoincremental, pero lo ideal seria usar fechas
        return self::orderBy('id_noticia', 'desc')->take(3)->get();
    }
}
