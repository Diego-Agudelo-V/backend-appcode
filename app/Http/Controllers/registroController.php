<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registro;

class registroController extends Controller
{

    protected $respuesta = [];
    /**~
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = registro::all();

        return response()->json($registros);
    }
    public function show($id)
    {
        $registros = registro::where('id',$id)->get();

        return response()->json($registros[0]);
    }
    public function search($id)
    {
        $registros = registro::where('funcion','LIKE',"%$id%")->get();

        return response()->json($registros);
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
        $registro = new registro();
        $registro->funcion = $request->funcion;
        $registro->tipo = $request->tipo;
        $registro->framework = $request->frame;
        $registro->versiones = $request->versiones;
        $registro->codigo = $request->codigo;
        $registro->ejemplo = $request->ejemplo;
        $registro->anotacion = $request->anotacion;
        $registro->save();
        $res = ['mensaje' => $registro];
        $res = json_encode($res);
        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $registro = registro::findOrfail($request->id);
        $registro->funcion = $request->funcion;
        $registro->tipo = $request->tipo;
        $registro->framework = $request->framework;
        $registro->versiones = $request->versiones;
        $registro->codigo = $request->codigo;
        $registro->ejemplo = $request->ejemplo;
        $registro->anotacion = $request->anotacion;
        $registro->save();
        return $registro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $registro = registro::destroy($request->id);
        return $registro;
    }
}
