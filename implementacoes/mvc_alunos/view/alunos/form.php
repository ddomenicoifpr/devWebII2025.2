<?php

include_once(__DIR__ . "/../../controller/CursoController.php");

//Carregar a lista de cursos
$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);

include_once(__DIR__ . "/../include/header.php");

include_once(__DIR__ . "/../include/menu.php");
?>
<h3><?= $aluno && $aluno->getId() > 0 ? 'Editar' : 'Inserir' ?> aluno</h3>

<div class="row">

    <div class="col-6">

        <form method="POST" action="">

            <div class="mb-3">
                <label for="txtNome" class="form-label">Nome:</label>
                <input type="text" id="txtNome" name="nome"
                    placeholder="Informe o nome" 
                    value="<?= $aluno ? $aluno->getNome() : '' ?>"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label for="txtIdade" class="form-label">Idade:</label>
                <input type="number" id="txtIdade" name="idade"
                    placeholder="Informe a idade"
                    value="<?= $aluno ? $aluno->getIdade() : '' ?>"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label for="selEstrang" class="form-label">Estrangeiro:</label>
                <select name="estrang" id="selEstrang"
                    class="form-select">
                    <option value="">----Selecione----</option>
                    <option value="S" 
                        <?= $aluno && $aluno->getEstrangeiro() == 'S' ? 'selected' : '' ?> 
                        >Sim</option>
                    <option value="N"
                        <?= $aluno && $aluno->getEstrangeiro() == 'N' ? 'selected' : '' ?>
                        >Não</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="selCurso" class="form-label">Curso:</label>
                <select name="curso" id="selCurso"
                    class="form-select">
                    <option value="">----Selecione----</option>
                    
                    <?php foreach($cursos as $c): ?>
                        <option value="<?= $c->getId(); ?>" 
                            <?php if($aluno && $aluno->getCurso() &&
                                        $aluno->getCurso()->getId() == $c->getId())
                                    echo "selected";                        
                            ?>
                        >
                            <?= $c->getNomeTurno() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" value="<?= $aluno ? $aluno->getId() : 0 ?>"
                name="id">

            <div class="mt-2">
                <button type="submit" 
                    class="btn btn-success">Gravar</button>
            </div>

        </form>
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?= $msgErro ?>
            </div>
        <?php endif; ?> 
    </div>
</div> <!-- Fecha a row -->  

<div class="mt-5">
    <a href="listar.php" class="btn btn-outline-primary">Voltar</a>
</div>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>
