<?php

namespace App\Models\Administrativo\Meru_Administrativo\Viaticos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class via_corr_viatico extends Model
{
    use HasFactory;

    protected $table='via_corr_viatico';

    public $timestamps= false;


    protected $fillable = [
        'ano_pro',
        'nro_via',
        'gerencia',

    ];
    // protected $primaryKey = '';


}

