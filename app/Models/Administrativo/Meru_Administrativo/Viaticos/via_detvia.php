<?php

namespace App\Models\Administrativo\Meru_Administrativo\Viaticos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class via_detvia extends Model
{
    use HasFactory;

    protected $table='via_detvia';

    public $timestamps= false;


    protected $fillable = [
        'ano_pro',
        'nro_via',
        'concepto',
        'cantidad',
        'valor_unit',
        'total_concept',
        'total_otorg',
        'total_ajuste',
        'gerencia',
        'nomina',
        'valor_unid',

    ];
    // protected $primaryKey = '';


}
