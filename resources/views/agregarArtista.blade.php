<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Agregar un nuevo artista</h1>
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

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4" id="centrar">

            <form action="/agregarArtista" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="nombre">Nombre </label>
                    <input type="text" name="nombre"
                           value="{{ old('nombre') }}"
                           class="form-control" id="nombre">
<br><br><br>
                    <label for="imagen">Imagen Principal</label>
                    <input type="file" name="imagen"  class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco"> </label>
                    <br><br><br>
                   
                    <label for="imagen2">Imagen Opcional</label>
                    <input type="file" name="imagen2"  class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco"> </label>
                    
                </div>
                <br><br>
                <button class="btn btn-dark mr-3">Agregar Artista</button>
                <button> <a href="/adminArtistas" style="text-decoration: none; color:black">Volver al panel de Artistas</a></button>
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

