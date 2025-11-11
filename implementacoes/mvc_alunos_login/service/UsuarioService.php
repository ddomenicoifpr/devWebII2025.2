<?php
#Arquivo com a declaração da classe service para Usuario

class UsuarioService {

    private const SESSAO_ID   = "sessaoId";
    private const SESSAO_NOME = "sessaoNome";

    public function validarDadosLogin(string $login, string $senha) {
        $erros = array();

        //Validar login
        if(! $login)
            array_push($erros, "O campo [Login] é obrigatório.");

        //Validar senha
        if(! $senha)
            array_push($erros, "O campo [Senha] é obrigatório.");

        return $erros;
    }

    public function salvarUsuarioSessao(Usuario $usuario) {
        $this->iniciarSessao();

        $_SESSION[UsuarioService::SESSAO_ID]   = $usuario->getId();
        $_SESSION[UsuarioService::SESSAO_NOME] = $usuario->getNome();
    }

    public function removerUsuarioSessao() {
        $this->iniciarSessao();
        session_unset();
        session_destroy();
    }

    public function existeUsuarioSessao(): bool {
        $this->iniciarSessao();

        if(isset($_SESSION[UsuarioService::SESSAO_ID]))
            return true;
        
        return false;
    }

    public function getNomeUsuarioLogado(): string {
        if($this->existeUsuarioSessao()) 
            return $_SESSION[UsuarioService::SESSAO_NOME];
        
        return "(não logado)";
    }

    private function iniciarSessao() {
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

}