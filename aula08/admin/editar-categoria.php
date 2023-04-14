<?php
include_once("../config/conexao.php");

if($_POST){
$id = $_POST["id"];
$nome = $_POST["nome-categoria"];
$img = $_POST["img-categoria"];
$slug = $_POST["slug-categoria"];

$query = "UPDATE tbl_categorias SET nome = '$nome', img = '$img', slug = '$slug' WHERE id = $id";

$gravar = mysqli_query($conexao, $query);

    if($gravar){
    header('location: gestao-categoria.php');
    } else {

   }   

 }else{
    header('location: gestao-categoria.php');
}


?>