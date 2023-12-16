<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Administrar Productos</h1>
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

        <table class="table table-borderless table-striped table-hover" style="width:106%; padding-left:0%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Tipo</th>
                    <th>Categoría</th>
                    <th>Trastes</th>
                    <th>Cuerpo</th>
                    <th style="width: 103%">Mango</th>
                    <th>Electronica</th>
                    <th>Accesorios</th>
                    <th>Misceláneos</th>
                    <th>Imagen</th>
                    <th colspan="2">
                        <button>  <a href="/agregarProducto" class="btn btn-outline-secondary">
                            Agregar
                        </a></button>
                    </th>
                </tr>
            </thead>
            <tbody>
@foreach( $productos as $producto )
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>${{ $producto->precio }}</td>
                    <td>{{ $producto->relTipo->tipo }}</td>
                    <td>{{ $producto->categoria }}</td>
                    <td>{{ $producto->trastes }}</td>
                    <td>{{ $producto->cuerpo }}</td>
                    <td >{{ $producto->mango }}</td>
                    <td>{{ $producto->electronica }}</td>
                    <td style="width: 102%">{{ $producto->accesorios }}</td>
                    <td>{{ $producto->miscelaneos }}</td>
                    <td><img src="/productos/{{ $producto->imagen }}" class="img-thumbnail" style="width: 100%"></td>
                    <td>
                        <button >    <a href="/modificarProducto/{{ $producto->id }}" class="btn btn-outline-secondary">
                            Modificar
                        </a></button>
                    </td>
                    <td>
                        <button><a href="/eliminarProducto/{{ $producto->id }}" class="btn btn-outline-secondary">
                            Eliminar
                        </a></button>
                    </td>
                </tr>
@endforeach
            </tbody>
        </table>
<br><br>
        {{ $productos->links() }}
        </div>


</div>
        </div>
    </div>
</x-app-layout>