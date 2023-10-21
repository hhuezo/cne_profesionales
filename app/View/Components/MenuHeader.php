<?php

namespace App\View\Components;

use App\Models\configuracion\HeaderFooter;
use Illuminate\View\Component;

class MenuHeader extends Component
{

    public function __construct()
    {
        //
    }

    public function render()
    {
        $configuracion = HeaderFooter::first();
        return view('components.menu-header', ['configuracion' => $configuracion]);
    }
}
