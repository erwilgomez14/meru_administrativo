<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_empleados extends Model
{
    use HasFactory;

    // protected $primaryKey = 'idempleado';
    protected $connection = 'rrhh';
    protected $table = 'rrhh.vis_exp_datos_empleado';
}
