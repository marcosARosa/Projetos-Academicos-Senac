<?php

include_once("../config/conexao.php");

if($_POST){
    $id = $_POST["id"];
    $situacao = $_POST["situacao"];

    $query = "UPDATE tbl_situacao SET situacao='$situacao' WHERE id = '$id'";

    $gravar = mysqli_query($conexao, $query);

    if($gravar) {
        header('location: gestao-situacao.php');
    } else {

    }
} else {
    header('location: gestao-situacao.php');
}



?>