<?php

function AdicionarAluno(PDO $conexao,string $nomeAluno,float $primeira,float $segunda):void{
    $sql = "INSERT INTO alunos(nome,primeira,segunda) VALUES (:nome,:primeira,:segunda)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome",$nomeAluno,PDO::PARAM_STR);
        $consulta->bindValue(":primeira",$primeira,PDO::PARAM_STR);
        $consulta->bindvalue(":segunda",$segunda,PDO::PARAM_STR);
        $consulta->execute();

    } catch (Exception $erro) {
        die("Erro ao Inserir: ".$erro->getMessage());
    }
}; // Fim AdicionarAluno

function lerAlunos(PDO $conexao):array{
    $sql = "SELECT * FROM alunos ";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro ao ler alunos: ".$erro->getMessage());
    }
    return $resultado;
}
