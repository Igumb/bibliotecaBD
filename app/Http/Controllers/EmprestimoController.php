<?php

namespace App\Http\Controllers;
use App\Http\Resources\EmprestimoResource;
use Illuminate\Http\Request;
use App\Emprestimo;

class EmprestimoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return EmprestimoResource::collection(Emprestimo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $emprestimo = new Emprestimo;
        $emprestimo->status = $request->status;
        $emprestimo->dataDeInicio = $request->dataDeTermino;
        $emprestimo->dataDeTermino = $request->dataDeTermino;
        $emprestimo->clientesId = $request->clientesId;
        $emprestimo->livrosId = $request->livrosId;
        $emprestimo->save();
        return new EmprestimoResource($emprestimo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $emprestimo = Emprestimo:: findOrFail($id);
        return new EmprestimoResource($emprestimo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $emprestimo = Emprestimo::findOrFail($id);
        if($request->status)
            $emprestimo->status = $request->status;
        if($request->dataDeInicio)
            $emprestimo->dataDeInicio = $request->dataDeInicio;
        if($request->dataDeTermino)
            $emprestimo->dataDeTermino = $request->dataDeTermino;
        if($request->clientesId)
            $emprestimo->clientesId = $request->clientesId;
        if($request->livrosId)
            $emprestimo->livrosId = $request->livrosId;
        if($request->qtdEmprestada)
            $emprestimo->qtdEmprestada = $request->qtdEmprestada;
        $emprestimo->save();
        return new EmprestimoResource($emprestimo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Emprestimo::destroy($id);
        return response()->json(['Deletado!']);
    }
}
