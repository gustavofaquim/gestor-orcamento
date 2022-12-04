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
        $transacoesM = $transacaoL->listarTransacoesMes();
        $transacoesY = $transacaoL->listarTransacoesAno();
        //$transacoesY = $transacaoL->listarTransacoesPorData('d');
        $transacoes = $transacaoL->listarTransacoes();

        
        

        $html = $this->renderizaHtml('inicio.php', [
            'transacoes' => $transacoes,
            'transacoesM' => $transacoesM,
            'transacoesY' => $transacoesY,
        ]);

        return new Response(200, [], $html);
    }
}