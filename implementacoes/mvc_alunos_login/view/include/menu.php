<?php

include_once(__DIR__ . "/../../util/config.php");
include_once(__DIR__ . "/../../controller/UsuarioController.php");

$usuarioCont = new UsuarioController();
$nomeUsuario = $usuarioCont->getNomeUsuarioLogado();

?>

<nav class="navbar navbar-expand-md bg-success px-3">
    
    <a class="navbar-brand" href="<?= URL_BASE ?>">
        MVC Alunos</a>

    <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= URL_BASE ?>">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"
                    id="navDropDown" data-bs-toggle="dropdown">Cadastros</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" 
                        href="<?= URL_BASE ?>/view/alunos/listar.php">
                        Alunos</a>
                    <a class="dropdown-item" href="#">Turmas</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"
                    id="navDropDown" data-bs-toggle="dropdown"><?= $nomeUsuario ?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" 
                        href="<?= URL_BASE ?>/view/login/logoff.php">
                        Sair</a>
                </div>
            </li>
        </ul>
    </div>
</nav>