
<form method="post" action="{{route('pedido-produto.store', ['pedido'=>$pedido])}}">
    @csrf

    <select   select name="produto_id" class="borda-preta">
        <option >-- Selecione um Produto --</option>
            @foreach ($produtos as $produto )
            
            <option value="{{$produto->id}}" {{ old('produto_id') == $produto->id ? 'selected' : ''}}>{{$produto->nome}}</option>

        @endforeach
    </select>
    <small>{{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}</small>

    <input type="number" name="quantidade" value="{{old('quantidade') ? old('quantidade') : ''}}" placeholder="Quantidade" class="borda-preta">
    <small>{{$errors->has('quantidade') ? $errors->first('quantidade') : ''}}</small>

    

        <button type="submit" class="btn btn-primary borda-preta">Cadastrar</button>

</form>