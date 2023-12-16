<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Administrar Artistas</h1>
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


        <h1>Modificación de un artista</h1>
<br><br>
        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4" style="text-align: center">

            <form action="/modificarArtista" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label>Nombre</label>
                 <br><br>
                <input type="text" name="nombre"
                       value="{{ old('nombre', $Artista->nombre) }}"
                       class="form-control">
                <br><br><br>
                <h3>Aclaración</h3>
<br>
<p>no importa el tamaño de la imagen que suba, pero por favor que sea un cuadrado</p>
                <br><br>
              <label>Imagen Principal actual</label>
                 <br><br>
                <img src="/artistas/{{ $Artista->imagen }}" class="img-thumbnail my-2" style="width: 300px; height:300px; object-fit:cover; margin-left:37%;">
                <br><br><br>
       
                <label>      Imagen Principal nueva (opcional)</label>    <br>
                <div class="custom-file mt-1 mb-4">
                    <input type="file" name="imagen"  class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco"> </label>
                </div>
                <br><br>
                <br>
              <label>Imagen 2 opcional actual</label>
                 <br><br>
                <img src="/artistas/{{ $Artista->imagen2 }}" class="img-thumbnail my-2" style="width: 300px;  height:300px; object-fit:cover; margin-left:37%">
                <br><br><br>
                <label>      Imagen 2 nueva (opcional)</label>    <br>
                <div class="custom-file mt-1 mb-4">
                    <input type="file" name="imagen2"  class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco"> </label>
                </div>
              
                <input type="hidden" name="idArtista"
                       value="{{ $Artista->idArtista }}">
                <input type="hidden" name="ImagenAnterior"
                       value="{{ $Artista->imagen }}">
                       <input type="hidden" name="ImagenAnterior2"
                       value="{{ $Artista->imagen2 }}">
                <br>
                <button class="btn btn-dark mb-3">Modificar Artista</button>
               
                <button>
                <a href="/adminArtistas" class="btn btn-outline-secondary mb-3" style="text-decoration: none; color:black">
                    Volver al panel de artistas
                </a></button>
            </form>

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