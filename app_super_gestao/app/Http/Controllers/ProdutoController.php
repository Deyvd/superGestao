<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Item;
use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);
        // $produtos = Produto::paginate(10);

        // foreach($produtos as $key => $produto){
        //     // print_r($produto->getAttributes());
        //     // echo '<br><br><br>';

        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

        //     if(isset($produtoDetalhe)) {
        //         // print_r($produtoDetalhe->getAttributes());

        //         $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $produtoDetalhe->largura;
        //         $produtos[$key]['altura'] = $produtoDetalhe->altura;

        //     }

        //     // echo '<hr>';
        // }
        
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['produto'=>$produto,'unidades'=>$unidades, 'fornecedores' => $fornecedores ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' =>'required|min:3|max:40',
            'descricao' =>'required|min:3|max:2000',
            'peso' =>'required|integer',
            'unidade_id' =>'exists:unidades,id',
            'fornecedor_id' =>'exists:fornecedores,id',

        ];

        $feedback = [
            'required'  =>'O campo :attribute deve ser preenchido',
            'nome.min'  =>'O campo nome deve ter no m??nimo 3 caracteres',
            'nome.max'   =>'O campo nome deve ter no m??ximo 40 caracteres',
            'descricao.min'  =>'O campo nome deve ter no m??nimo 3 caracteres',
            'descricao.max'   =>'O campo nome deve ter no m??ximo 2000 caracteres',
            'peso.integer'   =>'O campo peso deve ser um n??mero inteiro',
            'unidade_id.exists' =>'A unidade de medida informada n??o existe',
            'fornecedor_id.exists' =>'O fornecedor informado n??o existe',

        ];

        $request->validate($regras, $feedback);
        Item::create($request->all());

        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Item $produto)
    {
        return view('app.produto.show', ['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto'=>$produto, 'unidades'=>$unidades,'fornecedores' => $fornecedores]);
        // return view('app.produto.create', ['produto'=>$produto, 'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' =>'required|min:3|max:40',
            'descricao' =>'required|min:3|max:2000',
            'peso' =>'required|integer',
            'unidade_id' =>'exists:unidades,id',
            'fornecedor_id' =>'exists:fornecedores,id',
        ];

        $feedback = [
            'required'  =>'O campo :attribute deve ser preenchido',
            'nome.min'  =>'O campo nome deve ter no m??nimo 3 caracteres',
            'nome.max'   =>'O campo nome deve ter no m??ximo 40 caracteres',
            'descricao.min'  =>'O campo nome deve ter no m??nimo 3 caracteres',
            'descricao.max'   =>'O campo nome deve ter no m??ximo 2000 caracteres',
            'peso.integer'   =>'O campo peso deve ser um n??mero inteiro',
            'unidade_id.exists' =>'A unidade de medida informada n??o existe',
            'fornecedor_id.exists' =>'O fornecedor informado n??o existe',
        ];

        $request->validate($regras, $feedback);
        $produto->update($request->all());
        return redirect()->route('produtos.show', ['produto'=>$produto->id]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $produto)
    {
        $produto::find($produto->id)->delete();
        return response()->json(['msg' => 'Produto deleted!']);
    }
}
