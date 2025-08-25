<?php

define("DIR_ARQUIVOS", "arquivos");

function salvarDados($array, $arquivo) {
    //1- Converter o array para JSON
    $json = json_encode($array, JSON_PRETTY_PRINT);

    //2- Salvar o JSON o arquivo
    file_put_contents(DIR_ARQUIVOS . "/" . $arquivo, 
                      $json);
}

function buscarDados($arquivo) : array {
    $dados = array();

    //Buscar os dados do arquivo
    $nomeArquivo = DIR_ARQUIVOS . "/" . $arquivo;
    if(file_exists($nomeArquivo)) {
        $json = file_get_contents($nomeArquivo);
        $dados = json_decode($json, true); 
    }

    return $dados;
}