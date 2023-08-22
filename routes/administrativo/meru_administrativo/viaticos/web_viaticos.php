<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrativo\Meru_Administrativo\Viaticos\Ambiente\TarifaInternacionalController;
use App\Http\Controllers\Administrativo\Meru_Administrativo\Viaticos\Ambiente\TarifaNacionalController;
use App\Http\Controllers\Administrativo\Meru_Administrativo\Viaticos\Ambiente\ZonasInternacionalesController;
use App\Http\Controllers\Administrativo\Meru_Administrativo\Viaticos\Proceso\AjusteViaticosController;
use App\Http\Controllers\Administrativo\Meru_Administrativo\Viaticos\Proceso\ViaticoRegionalNacionalController;
use App\Http\Controllers\Administrativo\Meru_Administrativo\Viaticos\Proceso\ViaticoInternacionalController;


/*-------------------------------------------------------------------------*/
/*                     Rutas del Modulo Vidatico                           */
/*----------------------------Andarte Angel--------------------------------*/
/*-------------------------------------------------------------------------*/

// Viatico Ambiente
Route::controller(ZonasInternacionalesController::class)
	->middleware(['auth', 'periodo-fiscal'])
	->prefix('viaticos/ambiente')
	->name('viaticos.ambiente.ZonasInternacionales.')
	->group(function () {

		Route::get('zonas', 'index')->name('index');
		Route::get('proveedores/create', 'create')->name('create');
		Route::post('proveedores', 'store')->name('store');
		Route::get('proveedores/{proveedor}/edit', 'edit')->name('edit');
		Route::get('proveedores/{proveedor}', 'show')->name('show');
		Route::put('proveedores/{proveedor}', 'update')->name('update');
	});



// Route::controller(ViaticosRegionalNacionalController::class)
// ->middleware(['auth', 'periodo-fiscal'])
// ->prefix('viaticos/procesos')
// ->name('viaticos.proceso.viaticosRegionalNacional.')
// ->group(function () {

//     Route::get('viaticos', 'index')->name('index');
//     Route::get('proveedores/create', 'create')->name('create');
//     Route::post('proveedores', 'store')->name('store');
//     Route::get('proveedores/{proveedor}/edit', 'edit')->name('edit');
//     Route::get('proveedores/{proveedor}', 'show')->name('show');
//     Route::put('proveedores/{proveedor}', 'update')->name('update');
// });
