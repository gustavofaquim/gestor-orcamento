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

       

        $arr = array();
        foreach($transacoesY as $aux){

            $padrao = $aux->__get('categoria')->__get('idcategoria');
            $valor = 0;

            foreach($transacoesY as $trans){
                
                if($trans->__get('categoria')->__get('idcategoria') == $padrao){
                    $valor += $trans->__get('valor');
                }

            }
            
            $arr+=  [
                "idtransacao" => $aux->__get('idtransacao'),
                "icon" =>  $aux->__get('categoria')->__get('icon'),
                "cor" => $aux->__get('categoria')->__get('cor'),
                "descricao" => $aux->__get('categoria')->__get('descricao'),
                "valor" => $valor
            ];
        }
        
        $arr2 = array();
        foreach($transacoesY as $trans2){
            foreach($arr as $ar){
                if($trans2->__get('categoria')->__get('descricao') != $arr["descricao"]){
                    $arr2 +=  [
                        "idtransacao" => $trans2->__get('idtransacao'),
                        "icon" =>  $trans2->__get('categoria')->__get('icon'),
                        "cor" => $trans2->__get('categoria')->__get('cor'),
                        "descricao" => $trans2->__get('categoria')->__get('descricao'),
                        "valor" => $trans2->__get('valor')
                    ];
                }
            }
        }

        $transacoesAno[] = $arr;
        $transacoesAno[] = $arr2;
        
          
        //$transacoesY = $transacaoL->listarTransacoesPorData('d');
        $transacoes = $transacaoL->listarTransacoes();

        
        

        $html = $this->renderizaHtml('inicio.php', [
            'transacoes' => $transacoes,
            'transacoesM' => $transacoesM,
            'transacoesY' => $transacoesAno,
        ]);

        return new Response(200, [], $html);
    }
}