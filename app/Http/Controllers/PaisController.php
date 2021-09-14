<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtendo todos os dados do banco
        $paises = Pais::all();
        // retornando a tela de visualização com os
        // objetos obtidos do banco
        return view('paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // exibindo a tela para cadastro
        return view('paises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // criando um objeto para testar/aplicar 
        // validações nos dados da requisição
        $validatedData = $request->validate([
            'nome_pais' => 'required|max:255',
            'sigla' => 'required',
            'continente' => 'required',
        ]);
        // criando um objeto para receber o resultado
        // da persistência dos dados validados 
        $show = Pais::create($validatedData);
        // redirecionando para o diretório raiz (index)
        return redirect('/pais')->with('success', 
        'País cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // criando um objeto para receber o resultado
        // da busca de registro/objeto específico
        $pais = Pais::findOrFail($id);
        // retornando a tela de visualização com o
        // objeto recuperado
        return view('paises.show',compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // criando um objeto para receber o resultado
        // da busca de registro/objeto específico
        $pais = Pais::findOrFail($id);
        // retornando a tela de edição com o
        // objeto recuperado
        return view('paises.edit', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // criando um objeto para testar/aplicar 
        // validações nos dados da requisição
        $validatedData = $request->validate([
            'nome_pais' => 'required|max:255',
            'sigla' => 'required',
            'continente' => 'required',
        ]);
       // criando um objeto para receber o resultado
        // da persistência (atualização) dos dados validados 
        Pais::whereId($id)->update($validatedData);
        // redirecionando para o diretório raiz (index)
        return redirect('/pais')->with('success', 
        'País atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // localizando o objeto que será excluído
        $pais = Pais::findOrFail($id);
        // realizando a exclusão
        $pais->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/pais')->with('success', 
        'País excluído com sucesso!');
    }
}
