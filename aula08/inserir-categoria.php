<?php

include_once("config/conexao.php");

$nome_categoria = $_POST["nome-categoria"];
$img_categoria = $_POST["img-categoria"];
$slug_categoria = $_POST["slug-categoria"];

$query= "INSERT INTO tbl_categorias(nome, img, slug, id_situacao) VALUES ('$nome_categoria', '$img_categoria', '$slug_categoria', 1)";

$inserir_categoria = mysqli_query($conexao, $query);

if($inserir_categoria) {
    echo "Cadastro realizado com sucesso, <a href='cadastra-categoria.php'> Voltar </a>";
} else {
    echo "Erro ao cadastrar categoria, <a href='cadastra-categoria.php'> Voltar </a>";
}
?>