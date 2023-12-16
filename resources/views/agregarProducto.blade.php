<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Agregar un nuevo producto</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background:rgba(255, 255, 255, 0.329)">
            

<br>
@if ( session('mensaje') )
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
<br>
<br>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4" id="centrar">

            <form action="/agregarProducto" method="post" enctype="multipart/form-data">
                @csrf
                <label>Ingrese el nombre del instrumento</label>
                <input type="text" name="nombre"
                       value="{{ old('nombre') }}"
                       class="form-control">
                <br><br>
                <label>
                Precio $</label>
                    <input type="number" name="precio"
                           value="{{ old('precio') }}"
                           class="form-control">
                <br><br>
           
                <label>Tipo</label>
                <select name="tipo" class="form-control" required>
                    <option value="">Seleccione un Tipo de instrumento</option>
           @foreach( $tipos as $tipo )
                    <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
           @endforeach
                </select>
                <br><br>
                <label>Categoría</label>
                <select name="categoria" class="form-control" required>
                    <option value="">Seleccione una Categoría</option>
                    
           <option value="acustica">acustica</option>
           <option value="acustico">acustico</option>
           <option value="electrico">eléctrico</option>
           <option value="electrica">eléctrica</option>
                </select>
                <br><br>
                <label>Cantidad de trastes</label>
                <input type="number" name="trastes"  value="{{ old('trastes') }}"
                           class="form-control"> <br><br>
                <label>Específicaciones del cuerpo</label><br>
                <textarea name="cuerpo" id="cuerpo" cols="50" rows="14" value="{{ old('cuerpo') }}">
Acustico (borrar todo salvo los campos completados)
Material tapa: nogal 
Material de fondo y aros: nogal 
Terminación: laqueado mate


Eléctrico (borrar todo salvo los campos completados)
Material: paraíso
Terminación: laqueado mate

</textarea>
                <br><br>
                <label>Específicaciones del mango</label><br>
                <textarea name="mango" id="mango" cols="50" rows="14" value="{{ old('mango') }}">
Material: laurel
Forma: ovalada "c" shape
Escala:
Radio de diapasón: 18°
Tamaño de trastes: 2mm
Material de cejilla: madera de guayubira
Ancho de cejilla: 
Tensor:
Tipo de encastre con cuerpo: atornillado (bolt-on)
Terminación del mango: laqueado mate
Madera de diapasón: guayubira
Terminación de diapasón: al aceite de tung / laqueado mate 
Marcaciones: plastico abs

                </textarea>
                <br><br>

                <label>Específicaciones de electronica</label><br>
                <textarea name="electronica" id="electronica" cols="50" rows="12" value="{{ old('electronica') }}">
Acustico
Tipo de micrófono: piezoelectrico fishman
Preamplificacion: fishman Isys+
Controles: volumen, graves, agudos y cambio de fase
Afinador incluido: si

Eléctrico
Pickup de mango: modelo a elección Activo EMG / Pasivo Ds ()
Pickup de puente: modelo a elección Activo EMG / Pasivo Ds
Controles: 1 volumen + 1 tono por pickup
Llave de posición de pickups: no ()
                </textarea>
                <br><br>
                <label>Específicaciones de los accesorios</label><br>
                <textarea name="accesorios" id="accesorios" cols="50" rows="14" value="{{ old('accesorios') }}">
Acustico
Material de puente: guayubira 
Distancia entre cuerdas en puente:
Orientación: diestro o zurdo a elección de comprador 
Terminación de accesorios: plateados


Eléctrico
Puente: modelo a elección Jinho ()
Distancia entre cuerdas en puente:
Orientación: diestro o zurdo a elección de comprador 
Terminación de accesorios: A elección (Plateados, Negros o dorados)()
Perillas: A elección (Plateados, Negros o dorados) ()

                </textarea>
                <br><br>
                <label>Específicaciones del miscelaneo</label><br>
                <textarea name="miscelaneos" id="miscelaneos" cols="50" rows="8" value="{{ old('miscelaneos') }}">
Acustico
Cuerdas:
Accesorios incluidos: funda simple de frizelina

Eléctrico
Cuerdas:
Accesorios incluidos: funda acolchada 

                </textarea>
                <br><br><br>
                <label> Imagen</label>
                    <input type="file" name="imagen"  class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco"> </label>

                <br><br><br>
                <button class="btn btn-dark mb-3">Agregar Producto</button>
                <button> <a href="/adminProductos" style="text-decoration: none; color:black">Volver al panel de Productos</a></button>

               
            </form>
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

        </div>


</div>
        </div>
    </div>
</x-app-layout>