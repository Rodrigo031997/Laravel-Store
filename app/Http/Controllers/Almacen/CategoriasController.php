<?php

namespace App\Http\Controllers\Almacen;

use App\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categoria = Categoria::withTrashed()->get();

       return response()->json(['categorias'=>$categoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'nombre'=>'required',
        ];
        $this->validate($request,$rules);
        $categoria = Categoria::create($request->all());
        return response()->json([
            'error'=>false,
            'mensaje' => "Categoria creada correctamente"
            ]);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->fill($request->only([
            'nombre'
        ]));

        if ($categoria->isClean()) {
            return response()->json([
                'error'=> true,
                'mensaje' => "Debes de cambiar al menos un campo"]);
        }
        $categoria->save();
            return response()->json([
                'error'=>false,
                'mensaje' => "Categoria editada correctamente"
                ]);
        
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json(['error'=>false,'mensaje'=>'Se desactivo correctamente la categoria']);
    }
    public function activar($id)
    {
        $categoria = Categoria::withTrashed()->where('id',$id)->restore(); 
        return response()->json(['error'=>false,'mensaje'=>'Se activo correctamente la categoria']);
    }
}
