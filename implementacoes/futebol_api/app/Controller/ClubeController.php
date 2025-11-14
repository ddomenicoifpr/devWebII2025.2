<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\ClubeDAO;
use App\Mapper\ClubeMapper;
use App\Service\ClubeService;
use App\Util\MensagemErro;

use \PDOException;

class ClubeController {

	private ClubeDAO $clubeDAO;
	private ClubeMapper $clubeMapper;
	private ClubeService $clubeService;

	public function __construct() {
		$this->clubeDAO = new ClubeDAO();
		$this->clubeMapper = new ClubeMapper();
		$this->clubeService = new ClubeService();
	}

	public function listar(Request $request, Response $response, array $args): Response {
		$response->getBody()->write('{msg: "Listando..."}');

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
    }

}