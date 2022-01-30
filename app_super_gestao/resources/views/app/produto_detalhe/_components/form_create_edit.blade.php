
@if(isset($produto_detalhe->id))
    <form method="post" action="{{route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id])}}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{route('produto-detalhe.store')}}">
    @csrf
@endif

    <input type="text" name="produto_id" value="{{$produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="Produto_ID" class="borda-preta">
    <small>{{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}</small>
    
    <input type="text" name="comprimento" value="{{$produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimentoo" class="borda-preta">
    <small>{{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}</small>

    <input type="text" name="largura" value="{{$produto_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="borda-preta">
    <small>{{$errors->has('largura') ? $errors->first('largura') : ''}}</small>
    
    <input type="text" name="altura" value="{{$produto_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="borda-preta">
    <small>{{$errors->has('altura') ? $errors->first('altura') : ''}}</small>
        
    <select name="unidade_id" class="borda-preta">
        <option >-- Selecione a Unidade de Medida --</option>
            @foreach ($unidades as $unidade )
            
            <option value="{{$unidade->id}}" {{($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>

        @endforeach
    </select>
    <small>{{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}</small>
    @if(isset($produto_detalhe->id))
        <button type="submit" class="btn btn-primary borda-preta">Atualizar</button>
    @else
        <button type="submit" class="btn btn-primary borda-preta">Cadastrar</button>
    @endif
</form>