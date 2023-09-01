<?php
require_once "conecta.php";
require_once "funcoes.php";

if(isset($_POST["cadastrar"])){

	$nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
	$primeira = filter_input(INPUT_POST,"primeira",FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
	$segunda = filter_input(INPUT_POST,"segunda",FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
	AdicionarAluno($conexao,$nome,$primeira,$segunda);
	header("location:visualizar.php");
};



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="#" method="post">
	    <p><label for="nome">Nome:</label>
	    <input type="text" id="nome" name="nome"></p>
        
      <p><label for="primeira">Primeira nota:</label>
	    <input type="number" id="primeira" name="primeira" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input type="number" name="segunda" id="segunda" step="0.01" min="0.00" max="10.00" required></p>
	    
      <button name="cadastrar" type="submit">Cadastrar aluno</button>
	</form>

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>