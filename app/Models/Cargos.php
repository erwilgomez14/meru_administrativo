<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;

    protected $primaryKey = 'idcargoxnivel';
    protected $connection = 'rrhh';
    protected $table = 'rrhh.emp_cargoxniveles';
}
