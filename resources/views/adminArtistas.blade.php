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


<table class="table table-borderless table-striped table-hover">
    <thead>
        <tr>
            <th>Artista</th>
            <th>Imagen</th>
            <th>Imagen2</th>
            <th colspan="2">
                <button style=" width:50%"> <a href="/agregarArtista">
                    Agregar
                </a></button>
            </th>
        </tr>
    </thead>
    <tbody>
@foreach( $artistas as $artista )
        <tr>
            <td>{{ $artista->nombre }}</td>
            <td><img src="/artistas/{{ $artista->imagen }}" class="img-thumbnail" style="width: 250px; height: 200px;  margin-left:15%; object-fit: fill"></td>
            <td><img src="/artistas/{{ $artista->imagen2 }}" class="img-thumbnail"  style="width: 250px; height: 200px; object-fit:fill; margin-left:15%;"></td>
            <td>
                <button><a href="/modificarArtista/{{ $artista->idArtista }}" >
                    Modificar
                </a></button>
                <button>  <a href="/eliminarArtista/{{ $artista->idArtista }}">
                    Eliminar
                </a></button>
            </td>
        </tr>
@endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">

    {{ $artistas->links() }}
    </div>


</div>
        </div>
    </div>
</x-app-layout>