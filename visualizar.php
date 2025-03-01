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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaAlunos as $aluno) { ?>
                   <?php $media = ContarMedia($aluno["primeira"],$aluno["segunda"]);
                   ?>
                    <tr>
                        <td>
                            <?= $aluno["nome"] ?>
                        </td>

                        <td><?= formatarNota($aluno["primeira"]) ?></td>

                        <td><?= formatarNota($aluno["segunda"]) ?></td>

                        <td><?=ContarMedia($aluno["primeira"],$aluno["segunda"])?></td>

                        <td <?php if(situacao($media) == "Aprovado"){
                            echo " class='aprovado'";
                        } elseif(situacao($media) == "Reprovado"){
                            echo "class='reprovado'";
                        } else{
                            echo "class='recuperacao'";
                        }
                        
                        ?> ><?=situacao($media);?></td>
                        <td><a href="atualizar.php?id=<?=$aluno["id"]?>">Editar</a> <a class="excluir" href="excluir.php?id=<?=$aluno["id"]?>">Excluir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p><a href="index.php">Voltar ao início</a></p>
    </div>

    <script src="js/confirmar-excluir.js"></script>
</body>

</html>