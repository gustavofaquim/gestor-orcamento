<?php 

use \GenericMvc\Controllers\Home;
use \GenericMvc\Controllers\FormularioLogin;
use \GenericMvc\Controllers\RealizaLogin;
use \GenericMvc\Controllers\Deslogar;
use \GenericMvc\Controllers\Usuario\FormularioCadastro as FormularioCadastroUsuario;
use \GenericMvc\Controllers\Usuario\FormularioEdicao as FormularioEdicaoUsuario;
use \GenericMvc\Controllers\Usuario\CadastroUsuario;
use \GenericMvc\Controllers\Transacao\FormularioTransacao;
use \GenericMvc\Controllers\Transacao\ListarTransacoes;
use \GenericMvc\Controllers\Transacao\CadastroTransacao;
use \GenericMvc\Controllers\Transacao\AtualizaTransacao;
use \GenericMvc\Controllers\Conta\FormularioConta;
use \GenericMvc\Controllers\Conta\CadastroConta;
use \GenericMvc\Controllers\Conta\ListarContas;
use \GenericMvc\Controllers\Categoria\ListarCategorias;
use \GenericMvc\Controllers\Categoria\FormularioCategoria;
use \GenericMvc\Controllers\Categoria\CadastroCategoria;
use \GenericMvc\Controllers\Categoria\FormEditaCategoria;
use \GenericMvc\Controllers\Conta\PesquisarContas;
use \GenericMvc\Controllers\Usuario\ListaUsuarios;


$rotas = [
    '/' => Home::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizaLogin::class,
    '/deslogar' => Deslogar::class,
    '/novo-usuario' => FormularioCadastroUsuario::class,
    '/cadastrar-usuario' => CadastroUsuario::class,
    '/alterar-usuario' => FormularioEdicaoUsuario::class,
    '/nova-transacao' => FormularioTransacao::class,
    '/atualiza-transacao/$id' => AtualizaTransacao::class,
    '/cadastrar-transacao' => CadastroTransacao::class,
    '/nova-conta' => FormularioConta::class,
    '/cadastrar-conta' => CadastroConta::class,
    '/listar-contas' => ListarContas::class,
    '/listar-categorias' => ListarCategorias::class,
    '/nova-categoria' => FormularioCategoria::class,
    '/cadastrar-categoria' => CadastroCategoria::class,
    '/alterar-categoria' => FormEditaCategoria::class,
    '/teste' => PesquisarContas::class,
    '/usuarios' => ListaUsuarios::class
];

return $rotas;