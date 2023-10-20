<?php

namespace App\View\Components;

use App\Models\configuracion\Menu as MenuModel;
use Illuminate\View\Component;

class Menu extends Component
{
   
    public $menus;
    public $sub_menus;
    public function __construct()
    {
    }

    public function render()
    {
        $this->menus = MenuModel::where('Antesesora', '=', null)->get();
        $this->sub_menus = MenuModel::where('Antesesora', '<>', null)->get();
        return view('components.menu', ['menus' => $this->menus, 'sub_menus' => $this->sub_menus]);
    }
}
