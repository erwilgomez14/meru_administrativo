<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Administrativo\Meru_Administrativo\Viaticos\Proceso\ViaticosRegionalNacionalController;


// Proveedores
Route::controller(ViaticosRegionalNacionalController::class)
	->middleware(['auth', 'periodo-fiscal'])
	->prefix('viaticos/procesos')
	->name('viaticos.proceso.viaticosRegionalNacional.')
	->group(function () {

		Route::get('viaticos', 'index')->name('index');
		//Route::get('proveedores/create', 'create')->name('create');
		//Route::post('proveedores', 'store')->name('store');
		//Route::get('proveedores/{proveedor}/edit', 'edit')->name('edit');
		//Route::get('proveedores/{proveedor}', 'show')->name('show');
		//Route::put('proveedores/{proveedor}', 'update')->name('update');
	});
