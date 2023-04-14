<?php

include_once("../config/conexao.php");

if($_POST) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $query = "SELECT * FROM tbl_acessos_adm WHERE usuario = '$usuario' AND senha = '$senha'";
    $consultarDados = mysqli_query($conexao, $query);
    $resultado = mysqli_fetch_all($consultarDados, MYSQLI_ASSOC);

    if($resultado){
        session_start();
        $_SESSION["ID_USUARIO"] = $resultado[0]["id_adm"];
        $_SESSION["ID_USUARIO"] = $resultado[0]["usuario"];
        $_SESSION["ID_USUARIO"] = $resultado[0]["id_situacao"];

        $queryAdm = "SELECT * FROM tbl_cadastro_adm WHERE id_adm = '".$_SESSION["ID_USUARIO"]."'";
        $consultarAdm = mysqli_query($conexao, $queryAdm);
        $resultadoAdm = mysqli_fetch_all($consultarAdm, MYSQLI_ASSOC);

        $_SESSION["NOME_USUARIO"] = $resultadoAdm[0]["nome"];
        $_SESSION["SOBRENOME_USUARIO"] = $resultadoAdm[0]["sobrenome"];

        header("location: minha-conta-adm.php");
    } else {
        echo "Usuário e/ou senha inválidos";
    }

}else {
    header("location: login-adm.php");
}





?>