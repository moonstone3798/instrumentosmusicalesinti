@extends('layouts.plantilla')
@section('contenido')
<div class="fondo">
    <img src="../productos/fondo inti.jpg" alt=""  style="opacity: 0.9; object-fit:fill; width:80%; margin-left: 10% ">
<div class="texto"><h1 style="color: white; margin-top:-12%; margin-bottom:4%; width:60%; height:30%; margin-left:20%;">Instrumentos</h1></div>
</div>
 <br><br>

<div class="buscar" style="display:inline-block; vertical-align: middle; margin-left:38%; ">
<form action="" method="get">
     @csrf
<input type="search" placeholder="Buscar instrumento" name="texto" style="width:50%; ">
<select name="ordenar">
<option value="">Ordenar por:</option>
<option value="menor">menor precio</option>
<option value="mayor">mayor precio</option>
<input type="submit" value="buscar" name="buscar">
</select>
</div>
<br><br><br>

<div class="filtro"  border="1" style="width: 18%; display:inline-block; float: left; border-radius:4%;color:rgb(243, 242, 242)">

<br> <br>
<h2 style="text-align: center; font-weight: bolder;">Filtros</h2>
<br>
<h4>Tipo de instrumento </h4>
<input type="radio" name="tipo" value="guitarra"> Guitarra
<br>
<input type="radio" name="tipo" value="bajo"> Bajo
<br>
<input type="radio" name="tipo" value="ukelele"> Ukelele
<br><br>
<h4>Categorias </h4>
<input type="radio" name="categoria" value="electricos"> Eléctricos
<br>
<input type="radio" name="categoria" value="acusticos"> Acústicos
<br><br>
<input type="submit" name="aplicar" value="Aplicar Filtro" style="margin-left:30%">
</form>
<br><br>
</div>



        <div class="row" style="width: 82%; display:inline-block; float:right; ">

            @foreach($productos as $producto)
            <a class="now-get get-cart" href="./inicio&id/{{$producto->id}}" >
                <div class="col" style="display: inline-block; margin-right:0%; margin-left: 2%;width: 30.5%; color:rgb(243, 242, 242)">
                    <div class="card" style="border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px, 2px, rgba(0,0,0,0.24);">
                        <img src="/productos/{{ $producto->imagen }} " style="width: 100%;">
                            <br>
                            <h3 style=" text-align: center; font-size:22px; width:100%">{{ $producto->nombre }}</h3>
                            <br>
                            <p>
                                Precio: $ {{ $producto->precio }}<br>
                                <?php 
                                $num=$producto->precio;
                                $num2=3;
        
                                $divi=$num/$num2;
echo "En 3 cuotas de: $ ". round($divi)."<br>";   
              
                                ?>
                            </p>
        
                    </div>
                    <br><br>
                </div>
                </a>
            @endforeach

        </div>

        <div class="paginador">
        {{ $productos->links() }}
    </div>
@endsection