<?php
function ContarMedia(int $primeira,int $segunda):float{
    $media = ($primeira + $segunda) / 2;
    return $media;
};

function situacao(float $media):string{
    if($media <= 5){
        $situacao = "Reprovado";
    } elseif($media <= 7){
        $situacao = "Recuperação";
    } else{
       $situacao = "Aprovado";
    }
    return $situacao;
};

function formatarNota(float $nota):string{
    $notaFormada = number_format($nota,2,",",".");
    return $notaFormada;
};