@if(isset($pedido->id))
<form method="post" action="{{route('pedido.update', ['pedido' => $pedido->id])}}">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{route('pedido.store')}}">
    @csrf
@endif
    
    <select   select name="cliente_id" class="borda-preta">
        <option >-- Selecione um Fornecedor --</option>
            @foreach ($clientes as $cliente )
            
            <option value="{{$cliente->id}}" {{($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}}</option>

        @endforeach
    </select>
    <small>{{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}</small>
    

    @if(isset($pedido->id))
        <button type="submit" class="btn btn-primary borda-preta">Atualizar</button>
    @else
        <button type="submit" class="btn btn-primary borda-preta">Cadastrar</button>
    @endif
</form>