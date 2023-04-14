<?php

include_once("config/conexao.php");

if($_POST) {

    $token_parceiro = $_POST["id_parceiro"];
    $cnpj = $_POST["CNPJ"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];

?>
