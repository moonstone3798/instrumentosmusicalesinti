@extends('layouts.plantilla')

    @section('contenido')
    <h1 style="margin-top: 5%; margin-bottom:1%">Artistas</h1>
        
        <div class="row" style="width: 100%; ">

            @foreach($artistas as $artista)
            <a class="now-get get-cart" href="./mostrarArtista/{{$artista->idArtista}}&#img1" style="text-decoration: none; color:white">
                <div class="col" style="margin-bottom:2%;display: inline-block; margin-right:2%; margin-left: 2.8%;width: 28%; height:28%; overflow:hidden; margin-top:3%;">
                    <div class="card" style="border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px, 2px, rgba(0,0,0,0.24);">

                        <img src="/artistas/{{ $artista->imagen }}"  style="width: 400px; height:350px; overflow:hidden; object-fit:initial ">
                    
                        <h3 style=" text-align: center; font-size:22px">{{ $artista->nombre }}</h3>
                         </a>
                         
                    </div>
                   
                </div>
            
            @endforeach
            
        </div>
        {{ $artistas->links() }}

@endsection
