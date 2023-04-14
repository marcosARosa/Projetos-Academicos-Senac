<?php

include_once("../config/conexao.php");

$genero = $_POST["genero"];

$query = "INSERT INTO tbl_generos(genero) VALUE ('$genero')";

$inserir_genero = mysqli_query($conexao,$query);

if($inserir_genero){
    header("location: gestao-genero.php?msg=sucessocad");
} else {
    header("location: gestao-genero.php?msg=errocad");
}
?>