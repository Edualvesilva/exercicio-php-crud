<?php
require_once "conecta.php";
require_once "funcoes.php";
require_once "funcoes-utilitarias.php";
$listaAlunos = lerAlunos($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Lista de alunos</h1>
        <hr>
        <p><a href="inserir.php">Inserir novo aluno</a></p>

        <table>
            <thead>
                <tr>
                    <th>Nome Do Aluno</th>
                    <th>1º Nota</th>
                    <th>2º Nota</th>
                    <th>Média</th>
                    <th>Situação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaAlunos as $aluno) { ?>
                    <tr>
                        <td>
                            <?= $aluno["nome"] ?>
                        </td>

                        <td><?= $aluno["primeira"] ?></td>

                        <td><?= $aluno["segunda"] ?></td>

                        <td><?=ContarMedia($aluno["primeira"],$aluno["segunda"])?></td>

                        <td></td>
                        <td><a href="atualizar.php">Editar</a> <a href="excluir.php">Excluir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p><a href="index.php">Voltar ao início</a></p>
    </div>

</body>

</html>