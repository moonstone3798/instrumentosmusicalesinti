<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Administrar Tipo de instrumentos</h1>
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
                    <th>#</th>
                    <th>tipo de instrumento</th>
                    <th colspan="2">
                        <button style=" width:30%">   <a href="/agregarTipo" class="btn btn-outline-secondary">
                            Agregar
                        </a></button>
                    </th>
                </tr>
            </thead>
            <tbody>
    @foreach( $tipos as $tipo )
                <tr>
                    <td>{{ $tipo->id }}</td>
                    <td>{{ $tipo->tipo }}</td>
                    <td>
                        <button style=" width:60%">   <a href="/modificarTipo/{{ $tipo->id }}" class="btn btn-outline-secondary">
                            Modificar
                        </a></button>
                    </td>
                    <td>
                        <button style="width:60%"> <a href="/eliminarTipo/{{ $tipo->id }}" class="btn btn-outline-secondary">
                            Eliminar
                        </a></button>
                    </td>
                </tr>
    @endforeach
            </tbody>
        </table>

        {{ $tipos->links() }}
        </div>


</div>
        </div>
    </div>
</x-app-layout>