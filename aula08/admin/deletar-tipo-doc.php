<?php

include_once("../config/conexao.php");

if($_GET){
    
    $id = $_GET["id"];
    $query = "DELETE FROM tbl_tipo_docs WHERE id = $id";
    $deletar = mysqli_query($conexao, $query);
    if($deletar){
        header("location: gestao-tipo-doc.php?msg=sucessodel");
    } else {
        header("location: gestao-tipo-doc.php?msg=errodel");
    }
    } else {
    
    }

?>