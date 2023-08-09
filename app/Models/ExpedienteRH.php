<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedienteRH extends Model
{
    use HasFactory;

    protected $primaryKey = 'idempleado';
    protected $connection = 'rrhh';
    protected $table = 'rrhh.exp_expedientes';
}
