<?php

include_once("config/conexao.php");

if($_POST){

    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $data_nasc = $_POST["data-nasc"];
    $genero = $_POST["genero"];
    $noticia = $_POST["newsletter"];
    $assina_boletim = 0;

    if($noticia){
        $assina_boletim = 1;
    }
    //CRIAÇÃO DA HASH
    $token_cliente = sha1(md5(date('d/m/Y').$nome.$sobrenome));

    $query="INSERT INTO tbl_clientes(nome, sobrenome, data_nasc, id_genero, newsletter, id_situacao, `hash`) VALUES('$nome', '$sobrenome', '$data_nasc', '$genero', '$assina_boletim', 1, '$token_cliente')";
 
    $inserir = mysqli_query($conexao, $query);
   
    if($inserir){
        //$id_client = mysqli_insert_id($conexao); FOI ADICIONADO O "TOKEN" PARA O ID NÃO IR NA URL DO SISTEMA

        header("location: completar-cadastro.php?client=".$token_cliente);
    } else {
        header("location: cadastro-clientes.php");
    }
} else {
    header("location: cadastro-clientes.php");
}


?>