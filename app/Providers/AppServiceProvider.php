<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Administrativo\Meru_Administrativo\Configuracion\RegistroControl;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
		// View::composer (app, Menu, periodos) - Siasm
		View::composer(['home'] , function ($view) {
			$view->with([
				'app'  => 'Merú',
				'menu' => Menu::menus('meru'),
				'periodos' => RegistroControl::periodosAbiertos(),
			]);
		});

		View::composer(['administrativo.meru_administrativo.*'] , function ($view) {
			$view->with([
				'app'  => 'Merú',
				'menu' => Menu::menus('meru'),
				'periodos' => RegistroControl::periodosAbiertos(),
			]);
		});
	}
}