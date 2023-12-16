



@extends('layouts.plantilla')

@section('contenido')

        <h1 style="margin-top: 8%">{{ $Producto->nombre }}</h1>
<br><br>
<img src="/productos/{{ $Producto->imagen }} " style="width: 35%; margin-left:32.5%">
<h2 style="text-align:center; margin-top: 5%">Específicaciones</h2> <br>
<div class="general" id="especificaciones">
<h3>Generales</h3> <br>
<p>Nombre de modelo: {{ $Producto->nombre }}</p> 
<p>Número de modelo: {{ $Producto->id }}</p> 
<p>{{ $Producto->relTipo->tipo }} {{ $Producto->categoria }}</p> 
</div>
<div class="cuerpo" id="especificaciones">
<h3>Cuerpo</h3><br>
<p>{{ $Producto->cuerpo }}</p><br>
</div>
<div class="mango" id="especificaciones">
    <h3>Mango</h3><br>
    <p>{{ $Producto->mango }}</p> <br>
</div>
<div class="electronica" id="especificaciones">
    <h3>Eléctronica</h3> <br>
    <p>{{ $Producto->electronica }}</p> <br>
</div>

<div class="accesorios" id="especificaciones">
    <h3>Accesorios</h3> <br>
    <p>{{ $Producto->accesorios }}</p> <br>
</div>

<div class="miscelaneos" id="especificaciones">
    <h3>Miscélaneos</h3> <br>
    <p>{{ $Producto->miscelaneos }}</p> <br>

<?php
if( $Producto->relTipo->tipo =="bajo"){
    echo '<p style="margin-top:7%">Puede ser fretless</p>';
}
?>
<br>
</div>
        



        @if( $errors->any() )
            <div class="alert alert-danger col-8 mx-auto p-2">
                <ul>
                    @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


   @endsection