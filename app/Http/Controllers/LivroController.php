<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Livro;

class LivroController extends Controller{
	public function create(Request $request){
		$livro = new Livro;
		$livro->titulo = $request->titulo;
		$livro->autor = $request->autor;
		$livro->editora = $request->editora;
		$livro->versao = $request->versao;
		$livro->anoDeLancamento = $request->anoDeLancamento;
		$livro->qtdEstoque = $request->qtdEstoque;
		$livro->qtdEmprestada = $request->qtdEmprestada;
		$livro->save();
	return response()->json([$livro]);
	}

	public function list(){
		return Livro::all();
	}

	public function view($id){
		$livro = Livro:: findOrFail($id);
		return response()->json([$livro]);
	}

	public function edit(Request $request, $id){
		$livro = Livro::findOrFail($id);
		if($request->titulo)
			$livro->titulo = $request->titulo;
		if($request->autor)
			$livro->autor = $request->autor;
		if($request->anoDeLancamento)
			$livro->anoDeLancamento = $request->anoDeLancamento;
		if($request->editora)
			$livro->editora = $request->editora;
		if($request->versao)
			$livro->versao = $request->versao;
		if($request->qtdEmprestada)
			$livro->qtdEmprestada = $request->qtdEmprestada;
		if($request->qtdEstoque)
			$livro->qtdEstoque = $request->qntEstoque;
		$livro->save();
		return response()->json([$livro]);
		}

	public function delete($id){
		Livro::destroy($id);
		return response()->json(['Deletado!']);
	}
}