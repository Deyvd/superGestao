@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Listagem de Produtos</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('produtos.create')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;"> 
            <table class="borda-preta">
                <thead class="borda-preta">
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Peso</th>
                    <th>Unidade ID</th>
                    <th>Unidade ID</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody >
                    @foreach ($produtos as $produto )
                    <tr class="borda-preta">
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->peso}}</td>
                        <td>{{$produto->unidade_id}}</td>
                        <td><a href="{{ route('produtos.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                        <td>
                            <form id="form_{{$produto->id}}" method="post" action="{{ route('produtos.destroy', ['produto' => $produto->id])}}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>                            
                            </form>
                        </td>
                        <td><a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  
            {{$produtos->appends($request)->links()}} 
            <br>
            {{-- {{$fornecedores->count()}}
            <br>
            {{$fornecedores->total()}}
            <br>
            {{$fornecedores->firstItem()}} --}}

            Exibindo {{$produtos->count()}} produtos de {{$produtos->total()}} (do) {{$produtos->firstItem()}} ao {{$produtos->lastItem()}}
        </div>
    </div>
</div>
@endsection