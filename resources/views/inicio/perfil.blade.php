@extends('layouts/public_menu')
@section('content')
    @if($snippet!=NULL) <!--Se verifica si existe ya un cambio-->
        <style>{!! $snippet->css_content !!}</style> <!--para renderizar el CSS sin que se escape automáticamente.-->
        {!! $snippet->html_content !!}  <!--para renderizar el HTML sin que se escape automáticamente.-->
    @else
        <h1>perfil</h1>
    @endif
@endsection
