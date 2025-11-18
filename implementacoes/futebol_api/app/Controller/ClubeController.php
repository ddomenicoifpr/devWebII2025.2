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
		$clubes = $this->clubeDAO->list();
		//$response->getBody()->write(print_r($clubes, true));

		$json = json_encode($clubes, 
			JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		$response->getBody()->write($json);

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
    }

	public function buscarPorId(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$clube = $this->clubeDAO->findById($id);
		//$response->getBody()->write(print_r($clubes, true));

		if($clube) {
			$json = json_encode($clube, 
				JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			$response->getBody()->write($json);

			return $response
				->withHeader('Content-Type', 'application/json')
				->withStatus(200);
		}

		return $response
				->withStatus(404);
    }

}