<?php

include_once("../config/conexao.php");

$query = "SELECT nome, slug, img FROM tbl_categorias";
$query2 = "SELECT id, nome, descricao, preco, id_categoria FROM tbl_lista_produtos";

$resultado = mysqli_query($conexao, $query);

$dados_categorias = mysqli_fetch_all ($resultado, MYSQLI_ASSOC);

foreach($dados_categorias as $categoria){

    $myFile = fopen($categoria["slug"].".html", "w");

    $txt = "<h2>Seja bem-vindo</h2>".$categoria["nome"];

    fwrite($myFile, $txt);

    fclose($myFile);


    echo "<h4>" .$categoria["nome"]."</h4>";
    echo "<img src='".$categoria["img"]."'>";
}





?>