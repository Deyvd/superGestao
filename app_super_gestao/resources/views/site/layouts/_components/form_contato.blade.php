{{$slot}}
<form class="form-group" {{route('site.contato')}} method="post">
@csrf
    <div class="mb-3">
        <input name="nome" type="text" placeholder="Nome" class="{{$class}}" value="{{ old('nome') }}">
        @if ($errors->has('nome'))
            <small  >{{$errors->first('nome')}}</small>
        @endif 
        
    </div>

    <div class="mb-3">
        <input name="telefone" type="text" placeholder="Telefone" class="{{$class}}"value="{{ old('telefone') }}">
        @if ($errors->has('telefone'))
            <small  >{{$errors->first('telefone')}}</small>
        @endif 
    </div>
    
    <div class="mb-3">
        <input name="email" type="text" placeholder="E-mail" class="{{$class}}"value="{{ old('email') }}">
         @if ($errors->has('email'))
            <small  >{{$errors->first('email')}}</small>
        @endif 
    </div>

    <div class="mb-3">
        <select class="{{$class}}" name="motivo_contatos_id">
            <option value="">Qual o motivo do contato?</option>
            @foreach ($motivo_contatos as $key => $motivo_contato )
                <option value="{{$motivo_contato->id}}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
            @endforeach
        </select>
         @if ($errors->has('motivo_contatos_id'))
            <small  >{{$errors->first('motivo_contatos_id')}}</small>
        @endif 
    </div>

    <div class="mb-3">
        <textarea name="msg" class="{{$class}}"> {{ (old('msg')) ? old('msg') : 'Preencha aqui a sua mensagem' }}  </textarea>
         @if ($errors->has('msg'))
            <small  >{{$errors->first('msg')}}</small>
        @endif 
    </div>

    <button type="submit" class="{{$class}}">ENVIAR</button>
</form>
