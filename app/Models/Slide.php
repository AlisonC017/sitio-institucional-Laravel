<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    // Omita esta propiedad si la tabla se llama personas.
    protected $table = 'slides';

    // Omita esta propiedad si la llave primaria se llama id.
    protected $primaryKey = 'id_slide';

    // Utilice false solo si estas columnas no existen.
    public $timestamps = false;
}
