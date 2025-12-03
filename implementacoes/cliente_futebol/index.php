<?php
define("URL_BASE", "/cliente_futebol");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Cliente Futebol</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-info mb-3 px-3">
            <a class="navbar-brand" href="#">
                <img src="<?= URL_BASE ?>/img/logo-IFPR.png" style="height: 50px; width: auto;">
            </a>

            <span class="mx-auto text-white" style="font-size: 20px;">Cliente Futebol</span>
        </nav>

        <div class="row">
            <div class="col-2">
                <button id="btnBuscar" type="button" 
                    class="btn btn-primary">
                    Buscar clubes</button>
            </div>

             <div class="col-1"></div>

            <div class="col-2">
                <button id="btnBuscarAwait" type="button" 
                    class="btn btn-info">
                    Buscar clubes Await</button>
            </div>
        </div>    
                
        <div class="row m-3">
            <table id="tblClubes" class="col table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>Imagem</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="row mt-2">
            <div class="col">
                <input type="text" id="inpNome" 
                    class="form-control"
                    placeholder="Informe o nome">
            </div>

            <div class="col">
                <input type="text" id="inpCidade" 
                    class="form-control"
                    placeholder="Informe a cidade">
            </div>

            <div class="col">
                <input type="text" id="inpImagem" 
                    class="form-control"
                    placeholder="Informe a imagem">
            </div>

            <div class="col">
                <button id="btnInserir" type="button" 
                    class="btn btn-success">
                    Inserir clube</button>
            </div>
        </div>
    </div>

    <script src="<?= URL_BASE ?>/js/cliente.js"></script>

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>