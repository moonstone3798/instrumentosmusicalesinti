<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Eliminar artista</h1>
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

        <div class="row alert bg-light border-danger col-8 mx-auto p-2">
            <div class="col">
                <img src="/artistas/{{ $Artista->imagen }}" class="img-thumbnail">
            </div>
            <div class="col text-danger align-self-center">
            <form action="/eliminarArtista" method="post">
            @csrf
            @method('delete')
                <h2>{{ $Artista->nombre }}</h2>

                <input type="hidden" name="idArtista"
                       value="{{ $Artista->idArtista}}">
                <input type="hidden" name="nombre"
                       value="{{ $Artista->nombre}}">
                <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
                <a href="/adminArtistas" class="btn btn-outline-secondary btn-block">
                    Volver a panel
                </a>

            </form>
            </div>
        </form>

            <script>
                Swal.fire(
                    'Advertencia',
                    'Si pulsa el botón "Confirmar baja", se eliminará el producto seleccionado.',
                    'warning'
                )
            </script>

</div>


</div>
        </div>
    </div>
</x-app-layout>