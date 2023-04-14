<?php

include_once("../config/conexao.php");

$documento = $_POST["tipo_doc"];

$query = "INSERT INTO tbl_tipo_docs(tipo_doc) VALUE('$documento')";

$inserir_doc = mysqli_query($conexao,$query);

if($inserir_doc){
    header("location: gestao-tipo-doc.php?msg=sucessocad");
} else {
    header("location: gestao-tipo-doc.php?msg=sucessocad");
}




?>