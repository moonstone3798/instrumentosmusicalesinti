<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = Tipo::paginate(7);
        return view('adminTipos',
                     [ 'tipos'=>$tipos ]
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
        return view('agregarTipo');
    }

    private function validarTipo(Request $request)
    {
        $request->validate(
            [
                'tipo'=>'required|min:2|max:30'
            ],
            [
                'tipo.required'=>'El campo "Nombre de la categoría" es obligatorio.',
                'tipo.min'=>'El campo "Nombre de la categoría" debe tener al menos 2 caractéres.',
                'tipo.max'=>'El campo "Nombre de la categoría" debe tener 30 caractéres como máximo.'
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
        $tipo = $request->tipo;
        //validación
        $this->validarTipo($request);
        // instanciamos, asignamos valores y guardar
        $Tipo = new Tipo;
        $Tipo->tipo= $tipo;
        $Tipo->save();
        //retornar petición + mensaje
        return redirect('/adminTipos')
            ->with(
                [
                    'mensaje'=>'Tipo: '.$tipo.' agregada correctamente'
                ]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Tipo = Tipo::find($id);
        //retornamos a la vista pasando datos
        return view('modificarTipo',
            [
                'Tipo'=>$Tipo
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $tipo = $request->tipo;
        //validamos
        $this->validarTipo($request);
        //obtenemos datos de la categoría
        $Tipo = Tipo::find($request->id);
        //asignamos
        $Tipo->tipo = $tipo;
        //guardamos
        $Tipo->save();
        //retornamos a redirección con mensaje
        return redirect('/adminTipos')
            ->with(
                [
                    'mensaje'=>'Tipo: '.$tipo.' modificada correctamente'
                ]
            );
    }

    public function confirmar($id)
    {
        // Consultar si hay productos con esa categoria
        $productos = Producto::where('tipo', $id)->count();
        # obtener los datos de una categoria
        $Tipo = Tipo::find($id);

        # retornar la vista
        return view('eliminarTipo',
            [
                'Tipo'=>$Tipo,
                'productos'=>$productos
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        Tipo::destroy($request->id);

        return redirect('/adminTipos')
            ->with(['mensaje'=>'Tipo: '.$request->tipo.' eliminada correctamente']);
    
    }
}
