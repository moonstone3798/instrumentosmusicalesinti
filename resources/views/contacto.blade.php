@extends('layouts.plantilla')
@section('contenido')
<br><br>
<h1>Contacto</h1>
<br>
<div id="contacto" class="contacto">
<form action="enviar.php" method="post" onsubmit="return validarContacto();">
<br>
<input type="text" class="textbox" placeholder="Nombre" id="nombre" name="nombre" required>
<br><br>
<input type="email" class="textbox" placeholder="E-Mail" id="email" name="email" required>
<br><br>
<textarea placeholder="Mensaje" name="mensaje" id="mensaje" required></textarea>
<br><br>
<input type="submit" value="Enviar">
<br>
<br>
<br>
</div>



</form>

@endsection