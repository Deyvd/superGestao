@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Fornecedores - Adicionar</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{$msg ?? ''}}
        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
            <form method="post" action="{{ route('app.fornecedor.adicionar')}}">
            @csrf
                <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">

                <input type="text" name="name" value="{{ $fornecedor->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
                <small>{{$errors->has('name') ? $errors->first('name') : ''}}</small>

                <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}" placeholder="site" class="borda-preta">
                <small>{{$errors->has('site') ? $errors->first('site') : ''}}</small>

                <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="UF" class="borda-preta">
                <small>{{$errors->has('uf') ? $errors->first('uf') : ''}}</small>
                
                <input type="text" name="email" value="{{ $fornecedor->email ?? old('email') }}" placeholder="E-mail" class="borda-preta">
                <small>{{$errors->has('email') ? $errors->first('email') : ''}}</small>
                
                <button type="submit" class="btn btn-primary borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection