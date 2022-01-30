@if(isset($produto->id))
<form method="post" action="{{route('produtos.update', ['produto' => $produto->id])}}">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{route('produtos.store')}}">
    @csrf
@endif

    <select   select name="fornecedor_id" class="borda-preta">
        <option >-- Selecione um Fornecedor --</option>
            @foreach ($fornecedores as $fornecedor )
            
            <option value="{{$fornecedor->id}}" {{($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>{{$fornecedor->name}}</option>

        @endforeach
    </select>
    <small>{{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}</small>


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