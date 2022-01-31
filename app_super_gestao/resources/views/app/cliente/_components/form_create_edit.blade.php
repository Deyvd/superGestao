@if(isset($cliente->id))
<form method="post" action="{{route('cliente.update', ['cliente' => $cliente->id])}}">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{route('cliente.store')}}">
    @csrf
@endif
    
    <input type="text" name="nome" value="{{$cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
    <small>{{$errors->has('nome') ? $errors->first('nome') : ''}}</small>
    

    @if(isset($cliente->id))
        <button type="submit" class="btn btn-primary borda-preta">Atualizar</button>
    @else
        <button type="submit" class="btn btn-primary borda-preta">Cadastrar</button>
    @endif
</form>