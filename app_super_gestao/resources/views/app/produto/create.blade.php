@extends('app.layouts.basico')

@section('title', 'Produto')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        @if(isset($produto->id))
        <h1>Editar Produto</h1>
        @else
        <h1>Adicionar Produto</h1>
        @endif
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('produtos.index')}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
            
            @if(isset($produto->id))
                <form method="post" action="{{route('produtos.update', ['produto' => $produto->id])}}">
                @csrf
                @method('PUT')
            @else
                <form method="post" action="{{route('produtos.store')}}">
                @csrf
            @endif

                <input type="text" name="nome" value="{{$produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                <small>{{$errors->has('nome') ? $errors->first('nome') : ''}}</small>
               
                <input type="text" name="descricao" value="{{$produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
                <small>{{$errors->has('descricao') ? $errors->first('descricao') : ''}}</small>

                <input type="text" name="peso" value="{{$produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
                <small>{{$errors->has('peso') ? $errors->first('peso') : ''}}</small>
                
                <select name="unidade_id" class="borda-preta">
                    <option >-- Selecione a Unidade de Medida --</option>
                     @foreach ($unidades as $unidade )
                        
                        <option value="{{$unidade->id}}" {{($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
     
                    @endforeach
                </select>
                <small>{{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}</small>
                @if(isset($produto->id))
                    <button type="submit" class="btn btn-primary borda-preta">Atualizar</button>
                @else
                    <button type="submit" class="btn btn-primary borda-preta">Cadastrar</button>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection