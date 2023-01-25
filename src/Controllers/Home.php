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

        $array = [];
        //var_dump($aux);
        
        //exit();
        $transacoesY = $transacaoL->listarTransacoesAno();

        echo"<pre>";

        $arr = array();
        foreach($transacoesY as $aux){

            $padrao = $aux->__get('categoria')->__get('idcategoria');
            $valor = 0;

            foreach($transacoesY as $trans){
                
                if($trans->__get('categoria')->__get('idcategoria') == $padrao){
                    $valor += $trans->__get('valor');
                }

            }
            
            $arr += [$aux->__get('categoria')->__get('descricao'), $valor];
            $chave = array_search("Lanche", get_object_vars($aux));
            var_dump($aux);

            var_dump(($chave)); //Agora precismos remover a posição encontrado do array
            if($chave !== false) unset($transacoesY[$chave]);

        }
        
        exit();
        
        //var_dump($transacoesY[0]->__get('categoria')->__get('descricao'));
          
        echo"</pre>";

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