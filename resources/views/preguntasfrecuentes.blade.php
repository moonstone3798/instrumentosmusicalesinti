@extends('layouts.plantilla')
@section('contenido')
<br><br>
<div style="margin-top: 5%; margin-bottom:8%">
<h1 >Preguntas Frecuentes</h1>
<br><br>
<div style="margin-left: 4%">
<p >Esta sección esta hecha para poder responder con mayor velocidad a las dudas que puede llegar a tener. En caso de que su pregunta no se encuentre entre las opciones puede enviar un mensaje en la parte de contacto y en breve será respondida</p>
<form method="get" enctype="multipart/form-data">
    @csrf
<select name="pregunta" id="pregunta" style="margin-left: 35.5%; margin-top:3%" >
<option value="0" >Seleccione su duda</option>
<option value="1" >¿Cuanto tiempo tardara en hacer el Instrumento?</option>
<option value="2" >¿Cuales son las formas de pago?</option>
<option value="3" >¿Se puede abonar en cuotas?</option>
<option value="4" >¿Hay algun beneficio para una persona que ya compro?</option>
<option value="5" >¿Se realizan envios?</option>
<option value="6" > ¿Hay algun lugar a donde pueda ir a retirarlo personalmente?</option>

</select>

<input type="submit" value="Seleccionar pregunta" name="enviar" id="enviar" style="margin-left: 43.5%; margin-top:3%; margin-bottom:3%">
<br><br>
</form>
<div class="pregunta">


@php

if(isset($_GET['enviar'])){
$pregunta=$_GET['pregunta'];
if($pregunta== 1){
    echo '<h2 >¿Cuanto tiempo tardara en hacer el Instrumento?</h2><br>';
    echo '<p>Una vez realizada la compra, se estima una espera de 6 meses, en los cuales se creará el instrumento</p>';
}
else if ($pregunta==2){
    echo '<h2>¿Cuales son las formas de pago?</h2><br>';
    echo '<p>Los medios de pago que tenemos son efectivo, o por transferencia bancaria</p>';
}
else if($pregunta==3){
    echo '<h2>¿Se puede abonar en cuotas?</h2><br>';
    echo '<p>Se puede abonar hasta en 3 cuotas sin interes. O en un solo pago</p>';
}
else if($pregunta==4){
    echo '<h2>¿Hay algun beneficio para una persona que ya compro?</h2><br>';
    echo '<p>Para el cliente que ya ha hecho compras por este medio anteriormente, le brindamos un 10% de descuento en su próxima compra</p>';
}
else if($pregunta==5){
    echo '<h2>¿Se realizan envios?</h2><br>';
    echo '<p>Se realizan envíos por medio de correo OCA</p>';
}
else if($pregunta==6){
    echo '<h2>¿Hay algun lugar a donde pueda ir a retirarlo personalmente?</h2><br>';
    echo '<p>Una vez realizada la compra, podrán pactar con el vendedor un punto de encuentro, en moreno, en el cual cuando el instrumento este listo se le será otorgado</p>';
}

}

@endphp
</div>
</div>
</div>
@endsection