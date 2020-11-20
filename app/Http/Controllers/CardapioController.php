<?php

namespace App\Http\Controllers;

use App\Cardapios;
use App\CardapiosPrecos;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //var_dump('teste');
        //$opcoesCardapio = Cardapios::where('status','ativo')->orderBy('nome_op','ASC')->get();
        //return response()->json($opcoesCardapio);
        return response()->json(CardapiosPrecos::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parametros = $request->request->all();

        $cardapio = new Cardapios();
        $cardapio->nome_op = $parametros['nome'];
        $cardapio->desc = $parametros['desc'];
        $cardapio->status = 'ativo';

        $cardapioPreco = new CardapiosPrecos();
        $cardapioPreco->preco_atual = $parametros['preco'];

        if($parametros['desconto_atual']){
            $cardapioPreco->preco_atual = $parametros['desconto_atual'];
        }
        $cardapioPreco->status = 'ativo';

        try{
            $cardapio->save();
            $cardapioPreco->save();            
            return response()->json('Cadastrado com Sucesso!');
        }catch(Execption $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cardapio = Cardapios::find($id);
        return response()->json($cardapio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        if(!$request->request->all()){
            return response()->json('Informe os parametros de alteracao!');
        }else{
            $cardapio = Cardapios::find($id);
            $cardapioPreco = CardapiosPrecos::where('id_cardapio',$id)->get();
            $parametros = $request->request->all();

            if($cardapio->nome_op != $parametros['nome']){
                $cardapio->nome_op = $parametros['nome'];
            }
            if($cardapio->desc != $parametros['desc']){
                $cardapio->desc = $parametros['desc'];
            }
            if($parametros['preco']){
                $cardapioPreco->preco_anterior      = $cardapioPreco->preco_atual;
                $cardapioPreco->preco_atual         = $parametros['preco'];
            }
            if($parametros['desconto']){
                $cardapioPreco->desconto_anterior   = $cardapioPreco->desconto_atual;
                $cardapioPreco->desconto_atual      = $parametros['desconto'];
            }
            try{
                $cardapio->save();
                return response()->json('Editado com Sucesso!');
            }catch(Execption $e){
                return response()->json($e->getMessage());
            }
        }
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
        if(!$request->request->all()){
            return response()->json('Informe os parametros de alteracao!');
        }else{
            $cardapio = Cardapios::find($id);
            $parametros = $request->request->all();

            if($cardapio->nome_op != $parametros['nome']){
                $cardapio->nome_op = $parametros['nome'];
            }
            if($cardapio->desc != $parametros['desc']){
                $cardapio->desc = $parametros['desc'];
            }
            try{
                $cardapio->save();
                return response()->json('Editado com Sucesso!');
            }catch(Execption $e){
                return response()->json($e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cardapio = Cardapios::find($id);
        $cardapio->status = 'desativado';
        try{
            $cardapio->save();
            return response()->json('Desativado com Sucesso!');
        }catch(Execption $e){
            return response()->json($e->getMessage());
        }
    }
}
