<?php

namespace App\Http\Controllers\Almacen;

use App\Categoria;
use App\Subcategoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $subcategoria = Subcategoria::with('categoria')->withTrashed()->get();

       return response()->json(['subcategorias'=>$subcategoria]);
    }

    public function categorias(){
        $categoria = Categoria::all();

        return response()->json(['categorias'=>$categoria]);
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
            'nombre_subcategoria'=>'required',
            'categoria_id'=>'required'
        ];

        $this->validate($request,$rules);
        $subcategoria = Subcategoria::create($request->all());
        return response()->json([
            'error'=>false,
            'mensaje' => "Subcategoria creada correctamente"
            ]);
    }

    public function update(Request $request, Subcategoria $subcategoria)
    {
        $subcategoria->fill($request->only([
            'nombre_subcategoria',
            'categoria_id'
        ]));

        if ($subcategoria->isClean()) {
            return response()->json([
                'error'=> true,
                'mensaje' => "Debes de cambiar almenos un campo"]);
        }
        $subcategoria->save();
            return response()->json([
                'error'=>false,
                'mensaje' => "Subcategoria editada correctamente"
                ]);
        
    }


    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();
        return response()->json(['error'=>false,'mensaje'=>'Se desactivo correctamente la subcategoria']);
    }
    public function activar($id)
    {
        $subcategoria = Subcategoria::withTrashed()->where('id',$id)->restore(); 
        return response()->json(['error'=>false,'mensaje'=>'Se activo correctamente la subcategoria']);
    }
}
