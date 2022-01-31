@extends('app.layouts.basico')

@section('title', 'Pedido Produto')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        
        <h1>Adicionar Produtos ao Pedido</h1>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index')}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>
           <p>Id do Pedido: {{$pedido->id}}
           <p>Cliente: {{$pedido->cliente_id}}


        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
           <h4> Itens do Pedido </h4>
           <table width="100%" border="1">
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Nome do Produto</th>
                    <th>Data de inclusão do item no Pedido</th>
                    <th></th>
                </tr>
            </thead>
            
            @foreach ($pedido->produtos as $key => $produto )
            <tbody> 
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                    <td>
                        <form id="form_{{$produto->pivot->id}}" method="post" action="{{route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' =>$pedido->id])}}">
                            @csrf
                            {{-- @method(DELETE) --}}
                            <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach

           </table>
           
           
           
            @component('app.pedido_produto._components.form_create', ['pedido'=>$pedido, 'produtos'=>$produtos])
               
           @endcomponent 
        </div>
    </div>
</div>
@endsection