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

	public function inserir(Request $request, Response $response, 
							array $args): Response {
		$clubeArray = $request->getParsedBody();
		$clube = $this->clubeMapper->mapFromJsonToObject($clubeArray);

		$erro = $this->clubeService->validar($clube);
		if($erro) {
			$jsonErro = MensagemErro::getJSONErro($erro,
												  "",
												  400); //Bad request
			$response->getBody()->write($jsonErro);
			
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(400); //Bad request
		}

		try {
			$this->clubeDAO->insert($clube);

			$json = json_encode($clube, 
				JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			$response->getBody()->write($json);
			
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(201); //Criado
		} catch(PDOException $e) {
			$jsonErro = MensagemErro::getJSONErro("Erro ao inserir o clube!",
												  $e->getMessage(),
												  500);
			$response->getBody()->write($jsonErro);
			
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(500); //Erro no servidor
		}
	}

	public function atualizar(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$clube = $this->clubeDAO->findById($id);
		
		if($clube) {
			//1- Receber os dados do JSON e criar o objeto
			$clubeArray = $request->getParsedBody();
			$clube = $this->clubeMapper->mapFromJsonToObject($clubeArray);

			//2- Validar os dados
			$erro = $this->clubeService->validar($clube);
			if($erro) {
				$jsonErro = MensagemErro::getJSONErro($erro,
													"",
													400); //Bad request
				$response->getBody()->write($jsonErro);
				
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(400); //Bad request
			}

			//3- Atualizar no banco (sucesso ou erro)
			try {
				$clube->setId($id);
				$this->clubeDAO->update($clube);

				$json = json_encode($clube, 
					JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
				$response->getBody()->write($json);
				
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(200); //OK
			} catch(PDOException $e) {
				$jsonErro = MensagemErro::getJSONErro("Erro ao atualizar o clube!",
												  $e->getMessage(),
												  500);
				$response->getBody()->write($jsonErro);
				
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(500); //Erro no servidor
			}
		}

		return $response
				->withStatus(404); //Not Found
    }

	public function excluir(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$clube = $this->clubeDAO->findById($id);
		
		if($clube) {
			//Excluir
			try {
				$this->clubeDAO->deleteById($clube->getId());
				return $response
					->withStatus(200); //OK
			} catch(PDOException $e) {
				$jsonErro = MensagemErro::getJSONErro("Erro ao excluir o clube!",
												  $e->getMessage(),
												  500);
				$response->getBody()->write($jsonErro);
				
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(500); //Erro no servidor
			}

		}

		return $response
				->withStatus(404); //Not Found
    }

}