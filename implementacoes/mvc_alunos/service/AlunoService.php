<?php

include_once(__DIR__ . "/../model/Aluno.php");

class AlunoService {

    public function validar(Aluno $aluno) {
        $erros = array();

        //Validar se o nome está preenchido
        //if($aluno->getNome() == NULL)
        if(! $aluno->getNome())
            array_push($erros, "Informe o nome!");

        //Validar se a idade está preenchida
        if(! $aluno->getIdade())
            array_push($erros, "Informe a idade!");

        //Validar se o estrangeiro está preenchido
        if(! $aluno->getEstrangeiro())
            array_push($erros, "Informe se o aluno é estrangeiro!");

        //Validar se o curso está preenchido
        if(! $aluno->getCurso())
            array_push($erros, "Informe o curso!");

        return $erros;
    }

}