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
        
        echo"<pre>";
        
        foreach($transacoesM as $trans){
           //var_dump($trans->__get('categoria')->__get('descricao') . ' - '. $trans->__get('valor'));
           
           $categoria = $trans->__get('categoria')->__get('idcateogira');
           $existe = false;

            foreach($array as &$subArr){
                //var_dump($array);
                if($categoria == $subArr->__get('categoria')->__get('idcategoria')){
                    var_dump('ETROUUUU');
                    $valorAntigo = intval($subArr->__get('valor'), 10);
                    $novoValor = intval($trans->__get('valor'), 10);
                    $existe = strval($valorAntigo + $novoValor); // inserir o novo numero
                    $subArr->set('valor',$existe);
                }
            }
            if (!$existe) $array[] = $trans;

        }
        var_dump($array[1]->__get('categoria')->__get('descricao'));
        echo"</pre>";
        exit();
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