
@extends('template')

@section('contenido')
<style>
<?php echo $snippet->css_content; ?>
</style>
<?php echo $snippet->html_content; ?>
 
@endsection