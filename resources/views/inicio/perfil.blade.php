@extends('layouts/public_menu')
@section('content')
    @if($snippet!=NULL)
        <style>{!! $snippet->css_content !!}</style>
        {!! $snippet->html_content !!}
    @else
        <h1>perfil</h1>
    @endif
@endsection
