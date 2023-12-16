<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $artistas = Artista::Paginate(5);
        return view('/adminArtistas',
                     [ 'artistas'=>$artistas ]
                    );
    }



    public function artista()
    {
        $artistas = Artista::paginate(9);        
        return view('/artista',
        [ 'artistas'=>$artistas ]
       );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agregarArtista');
    }

    public function mostrar($idArtista)
    {
    
    $Artista = Artista::find($idArtista);
    return view('mostrarArtista',
                [
                    'Artista'=>$Artista
                ]
            );

    }
  

    private function subirImagen(Request $request)
    {
        // si no enviaron archivo | método store()
        $imagen = 'noDisponible.jpg';

        //si no enviaron archivo | método update()
        if( $request->has('ImagenAnterior') ){
            $imagen = $request->ImagenAnterior;
        }

        // si enviaron imagen
        if( $request->file('imagen') ){
            //renombrar archivo
                //time() . extensión-de-archivo
            $ext = $request->file('imagen')->extension();
            $imagen = time().'p.'.$ext;
            //subir
            $request->file('imagen')
                    ->move( public_path('artistas/'), $imagen );
        }

        return $imagen;
    }

    
    private function subirImagen2(Request $request)
    {
        // si no enviaron archivo | método store()
        $imagen2 = 'noDisponible.jpg';

        //si no enviaron archivo | método update()
        if( $request->has('ImagenAnterior2') ){
            $imagen2 = $request->ImagenAnterior2;
        }

        // si enviaron imagen
        if( $request->file('imagen2') ){
            //renombrar archivo
                //time() . extensión-de-archivo
            $ext2 = $request->file('imagen2')->extension();
        $imagen2 = time().'o.'.$ext2;
            //subir
            $request->file('imagen2')
                    ->move( public_path('artistas/'), $imagen2 );
        }

        return $imagen2;
    }

    private function validar(Request $request) :void
    {
        $request->validate(
            [
                'nombre'=>'required|min:3|max:70',
                'Imagen'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
                'Imagen2'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
            ],
            [
                'nombre.required'=>'Complete el campo Nombre',
                'nombre.min'=>'el nombre debe tener como mínimo 3 caracteres',
                'nombre.max'=>'Complete el campo Nombre con 70 caractéres como máxino',
                'imagen.mimes'=>'Debe ser una imagen',
                'imagen.max'=>'Debe ser una imagen de 2MB como máximo',
                'imagen2.mimes'=>'Debe ser una imagen',
                'imagen2.max'=>'Debe ser una imagen de 2MB como máximo'
            ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nombre = $request->nombre;
        //validar
        $this->validar($request);
          //subir imagen
          $imagen = $this->subirImagen($request);
          $imagen2 = $this->subirImagen2($request);
        //instanciar + asignar + guardar
        $Artista = new Artista;
        $Artista->nombre = $nombre;
        $Artista->imagen = $imagen;
        $Artista->imagen2 = $imagen2;
        $Artista->save();
        //redirección + mensaje ok
        return redirect('/adminArtistas')
            ->with('mensaje', 'Artista: '. $nombre. ' agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show(Artista $artista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function edit($idArtista)
    {
        //

        $Artista = Artista::find($idArtista);
        return view('modificarArtista',
                    [
                        'Artista'=>$Artista
                    ]
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            
        //validar
        $this->validar($request);
        //subir imagen
        $imagen = $this->subirImagen($request);
        $imagen2 = $this->subirImagen2($request);
        $nombre = $request->nombre;
        //obtener datos, asignar atributos, guardar
        $Artista = Artista::find($request->idArtista);
        $Artista->nombre = $nombre;
        $Artista->imagen = $imagen;
        $Artista->imagen2 = $imagen2;
        $Artista->save();
        //redirección con mensaje ok
        return redirect('/adminArtistas')
            ->with('mensaje', 'Artista: '.$nombre.' modificado correctamente.');
    }


    public function confirmar($idArtista)
    {

        # obtener los datos de un Artista
        $Artista = Artista::find($idArtista);

        # retornar la vista
        return view('eliminarArtista',
            [
                'Artista'=>$Artista
            ]
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */


     
    public function destroy(Request $request)
    {
        //
        # Producto::find($request->idProducto)->delete();
        Artista::destroy($request->idArtista);
        //redirección con mensaje ok
        return redirect('/adminArtistas')
            ->with( ['mensaje'=>'Artista: '.$request->nombre.' eliminada correctamente.'] );

    }
}
