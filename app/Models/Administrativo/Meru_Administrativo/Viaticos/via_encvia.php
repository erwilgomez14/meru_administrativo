<?php

namespace App\Models\Administrativo\Meru_Administrativo\Viaticos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class via_encvia extends Model
{
    use HasFactory;

    protected $table='via_encvia';

    public $timestamps= false;


    protected $fillable = [
        'ano_pro',
        'nro_via',
        'solicitante',
        'cedula',
        'cargo',
        'gerencia',
        'supervisor',
        'fecha_sal',
        'fecha_ret',
        'origen',
        'destino',
        'acompanante',
        'elabora',
        'fecha_elab',
        'autoriza',
        'fecha_aut',
        'motivo_via',
        'observ_via',
        'conforma',
        'fecha_conf',
        'aprueba',
        'fecha_aprob',
        'total_viatico',
        'nomina',
        'tipo_traslado',
        'status',
        'valor_ut',
        'rend_fact',
        'rend_pase',
        'hora_retor',
        'hora_sal',
        'anula',
        'fecha_anul',
        'recibe',
        'fecha_recb',
        'ficha_solic',
        'ext_telef',
        'centro_costo',
        'cta_x_pagar_',
        'nro_pago',
        'nomenc',
        'zona',
        'causa_anulac',
        'cta_gasto_via',
        'fecha_modif',
        'modifica',
        'modificacion',
        'cronograma_',
        'fecha_cronog',
        'ano_causado',
        'clave',
        'nomina_emp',
        'rinde',
        'fecha_rrinde',
        'arinde',
        'fecha_arind',
        'devolverr',
        'fecha_devolverr',
        'causa_devolverr',
        'nota_rendic',
        'boleto',
        'alojamiento',
        'fecha_rind',
        'rrinde',
        'referencia',

    ];
    // protected $primaryKey = '';


}
