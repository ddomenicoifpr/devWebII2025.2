<?php

include_once(__DIR__ . "/../dao/AlunoDao.php");

class AlunoController {

    private AlunoDao $alunoDao;

    public function __construct() {
        $this->alunoDao = new AlunoDao();        
    }

    public function listar() {
        return $this->alunoDao->list();
    }

    public function inserir(Aluno $aluno) {
        $this->alunoDao->insert($aluno);
    }

    public function excluir(int $id) {
        $this->alunoDao->delete($id);
    }



}