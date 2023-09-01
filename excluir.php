<?php
require_once "conecta.php";
require_once "funcoes.php";
$idAluno = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);

ApagarAluno($conexao,$idAluno);
header("location:visualizar.php");