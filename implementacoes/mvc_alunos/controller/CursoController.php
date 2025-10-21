<?php

include_once(__DIR__ . "/../dao/CursoDao.php");

class CursoController {

    private CursoDao $cursoDao;

    public function __construct() {
        $this->cursoDao = new CursoDao();
    }

    public function listar() {
        return $this->cursoDao->list();
    }

}