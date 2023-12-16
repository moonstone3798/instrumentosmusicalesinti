<?php

namespace App\Http\Controllers;
/*
use App\Models\Categoria;*/
use App\Models\Tipo;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::with('relTipo')
        ->paginate(8);
return view('adminProductos',
[ 'productos'=>$productos ]
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
         //obtenemos listados de tipos
         $tipos = Tipo::all();
         return view('agregarProducto',
                     [
                         'tipos'=>$tipos
                     ]
                 );
    }

    public function inicio(Request $request)
    {
      
        $texto = "";
        $ordenar="";
        $tipo="";
        $categoria="";
        if ($request->get("texto")) {
            $texto = $request->get("texto");
        }
        # Exista o no exista búsqueda, los ordenamos
        if ($texto) {
            # Si hay búsqueda, agregamos el filtro
            $productos = Producto::with('relTipo')
            ->where("nombre", "LIKE", "%$texto%")
            ->orwhere("categoria", "LIKE", "%$texto%")
            ->orwhere("trastes", "LIKE", "%$texto%")
            ->orwhere("cuerpo", "LIKE", "%$texto%")
            ->orwhere("mango", "LIKE", "%$texto%")
            ->orwhere("electronica", "LIKE", "%$texto%")
            ->orwhere("accesorios", "LIKE", "%$texto%")
            ->orwhere("miscelaneos", "LIKE", "%$texto%")
            ->orwhere("precio", "LIKE", "%$texto%")
            ->paginate(9);
            return view('inicio', ['productos' => $productos]);
        }

        if ($request->get("ordenar")) {
            $ordenar = $request->get("ordenar");
        }
        if ($ordenar== "menor") {
            $productos = Producto::with('relTipo')
            ->orderBy('precio', 'asc')
            ->paginate(9);
            return view('inicio', ['productos' => $productos]);
        }
        if ($ordenar== "mayor") {
            $productos = Producto::with('relTipo')
            ->orderBy('precio', 'desc')
            ->paginate(9);
            return view('inicio', ['productos' => $productos]);
        }

        if ($request->get("tipo")) {
            $tipo = $request->get("tipo");
        }
        # Exista o no exista búsqueda, los ordenamos
        if ($tipo=="guitarra") {
            # Si hay búsqueda, agregamos el filtro
            $productos = Producto::with('relTipo')
            ->where("tipo", "LIKE", "1")
            ->paginate(9);
            return view('inicio', ['productos' => $productos]);
        }
        if ($tipo=="bajo") {
            # Si hay búsqueda, agregamos el filtro
            $productos = Producto::with('relTipo')
            ->where("tipo", "LIKE", "2")
            ->paginate(9);
            return view('inicio', ['productos' => $productos]);
        }
        if ($tipo=="ukelele") {
            # Si hay búsqueda, agregamos el filtro
            $productos = Producto::with('relTipo')
            ->where("tipo", "LIKE", "3")
            ->paginate(9);
            return view('inicio', ['productos' => $productos]);
        }


        if ($request->get("categoria")) {
            $categoria = $request->get("categoria");
        }
        # Exista o no exista búsqueda, los ordenamos
        if ($categoria=="electricos") {
            # Si hay búsqueda, agregamos el filtro
            $productos = Producto::with('relTipo')
            ->where("categoria", "LIKE", "electrico")
            ->orwhere("categoria", "LIKE", "electrica")
            ->paginate(9);
            return view('inicio', ['productos' => $productos]);
        }


  # Exista o no exista búsqueda, los ordenamos
  if ($categoria=="acusticos") {
    # Si hay búsqueda, agregamos el filtro
    $productos = Producto::with('relTipo')
    ->where("categoria", "LIKE", "acustico")
    ->orwhere("categoria", "LIKE", "acustica")
    ->paginate(9);
    return view('inicio', ['productos' => $productos]);
}




        
        $productos = Producto::with('relTipo')
                        ->paginate(9);
        return view('inicio', ['productos' => $productos]);

        
    }

    
    private function validar(Request $request) :void
    {
        $request->validate(
            [
                'nombre'=>'required|min:3|max:70',
                'precio'=>'required|numeric|min:0',
                'imagen'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
            ],
            [
                'nombre.required'=>'Complete el campo Nombre',
                'nombre.min'=>'Complete el campo Nombre con al menos 3 caractéres',
                'nombre.max'=>'Complete el campo Nombre con 70 caractéres como máxino',
                'precio.required'=>'Complete el campo Precio',
                'precio.numeric'=>'Complete el campo Precio con un número',
                'precio.min'=>'Complete el campo Precio con un número positivo',
                'preciosinampli.min'=>'Complete el campo Precio sin amplificador con un número positivo',
                'imagen.mimes'=>'Debe ser una imagen',
                'imagen.max'=>'Debe ser una imagen de 2MB como máximo'
            ]
            );
    }

    public function acustico(Request $request)
    {
      
       
        $productos = Producto::with('relTipo')
                        ->where("categoria", "LIKE", "acustic%")
                        ->paginate(9);
        return view('acustico', ['productos' => $productos]);

        
    }
    public function guitarraacustica(Request $request)
    {
      
       
        $productos = Producto::with('relTipo')
                        ->where("categoria", "LIKE", "acustic%")
                        ->where("tipo", "LIKE", "1")
                        ->paginate(9);
        return view('guitarra&acustica', ['productos' => $productos]);

        
    }
    public function bajoacustico(Request $request)
    {
      
       
        $productos = Producto::with('relTipo')
                        ->where("categoria", "LIKE", "acustic%")
                        ->where("tipo", "LIKE", "2")
                        ->paginate(9);
        return view('bajo&acustico', ['productos' => $productos]);

        
    }
    public function ukeleleacustico(Request $request)
    {
      
       
        $productos = Producto::with('relTipo')
                        ->where("categoria", "LIKE", "acustic%")
                        ->where("tipo", "LIKE", "3")
                        ->paginate(9);
        return view('ukelele&acustico', ['productos' => $productos]);

        
    }
    public function electrico(Request $request)
    {
      
       
        $productos = Producto::with('relTipo')
                        ->where("categoria", "LIKE", "electric%")
                        ->paginate(9);
        return view('electrico', ['productos' => $productos]);

        
    }
    public function guitarraelectrica(Request $request)
    {
      
       
        $productos = Producto::with('relTipo')
                        ->where("categoria", "LIKE", "electric%")
                        ->where("tipo", "LIKE", "1")
                        ->paginate(9);
        return view('guitarra&electrica', ['productos' => $productos]);

        
    }
    public function bajoelectrico(Request $request)
    {
      
       
        $productos = Producto::with('relTipo')
                        ->where("categoria", "LIKE", "electric%")
                        ->where("tipo", "LIKE", "2")
                        ->paginate(9);
        return view('bajo&electrico', ['productos' => $productos]);

        
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
            $imagen = time().'.'.$ext;
            //subir
            $request->file('imagen')
                    ->move( public_path('productos/'), $imagen );
        }

        return $imagen;
    }

    public function mostrar($id)
    {
       /* $Producto = Producto::all();        
        return view( 'inicio&id',*/
        $tipos = Tipo::all();
        /*$categorias = Categoria::all();*/
        $Producto = Producto::with('relTipo')->find($id);
        return view('inicio&id',
        [
            'tipos'=>$tipos,
            'Producto'=>$Producto
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
        //instanciar + asignar + guardar
        $Producto = new Producto;
        $Producto->nombre = $nombre;
        $Producto->precio = $request->precio;
        $Producto->categoria = $request->categoria;
        $Producto->tipo = $request->tipo;
        $Producto->trastes = $request->trastes;
        $Producto->cuerpo = $request->cuerpo;
        $Producto->mango = $request->mango;
        $Producto->electronica = $request->electronica;
        $Producto->accesorios = $request->accesorios;
        $Producto->miscelaneos = $request->miscelaneos;
        $Producto->imagen = $imagen;
        $Producto->save();
        //redirección + mensaje ok
        return redirect('/adminProductos')
            ->with('mensaje', 'Producto: '. $nombre. ' agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipos = Tipo::all();
        /*$categorias = Categoria::all();*/
        $Producto = Producto::with('relTipo')->find($id);
        return view('modificarProducto',
                    [
                        'tipos'=>$tipos,
                        'Producto'=>$Producto
                    ]
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        //validar
        $this->validar($request);
        //subir imagen
        $imagen = $this->subirImagen($request);
        $nombre = $request->nombre;
        //obtener datos, asignar atributos, guardar
        $Producto = Producto::find($request->id);
        $Producto->nombre = $nombre;
        $Producto->precio = $request->precio;
        $Producto->categoria = $request->categoria;
        $Producto->tipo = $request->tipo;
        $Producto->trastes = $request->trastes;
        $Producto->cuerpo = $request->cuerpo;
        $Producto->mango = $request->mango;
        $Producto->electronica = $request->electronica;
        $Producto->accesorios = $request->accesorios;
        $Producto->miscelaneos = $request->miscelaneos;
        $Producto->imagen = $imagen;
        $Producto->save();
        //redirección con mensaje ok
        return redirect('/adminProductos')
            ->with('mensaje', 'Producto: '.$nombre.' modificado correctamente.');
    }

    public function confirmar($id)
    {
        $Producto = Producto::with('relTipo')
                        ->find($id);
        return view('eliminarProducto',
                    [ 'Producto'=>$Producto ]
                );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
         # Producto::find($request->idProducto)->delete();
         Producto::destroy($request->id);
         //redirección con mensaje ok
         $nombre = $request->nombre;
         return redirect('/adminProductos')
             ->with('mensaje', 'Producto: '.$nombre.' eliminado correctamente.');
 
    }
}
