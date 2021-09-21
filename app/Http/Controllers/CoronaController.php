<?php

namespace App\Http\Controllers;

use App\Corona;
use App\Pais;
use Illuminate\Http\Request;

class CoronaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtendo todos os dados do banco
        $coronaCases = Corona::all();
        // obtendo os dados dos países
        $paises = Pais::pluck('nome_pais','id');
        // retornando a tela de visualização com os
        // objetos obtidos do banco
        return view('coronas.index', compact('coronaCases','paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // obtendo os dados dos países
        $paises = Pais::pluck('nome_pais','id');
        // exibindo a tela para cadastro
        return view('coronas.create',compact('paises'));
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
            'country_id' => 'required|numeric',
            'symptoms' => 'required',
            'cases' => 'required|numeric',
        ]);
        // criando um objeto para receber o resultado
        // da persistência dos dados validados 
        $show = Corona::create($validatedData);
        // redirecionando para o diretório raiz (index)
        return redirect('/cases')->with('success', 
        'Dados de Corona adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // criando um objeto para receber o resultado
        // da busca de registro/objeto específico
        $coronaCase = Corona::findOrFail($id);
        // retornando a tela de visualização com o
        // objeto recuperado
        return view('coronas.show',compact('coronaCase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // criando um objeto para receber o resultado
        // da busca de registro/objeto específico
        $coronaCase = Corona::findOrFail($id);
        // retornando a tela de edição com o
        // objeto recuperado
        return view('coronas.edit', compact('coronaCase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // criando um objeto para testar/aplicar 
        // validações nos dados da requisição
        $validatedData = $request->validate([
            'country_id' => 'required|numeric',
            'symptoms' => 'required',
            'cases' => 'required|numeric',
        ]);
        // criando um objeto para receber o resultado
        // da persistência (atualização) dos dados validados 
        Corona::whereId($id)->update($validatedData);
        // redirecionando para o diretório raiz (index)
        return redirect('/cases')->with('success', 
        'Dados de Corona atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // localizando o objeto que será excluído
        $coronaCase = Corona::findOrFail($id);
        // realizando a exclusão
        $coronaCase->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/cases')->with('success', 
        'Dados de Corona removido com sucesso!');
    }
}