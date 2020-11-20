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
        $retorno = [];
        $cardapios = Cardapios::where('status','ativo')->orderBy('id','ASC')->get();
        foreach($cardapios as $key => $value){
            $retorno[$key]['cardapio'] = $value;
            $retorno[$key]['preco'] = CardapiosPrecos::where('id_cardapio',$value->id)->get();
        }
        return response()->json($retorno);
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

        try{
            $cardapio->save();

            $cardapioPreco = new CardapiosPrecos();
            $cardapioPreco->id_cardapio = $cardapio->id;
            $cardapioPreco->preco_atual = $parametros['preco'];
            $cardapioPreco->preco_anterior = 0;
            $cardapioPreco->desconto_atual = 0;
            $cardapioPreco->desconto_anterior = 0;
            $cardapioPreco->status = 'ativo';

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
        $retorno = [];
        $retorno[]['cardapio'] = Cardapios::find($id);
        $retorno[]['preco'] = CardapiosPrecos::where('id_cardapio',$id)->get();
        
        return response()->json($retorno);
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
            $cardapioPreco = CardapiosPrecos::where('id_cardapio',$id)->first();

            $parametros = $request->request->all();
            if(!empty($parametros['nome'])){
                if($cardapio->nome_op != $parametros['nome']){
                    $cardapio->nome_op = $parametros['nome'];
                }
            }
            if(!empty($parametros['desc'])){
                if($cardapio->desc != $parametros['desc']){
                    $cardapio->desc = $parametros['desc'];
                }
            }
            if(!empty($parametros['preco'])){
                if(empty($cardapioPreco->preco_atual)){
                    $cardapioPreco->preco_atual = 0.0;
                }
                $cardapioPreco->preco_anterior      = $cardapioPreco->preco_atual;
                $cardapioPreco->preco_atual         = $parametros['preco'];
            }

            if(!empty($parametros['desconto'])){
                if(empty($cardapioPreco->desconto_atual)){
                    $cardapioPreco->desconto_atual = 0.0;
                }
                $cardapioPreco->desconto_anterior   = $cardapioPreco->desconto_atual;
                $cardapioPreco->desconto_atual      = $parametros['desconto'];
            }
            try{
                $cardapio->save();
                $cardapioPreco->save();
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
            $cardapioPreco = CardapiosPrecos::where('id_cardapio',$id)->first();

            $parametros = $request->request->all();
            if(!empty($parametros['nome'])){
                if($cardapio->nome_op != $parametros['nome']){
                    $cardapio->nome_op = $parametros['nome'];
                }
            }
            if(!empty($parametros['desc'])){
                if($cardapio->desc != $parametros['desc']){
                    $cardapio->desc = $parametros['desc'];
                }
            }
            if(!empty($parametros['preco'])){
                if(empty($cardapioPreco->preco_atual)){
                    $cardapioPreco->preco_atual = 0.0;
                }
                $cardapioPreco->preco_anterior      = $cardapioPreco->preco_atual;
                $cardapioPreco->preco_atual         = $parametros['preco'];
            }

            if(!empty($parametros['desconto'])){
                if(empty($cardapioPreco->desconto_atual)){
                    $cardapioPreco->desconto_atual = 0.0;
                }
                $cardapioPreco->desconto_anterior   = $cardapioPreco->desconto_atual;
                $cardapioPreco->desconto_atual      = $parametros['desconto'];
            }
            try{
                $cardapio->save();
                $cardapioPreco->save();
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
        $cardapioPreco = CardapiosPrecos::where('id_cardapio',$id)->first();
        $cardapio->status = 'desativado';
        $cardapioPreco->status = 'desativado';
        try{
            $cardapio->save();
            return response()->json('Desativado com Sucesso!');
        }catch(Execption $e){
            return response()->json($e->getMessage());
        }
    }
}
