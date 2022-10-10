<?php 

use \GenericMvc\Controllers\Home;
use \GenericMvc\Controllers\FormularioLogin;
use \GenericMvc\Controllers\RealizaLogin;
use \GenericMvc\Controllers\Deslogar;
use \GenericMvc\Controllers\Usuario\FormularioCadastro as FormularioCadastroUsuario;
use \GenericMvc\Controllers\Usuario\FormularioEdicao as FormularioEdicaoUsuario;
use \GenericMvc\Controllers\Usuario\CadastroUsuario;
use \GenericMvc\Controllers\Transacao\FormularioTransacao;
use \GenericMvc\Controllers\Transacao\CadastroTransacao;
use \GenericMvc\Controllers\Conta\FormularioConta;
use \GenericMvc\Controllers\Conta\CadastroConta;


$rotas = [
    '/' => Home::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizaLogin::class,
    '/deslogar' => Deslogar::class,
    '/novo-usuario' => FormularioCadastroUsuario::class,
    '/cadastrar-usuario' => CadastroUsuario::class,
    '/alterar-usuario' => FormularioEdicaoUsuario::class,
    '/nova-transacao' => FormularioTransacao::class,
    '/cadastrar-transacao' => CadastroTransacao::class,
    '/nova-conta' => FormularioConta::class,
    '/cadastrar-conta' => CadastroConta::class
];

return $rotas;