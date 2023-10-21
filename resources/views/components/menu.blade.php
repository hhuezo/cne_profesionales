<div>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <nav id="navbar" class="navbar">
                <ul class="text-center">
                    @foreach ($menus as $menu)
                        <li class="dropdown"><a
                                href="{{ $menu->Snippet != null ? url('publico/pagina') . '/' . $menu->Snippet : '' }}"><span>{{ $menu->Descripcion }}</span>
                                <i class="bi bi-chevron-down"></i></a>
                            @if ($menu->sub_menus($menu->Id) > 0)
                                <ul>
                                    @foreach ($sub_menus as $sub_menu)
                                        @if ($sub_menu->Antesesora == $menu->Id)
                                            <li class="dropdown"><a
                                                    href="{{ $sub_menu->Snippet != null ? url('publico/pagina') . '/' . $sub_menu->Snippet : '' }}"><span>{{ $sub_menu->Descripcion }}
                                                    </span></a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endforeach
                    <li class="dropdown"><a href="{{ url('publico/busqueda') }}"><span>Personas certificadas</span>
                        </a>

                    </li>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </ul>

            </nav>
        </div>
    </header>
</div>
