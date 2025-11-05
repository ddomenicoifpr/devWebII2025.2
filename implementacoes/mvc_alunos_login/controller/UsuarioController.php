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

        //TODO - Validação de login
        
        //Retorna um array vazio para indicar que tudo deu certo
        return array();
    }

}