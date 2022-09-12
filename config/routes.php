<?php 

use \GestorOrcamento\Controllers\FormularioLogin;
use \GestorOrcamento\Controllers\RealizaLogin;
use \GestorOrcamento\Controllers\Deslogar;
use \GestorOrcamento\Controllers\Usuario\FormularioCadastro;


$rotas = [
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizaLogin::class,
    '/deslogar' => Deslogar::class,
    '/novo-usuario' => FormularioCadastro::class

];

return $rotas;