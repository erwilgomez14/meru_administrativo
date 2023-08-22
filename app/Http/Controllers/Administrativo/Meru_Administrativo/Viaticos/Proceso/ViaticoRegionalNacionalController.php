<?php

namespace App\Http\Controllers\Administrativo\Meru_Administrativo\Viaticos\Proceso;

use App\Http\Controllers\Controller;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class ViaticoRegionalNacionalController extends Controller
{
   public function Index()
   {

   return view('administrativo.meru_administrativo.viaticos.proceso.viaticoRegionalNacional.index');
   }
}

