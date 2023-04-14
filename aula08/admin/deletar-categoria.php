<?php

include_once("../config/conexao.php");

if($_GET){
    
$id = $_GET["id"];
$query = "DELETE FROM tbl_categorias WHERE id = $id";
$deletar = mysqli_query($conexao, $query);
if($deletar){
    header("location: gestao-categoria.php?msg=sucessodel");
} else {
    header("location: gestao-categoria.php?msg=errodel");
}
} else {

}
?>