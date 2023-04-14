<?php

include_once("config/conexao.php");

if($_POST){

    $razao_social = $_POST["razao_social"];
    $nome_fantasia = $_POST["nome_fantasia"];
    $insc_estadual = $_POST["inscricao_estadual"];
    $insc_municipal = $_POST["inscricao_municipal"];

    $token_parceiro = sha1(md5(date('d/m/Y').$razao_social.$nome_fantasia));

    $query = "INSERT INTO tbl_parceiros(razao_social, nome_fantasia, ie, im, id_situacao, `hash`) VALUES ('$razao_social', '$nome_fantasia', '$insc_estadual', '$insc_municipal', 1, '$token_parceiro')";

    $inserir = mysqli_query($conexao, $query);

    if($inserir) {
        header('location: completar-parceiros.php?parceiro='.$token_parceiro);
    } else{
        header('location: completar-parceiros.php');
    }

} else {
    header('location: completar-parceiros.php');
}


?>