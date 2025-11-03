<?php

include_once(__DIR__ . "/../dao/AlunoDao.php");
include_once(__DIR__ . "/../service/AlunoService.php");

class AlunoController {

    private AlunoDao $alunoDao;
    private AlunoService $alunoService;

    public function __construct() {
        $this->alunoDao = new AlunoDao();      
        $this->alunoService = new AlunoService();  
    }

    public function listar() {
        return $this->alunoDao->list();
    }

    public function buscarPorId(int $id) {
        return $this->alunoDao->findById($id);
    }

    public function inserir(Aluno $aluno) {
        //Validar os dados
        $erros = $this->alunoService->validar($aluno);
        
        if(! $erros)
            $this->alunoDao->insert($aluno);

        return $erros;
    }

    public function editar(Aluno $aluno) {
        //Validar os dados
        $erros = $this->alunoService->validar($aluno);
        
        if(! $erros)
            $this->alunoDao->update($aluno);

        return $erros;
    }

    public function excluir(int $id) {
        $this->alunoDao->delete($id);
    }



}