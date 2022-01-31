@extends('app.layouts.basico')

@section('title', 'Pedido')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Listagem de Pedidos</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('pedido.create')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;"> 
            <table class="borda-preta" width="100%">
                <thead class="borda-preta">
                    <th>ID PEDIDO</th>
                    <th>ID CLIENTE</th>
                    <th>PEDIDOS</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>

                <tbody >
                    @foreach ($pedidos as $pedido)
                    <tr class="borda-preta">
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->cliente_id}}</td>
                        <td><a href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">Adicionar Produtos</a></td>
                        
                        <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                        <td>
                            <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id])}}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>                            
                            </form>
                        </td>
                        <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  
            {{$pedidos->appends($request)->links()}} 
            <br>

            Exibindo {{$pedidos->count()}} pedidos de {{$pedidos->total()}} (do) {{$pedidos->firstItem()}} ao {{$pedidos->lastItem()}}
        </div>
    </div>
</div>
@endsection