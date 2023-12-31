<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Administrativo\Meru_Administrativo\Configuracion\Usuario;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    protected $table = 'usuarios';

    // protected $time
    public $timestamps = false;
    public function menus()
    {
        // return $this->belongsToMany('App\Models\Menu');
        return $this->belongsToMany(Menu::class, 'usuario_menu_rol', 'id_usuario', 'id_menu');

    }

}
