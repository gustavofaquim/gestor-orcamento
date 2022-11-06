<?php

namespace GenericMvc\Controllers;

use GenericMvc\Entity\Usuario;
use GenericMvc\Controllers\Transacao\ListarTransacoes;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;



class Home implements RequestHandlerInterface{

    use RenderizadorDeHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface{
        
        $transacaoL = new ListarTransacoes();
        //$transacoesD = $transacaoL->listarTransacoesPorData('d');
        //$transacoesM = $transacaoL->listarTransacoesPorData('m');
        //$transacoesY = $transacaoL->listarTransacoesPorData('d');
        $transacoes = $transacaoL->listarTransacoes();
        

        $html = $this->renderizaHtml('inicio.php', [
            'transacoes' => $transacoes
        ]);

        return new Response(200, [], $html);
    }
}