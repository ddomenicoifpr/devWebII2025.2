<?php

class Livro {

    //Atributos
    private string $titulo;
    private string $autor;
    private string $genero;
    private int $qtdPaginas;

    //Construtor
    public function __construct($t, $a, $g, $p) {
        $this->titulo     = $t;
        $this->autor      = $a;
        $this->genero     = $g;
        $this->qtdPaginas = $p;
    }

    //GETs e SETs
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getQtdPaginas(): int
    {
        return $this->qtdPaginas;
    }

    public function setQtdPaginas(int $qtdPaginas): self
    {
        $this->qtdPaginas = $qtdPaginas;

        return $this;
    }
}
