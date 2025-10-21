<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Aluno.php");

class AlunoDao {

    private PDO $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();    
    }

    public function list() {
        $sql = "SELECT a.*, c.nome nome_curso, c.turno turno_curso
                FROM alunos a
                JOIN cursos c ON (c.id = a.id_curso)";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    public function insert(Aluno $aluno) {
        try {
            $sql = "INSERT INTO alunos
                    (nome, idade, estrangeiro, id_curso)
                    VALUES (?, ?, ?, ?)";

            $stm = $this->conn->prepare($sql);
            $stm->execute(array($aluno->getNome(),
                                $aluno->getIdade(),
                                $aluno->getEstrangeiro(),
                                $aluno->getCurso()->getId()));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete(int $id) {
        try {
            $sql = "DELETE FROM alunos WHERE id = ?";

            $stm = $this->conn->prepare($sql);
            $stm->execute(array($id));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    //Conversão de array assoc. para objeto
    private function map(array $result) {
        $alunos = array();

        foreach($result as $r) {
            $aluno = new Aluno();
            $aluno->setId($r['id']);
            $aluno->setNome($r['nome']);
            $aluno->setIdade($r['idade']);
            $aluno->setEstrangeiro($r['estrangeiro']);
            
            $curso = new Curso();
            $curso->setId($r['id_curso']);
            $curso->setNome($r['nome_curso']);
            $curso->setTurno($r['turno_curso']);
            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }

        return $alunos;
    }


}