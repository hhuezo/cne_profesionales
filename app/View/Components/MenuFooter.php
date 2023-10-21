<?php

namespace App\View\Components;

use App\Models\configuracion\HeaderFooter;
use Illuminate\View\Component;

class MenuFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function render()
    {
        $configuracion = HeaderFooter::first();
        return view('components.menu-footer', ['configuracion' => $configuracion]);
    }
}
