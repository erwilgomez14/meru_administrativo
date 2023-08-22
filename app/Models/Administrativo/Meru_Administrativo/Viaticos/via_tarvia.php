<?php

namespace App\Models\Administrativo\Meru_Administrativo\Viaticos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class via_tarvia extends Model
{
    use HasFactory;

    protected $table='via_tarvia';

    public $timestamps= false;


    protected $fillable = [
        'concepto',
        'nomina',
        'destino',
        'unbidadt',
        'unidadt_exon',
        'referencia',

    ];
    // protected $primaryKey = '';

//     public function via_detvia()
// {
//     return $this->hasMany(via_detvia::class, 'nomina', 'nomina' ,'concepto', 'concepto');
// }




}

