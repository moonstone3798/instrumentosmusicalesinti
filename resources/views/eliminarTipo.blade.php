<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Eliminar tipo de instrumento</h1>
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
        <div class="col text-danger align-self-center">
        @if ( $productos > 0 )
                No se puede eliminar el tipo de instrumento: {{ $Tipo->tipo }}.
                Ya que tiene productos utilizándola.
                <a href="/adminTipos"> Volver a panel</a>
        @else
            <form action="/eliminarTipo" method="post">
                @csrf
                @method('delete')
                <h2>{{ $Tipo->tipo }}</h2>
                <input type="hidden" name="id"
                    value="{{ $Tipo->id}}">
                <input type="hidden" name="tipo"
                    value="{{ $Tipo->tipo}}">
                    <br><br>
                <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
                <a href="/adminTipos" class="btn btn-outline-secondary btn-block">
                    Volver a panel
                </a>

            </form>
        @endif
        </div>

        <script>
           
            Swal.fire(
                'Advertencia',
                'Si pulsa el boton "Confirmar baja", se eliminara el producto seleccionado',
                'warning'
            )
           
        </script>
 </div>


</div>
        </div>
    </div>
</x-app-layout>