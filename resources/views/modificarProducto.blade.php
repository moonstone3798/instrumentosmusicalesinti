<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Modificación de un producto</h1>
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

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

            <form action="/modificarProducto" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
              <label>Nombre</label>  
                <input type="text" name="nombre"
                       value="{{ old('nombre', $Producto->nombre) }}"
                       class="form-control">
                <br> <br>
                <label>Precio $ </label>
                    <input type="number" name="precio"
                           value="{{ old('precio', $Producto->precio) }}"
                           class="form-control" step="0.01">
            
                <br><br>
                <label>Tipo de instrumento </label>
                <select name="tipo" class="form-control" required>
                    <option value="">Seleccione una marca</option>
           @foreach( $tipos as $tipo )
                    <option {{ ($Producto->tipo == $tipo->id)?'selected':'' }} value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
           @endforeach
                </select>
                <br> <br>
                <label>Categoría</label>
                <select name="categoria" class="form-control" required>
                    <option {{ ($Producto->categoria)?'selected':'' }} value="{{$Producto->categoria}}">{{$Producto->categoria}}</option>
           <option value="acustica">acustica</option>
           <option value="acustico">acustico</option>
           <option value="electrico">eléctrico</option>
           <option value="electrica">eléctrica</option>
                </select>
                <br><br>
                <label>Cantidad de trastes</label>
                <input type="number" name="trastes" value="{{ old('trastes', $Producto->trastes) }}"
                           class="form-control"> <br><br>
                    
                <br>
                <label>Específicaciones del cuerpo</label><br>
                <textarea name="cuerpo" id="cuerpo" cols="50" rows="14">{{ $Producto->cuerpo }}</textarea>
                <br><br>
                <label>Específicaciones del mango</label><br>
                <textarea name="mango" id="mango" cols="50" rows="14">{{ $Producto->mango }}</textarea>
                <br><br>

                <label>Específicaciones de electronica</label><br>
                <textarea name="electronica" id="electronica" cols="50" rows="12" >{{ $Producto->electronica }} </textarea>
                <br><br>
                <label>Específicaciones de los accesorios</label><br>
                <textarea name="accesorios" id="accesorios" cols="50" rows="14" >{{ $Producto->accesorios }}</textarea>
                <br><br>
                <label>Específicaciones del miscelaneo</label><br>
                <textarea name="miscelaneos" id="miscelaneos" cols="50" rows="8">{{ $Producto->miscelaneos }} </textarea> <br>
                <label>Imagen actual </label> <br><br>
                <img src="/productos/{{ $Producto->imagen }}" class="img-thumbnail my-2"style="width: 300px;  height:300px; object-fit:cover; margin-left:37%">
                <br><br>
                <label>Imagen nueva (opcional)</label>
             
                <div class="custom-file mt-1 mb-4">
                    <input type="file" name="imagen"  class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco"></label>
                </div>

                <input type="hidden" name="id"
                       value="{{ $Producto->id }}">
                <input type="hidden" name="ImagenAnterior"
                       value="{{ $Producto->imagen }}">
                <br>    <br>
    
                <button class="btn btn-dark mb-3">Modificar Producto</button>
                <a href="/adminProductos" class="btn btn-outline-secondary mb-3">
                    Volver al panel de productos
                </a>
            </form>
<br><br>
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