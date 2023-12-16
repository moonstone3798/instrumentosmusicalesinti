@extends('layouts.plantilla')

@section('contenido')

        <h1 style="margin-top: 5%">{{ $Artista->nombre }}</h1>
<br>
<div  class="modal"  id="img1">

<div class="imagenes">
<?php
if( $Artista->imagen2 ==!NULL){
    echo '<a href="#img2">&#60;</a>';

}
?>

    <img src="/artistas/{{ $Artista->imagen }}" style="width:600px; height:550px; object-fit:fill">

    <?php
if( $Artista->imagen2 ==!NULL){
   
    echo ' <a href="#img2">></a>';
}
?>
</div>
</div>


<div  class="modal" id="img2">
<div class="imagenes">
    <a href="#img1">&#60;</a>
   <img src="/artistas/{{ $Artista->imagen2 }}" style="width:600px; height:550px; object-fit:fill">
    <a href="#img1">></a>
</div>
</div>


<br><br>

        



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