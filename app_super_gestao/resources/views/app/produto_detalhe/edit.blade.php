@extends('app.layouts.basico')

@section('title', 'Produto Detalhe')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
       
        <h1>Editar Detalhes do Produto</h1>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="#">Voltar</a></li>
            
        </ul>
    </div>

    <div class="informacao-pagina">

        <h4>Produto</h4>
        {{-- <div>Nome: {{$produto_detalhe->produto->nome}}</div> --}}
        <div><strong>Nome:</strong> {{$produto_detalhe->item->nome}}</div>
        <br>
        {{-- <div>Descrição: {{$produto_detalhe->produto->nome}}</div> --}}
        <div><strong>Descrição:</strong> {{$produto_detalhe->item->nome}}</div>

        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
            
           @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe'=>$produto_detalhe, 'unidades'=>$unidades])
               
           @endcomponent
        </div>
    </div>
</div>
@endsection