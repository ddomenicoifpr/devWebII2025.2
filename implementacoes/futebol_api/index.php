<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use Slim\Exception\HttpNotFoundException;

use App\Controller\ClubeController;

require_once(__DIR__ . '/vendor/autoload.php');

$app = AppFactory::create();
$app->setBasePath("/futebol_api"); //Adicionar o nome da pasta do projeto

// Parse json, form data and xml
$app->addBodyParsingMiddleware();
//$app->addRoutingMiddleware(); //Serve para adicionar tratamentos padrões para erros retornados pelos ENDPoints
$app->addErrorMiddleware(true, true, true); //Retorna um erro do Framework caso não tratado

//ROTAS
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Funcionou!");
    return $response;
});

/* /olaMundo?nome=Fulano  */
$app->get('/olaMundo', function (Request $request, Response $response, $args) {
    $parametros = $request->getQueryParams();

    $nome = "Sem nome";
    if(isset($parametros['nome']))
        $nome = $parametros['nome'];
    
    $response->getBody()->write("Seja bem vindo " . $nome . "!");
    return $response;
});

$app->get('/olaMundo2/{nome}', function (Request $request, Response $response, $args) {
    $nome = $args["nome"];
    
    $response->getBody()->write("Seja bem vindo " . $nome . "!");
    return $response;
});

//Clubes
$app->get("/clubes", ClubeController::class . ":listar");
$app->get("/clubes/{id}", ClubeController::class . ":buscarPorId");
$app->post("/clubes", ClubeController::class . ":inserir");
$app->delete("/clubes/{id}", ClubeController::class . ":excluir");
$app->put("/clubes/{id}", ClubeController::class . ":atualizar");

//Tratamento para rota não encontrada
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});


$app->run();
