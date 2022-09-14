<?php 

use \GestorOrcamento\Controllers\FormularioLogin;
use \GestorOrcamento\Controllers\RealizaLogin;
use \GestorOrcamento\Controllers\Deslogar;
use \GestorOrcamento\Controllers\Usuario\FormularioCadastro as FormularioCadastroUsuario;
use \GestorOrcamento\Controllers\Usuario\FormularioEdicao as FormularioEdicaoUsuario;
use \GestorOrcamento\Controllers\Usuario\CadastroUsuario;


$rotas = [
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizaLogin::class,
    '/deslogar' => Deslogar::class,
    '/novo-usuario' => FormularioCadastroUsuario::class,
    '/cadastrar-usuario' => CadastroUsuario::class,
    '/alterar-usuario' => FormularioEdicaoUsuario::class,
];

return $rotas;