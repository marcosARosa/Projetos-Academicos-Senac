<?php

include_once("../config/conexao.php");

$situacao = $_POST["situacao"];

$query = "INSERT INTO tbl_situacao(situacao) VALUE ('$situacao')";

$inserir_situcao = mysqli_query($conexao, $query);

if($inserir_situcao){
    header("location: gestao-situacao.php?msg=sucessocad");
} else {
    header("location: gestao-situacao.php?msg=errocad");
}



?>