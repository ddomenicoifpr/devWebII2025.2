<?php

include_once(__DIR__ . "/../../model/Aluno.php");
include_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = "";
$aluno = NULL;

//Verificar se o usuário clicou no gravar
if(isset($_POST['nome'])) {
    //Capturar os valores preechidos no formulário
    $nome    = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $idade   = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']) : NULL;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL;

    //Criar um objeto aluno
    $aluno = new Aluno();
    $aluno->setId(0);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrang);

    if($idCurso) {
        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    } else 
        $aluno->setCurso(NULL);

    //print_r($aluno);
    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);

    if(! $erros)
        header("location: listar.php");
    else {
        $msgErro = implode("<br>", $erros);
    }
}


include_once(__DIR__ . "/form.php");
?>