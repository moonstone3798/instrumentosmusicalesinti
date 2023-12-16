<x-app-layout>
    <x-slot name="header">
        
<h1 style="text-align:center">Agregar tipo de instrumento</h1>
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

            <form action="/agregarTipo" method="post">
            @csrf
                <div class="form-group">
                    <label for="tipo">tipo de instrumento </label>
                    <input type="text" name="tipo"
                           value="{{ old('tipo') }}"
                           class="form-control" id="tipo">
                </div>
                <br><br>
                <button class="btn btn-dark mr-3">Agregar Tipo</button>
                <a href="/adminTipos" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </form>
        </div>
<br><br>
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