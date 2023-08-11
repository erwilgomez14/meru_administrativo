<?php

namespace App\Http\Controllers\Administrativo\Meru_Administrativo\Viaticos\Proceso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViaticosRegionalNacionalController extends Controller
{
    public function index()
    {
        return view('administrativo.meru_administrativo.viaticos.proceso.viaticosRegionalNacional.index');
    }
}
