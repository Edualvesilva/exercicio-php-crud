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
}; // fim lerAlunos

function lerUmAluno(PDO $conexao,int $idAluno):array{
    $sql = "SELECT * FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id",$idAluno,PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro ao Selecionar: ".$erro->getMessage());
    }

    return $resultado;
}; // Fim lerUmAluno

function atualizarAluno(PDO $conexao,string $nome,float $primeira,float $segunda,int $idAluno):void{
    $sql = "UPDATE alunos SET nome=:nome,primeira = :primeira,segunda = :segunda WHERE id = :id";
    try {
        
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome",$nome,PDO::PARAM_STR);
        $consulta->bindValue(":primeira",$primeira,PDO::PARAM_STR);
        $consulta->bindValue(":segunda",$segunda,PDO::PARAM_STR);
        $consulta->bindValue(":id",$idAluno,PDO::PARAM_INT);

        $consulta->execute();

    } catch (Exception $erro) {
        die("Erro ao Atualizar: ".$erro->getMessage());
    }
} // Fim atualizarAluno

function ApagarAluno(PDO $conexao,$idAluno):void{
    $sql = "DELETE FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id",$idAluno,PDO::PARAM_INT);
        $consulta->execute();

    } catch (Exception $erro) {
        die("Erro ao Apagar: ".$erro->getMessage());
    }
}