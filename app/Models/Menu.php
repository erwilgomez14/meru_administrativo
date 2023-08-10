<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $guarded = [];

    public function getChildren($data, $line)
    {
        $children = [];
        foreach ($data as $line1) {
            if ($line['id'] == $line1['padre']) {
                $children = array_merge($children, [ array_merge($line1, ['submenu' => $this->getChildren($data, $line1) ]) ]);
            }
        }

        // dd($children);

        return $children;
    }

    public function optionsMenu($aplicacion)
    {
        $user = Auth::user()->menus()
        ->orderby('padre')
        ->orderby('orden')
        ->orderby('nombre')
        ->get()
        ->toArray();
        
        return $user;
    }

    public function optionHijos($aplicacion)
    {
        $user = $this->optionsMenu($aplicacion);

        // dd($user);
        return $user;
    }

    public static function menus($aplicacion)
    {
        
        $menus = new Menu();
        $data = $menus->optionsMenu($aplicacion);
        //dd($data);
        // dd($menus->optionHijos($aplicacion));
        $menuAll = [];
        foreach ($data as $line) {
            $item = [ array_merge($line, ['submenu' => $menus->getChildren($data, $line) ]) ];
            $menuAll = array_merge($menuAll, $item);
        }
        
        return $menus->menuAll = $menuAll;
    }
}
