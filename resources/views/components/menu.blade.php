<div>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <nav id="navbar" class="navbar">
                <ul class="text-center">
                    @foreach ($menus as $menu)
                        <a href="{{ $menu->Snippet != null ? url('publico/pagina') . '/' . $menu->Snippet : '' }}">
                            <li class="dropdown">

                                <span>{{ $menu->Descripcion }}</span>
                                <i class="bi bi-chevron-down"></i>
                                @if ($menu->sub_menus($menu->Id) > 0)
                                    <ul>
                                        @foreach ($sub_menus as $sub_menu)
                                            @if ($sub_menu->Antesesora == $menu->Id)
                                                <a
                                                    href="{{ $sub_menu->Snippet != null ? url('publico/pagina') . '/' . $sub_menu->Snippet : '' }}">
                                                    <li class="dropdown" style="text-align: left">
                                                        <span>{{ $sub_menu->Descripcion }}
                                                        </span>
                                                    </li>
                                                </a>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif

                            </li>
                        </a>
                    @endforeach
                    <li class="dropdown"><a href="{{ url('publico/busqueda') }}"><span>Personas certificadas</span>
                        </a>

                    </li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
</div>
