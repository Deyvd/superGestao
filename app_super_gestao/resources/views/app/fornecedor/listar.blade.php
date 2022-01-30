@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Fornecedor - Listar</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;"> 
            <table class="borda-preta">
                <thead class="borda-preta">
                    <th>Nome</th>
                    <th>Site</th>
                    <th>UF</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody >
                    @foreach ($fornecedores as $fornecedor )
                    <tr class="borda-preta">
                        <td>{{$fornecedor->name}}</td>
                        <td>{{$fornecedor->site}}</td>
                        <td>{{$fornecedor->uf}}</td>
                        <td>{{$fornecedor->email}}</td>
                        <td><a href="{{route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></td>
                        <td> <a href="{{route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>Lita de Produtos</p> 
                            <table border='1' style='margin:20px'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $fornecedor->produtos as $key => $produto  )
                                        
                                        <tr>
                                            <td>{{$produto->id}}</td> 
                                            <td>{{$produto->nome}}</td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  
            {{$fornecedores->appends($request)->links()}} 
            <br>
            {{-- {{$fornecedores->count()}}
            <br>
            {{$fornecedores->total()}}
            <br>
            {{$fornecedores->firstItem()}} --}}

            Exibindo {{$fornecedores->count()}} fornecedores de {{$fornecedores->total()}} (do) {{$fornecedores->firstItem()}} ao {{$fornecedores->lastItem()}}
        </div>
    </div>
</div>
@endsection