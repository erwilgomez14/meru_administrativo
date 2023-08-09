<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoxUnidad extends Model
{
    use HasFactory;

    protected $primaryKey = 'idexpedientexcargoxunidad';
    protected $connection = 'rrhh';
    protected $table = 'rrhh.exp_expedientexcargoxunidad';
}
