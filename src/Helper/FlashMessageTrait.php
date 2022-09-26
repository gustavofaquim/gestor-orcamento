<?php

namespace GenericMvc\Helper;


trait FlashMessageTrait{
    public function defineMensagem(String $tipo, string $mensagem){

        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $tipo;

    }
}