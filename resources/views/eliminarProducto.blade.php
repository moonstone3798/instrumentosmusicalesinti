<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Eliminar producto</h1>
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
                <img src="/productos/{{ $Producto->imagen }}" class="img-thumbnail">
            </div>
            <div class="col text-danger align-self-center">
            <form action="/eliminarProducto" method="post">
            @csrf
            @method('delete')
                <h2>{{ $Producto->nombre }}</h2>
                <br>
                <label>   Tipo  {{ $Producto->relTipo->tipo }} </label>
                <br>
                <label>Categoría {{ $Producto->categoria }}</label>
                <br>
                <label> Precio $ {{ $Producto->precio }}</label>
                <br>
                <label> Precio sin amplificador $ {{ $Producto->preciosinampli }}</label>
             
                  
               
               

                <input type="hidden" name="id"
                       value="{{ $Producto->id}}">
                <input type="hidden" name="nombre"
                       value="{{ $Producto->nombre}}">
                       <br><br>
                <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
                <a href="/adminProductos" class="btn btn-outline-secondary btn-block">
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