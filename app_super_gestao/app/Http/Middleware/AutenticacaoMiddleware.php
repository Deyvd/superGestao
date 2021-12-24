<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        // 
        echo $metodo_autenticacao. ' - '. $perfil;
        echo '<br>';

        if ($metodo_autenticacao == $perfil) {
            echo 'Verificar o usuário e senha no banco de dados';
            echo '<br>';
        } 
        if($metodo_autenticacao == $perfil)  {
            echo 'verificar o usuário e senha no AD';
            echo '<br>';
        }

        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos';
            echo '<br>';
        } else {
            echo 'Carregar o perfil no banco de dados';
            echo '<br>';
        }
        if (false) {
            return $next($request);
        } else {
        return response('Acesso negado: Rota exige autenticação!!!');
        echo '<br>';
        }

    }
}
