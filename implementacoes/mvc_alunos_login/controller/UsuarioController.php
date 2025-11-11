<?php

require_once(__DIR__ . "/../dao/UsuarioDao.php");
require_once(__DIR__ . "/../service/UsuarioService.php");

class UsuarioController {

    private UsuarioDao $usuarioDao;
    private UsuarioService $usuarioService;

    public function __construct() {
        $this->usuarioDao = new UsuarioDao();    
        $this->usuarioService = new UsuarioService();        
    }

    public function logar(string $login, string $senha) {
        $erros = $this->usuarioService->validarDadosLogin($login, $senha);

        if(! empty($erros))
            return $erros;

        //Validação de login com a tabela do banco de dados
        $usuario = $this->usuarioDao->findByLoginSenha($login, $senha);
        if(! $usuario)
            return array("Login ou senha inválidos!");

        //Salvar os dados do usuário logado na sessão
        $this->usuarioService->salvarUsuarioSessao($usuario);        
        
        //Retorna um array vazio para indicar que tudo deu certo
        return array();
    }

    public function deslogar() {
        $this->usuarioService->removerUsuarioSessao();
    }

    public function usuarioEstaLogado(): bool {
        return $this->usuarioService->existeUsuarioSessao();
    }

    public function getNomeUsuarioLogado(): string {
        return $this->usuarioService->getNomeUsuarioLogado();
    }

}