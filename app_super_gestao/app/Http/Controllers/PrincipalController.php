<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){

        $motivo_contatos = MotivoContato::all();
        
        return view('site.principal', ['title' => 'Home', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        
        $rules = [
            'nome' =>'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email', 
            'motivo_contatos_id' => 'required', 
            'msg' => 'required|max:2000',
        ];
        
        $feedback = [
            'required'  => 'Este campo :attribute é obrigatorio.',
            'nome.min'  => 'o campo nome precisa ter no mínimo 3 caracteres.',
            'nome.max'  => 'o campo nome deve ter no máximo 40 caracteres.',
            'email'     => 'O email informado não é válido.',
            'msg.max'   => 'O texto deve ter no máximo 2000 caracteres.'
        ];

        $request->validate($rules, $feedback);
        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
