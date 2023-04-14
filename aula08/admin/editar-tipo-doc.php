<?php

include_once("../config/conexao.php");

if($_POST){
    $id = $_POST["id"];
    $doc = $_POST["tipo_doc"];

    $query = "UPDATE tbl_tipo_docs SET tipo_doc='$doc' WHERE id = '$id'";

    $gravar = mysqli_query($conexao, $query);

    if($gravar) {
        header('location: gestao-tipo-doc.php');
    } else {

    }
} else {
    header('location: gestao-tipo-doc.php');
}



?>