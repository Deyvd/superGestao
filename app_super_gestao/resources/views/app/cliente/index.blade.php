@extends('app.layouts.basico')

@section('title', 'Cliente')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Listagem de Clientes</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('cliente.create')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;"> 
            <table class="borda-preta" width="100%">
                <thead class="borda-preta">
                    <th>Nome</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>

                <tbody >
                    @foreach ($clientes as $cliente )
                    <tr class="borda-preta">
                        <td>{{$cliente->nome}}</td>
                        
                        <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                        <td>
                            <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id])}}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>                            
                            </form>
                        </td>
                        <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  
            {{$clientes->appends($request)->links()}} 
            <br>

            Exibindo {{$clientes->count()}} clientes de {{$clientes->total()}} (do) {{$clientes->firstItem()}} ao {{$clientes->lastItem()}}
        </div>
    </div>
</div>
@endsection