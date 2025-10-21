<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Curso.php");

class CursoDao {

    private PDO $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM cursos ORDER BY nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->map($result);
    }

    private function map(array $result) {
        $cursos = array();
        foreach($result as $r) {
            $curso = new Curso();
            $curso->setId($r['id']);
            $curso->setNome($r['nome']);
            $curso->setTurno($r['turno']);

            array_push($cursos, $curso);
        }
        return $cursos;
    }

}