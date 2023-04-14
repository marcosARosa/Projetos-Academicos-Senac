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
    $senha = $_POST["senha"];
    $salt = md5($email.$senha);
    $custo = "06";
    $senha_segura = crypt($senha, '$2b$'. $custo .'$'. $salt .'$');


    $queryConsultaToken = "SELECT * FROM tbl_parceiros WHERE `hash` = '$token_parceiro'";
    $resultado = mysqli_query($conexao, $queryConsultaToken);
    $dadoParceiros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    $id = $dadoParceiros[0]["id"];

    $queryDocs = "INSERT INTO tbl_docs(hash_usuario, documento, id_tipo_documento) VALUES ('$id', '$cnpj', 3)";
    $inserirDocs = mysqli_query($conexao, $queryDocs);

    if($inserirDocs) {
        $queryEmail = "INSERT INTO tbl_contatos_emails(hash_usuario, email) VALUES ('$id', '$email')";
        $inserirEmail = mysqli_query($conexao, $queryEmail);

        if($inserirEmail) {
            $queryTel = "INSERT INTO tbl_contatos(hash_usuario, numero, id_situacao) VALUES ('$id', '$numero', 1)";
            $inserirTel = mysqli_query($conexao, $queryTel);

            if($inserirTel) {
                $queryEndereco = "INSERT INTO tbl_enderecos(hash_usuario, endereco, cep, bairro, numero, cidade, uf) VALUES ('$id','$endereco', '$cep', '$bairro', '$numero', '$cidade', '$uf')";
                $inserirEndereco = mysqli_query($conexao, $queryEndereco);

                if($inserirEndereco) {
                    $queryAcesso = "INSERT INTO tbl_acessos(hash_usuario, usuario, senha, id_situacao, `hash`) VALUES ('$id', '$email', '$senha_segura', 1, '$token_parceiro')";
                    $inserirAcesso = mysqli_query($conexao, $queryAcesso);
                } else {
                    header("location: index.php");
                }
            } else {
                header("location: completar-parceiros.php?parceiro=".$token_parceiro);
            }
        } else {
            header("location: completar-parceiros.php?parceiro=".$token_parceiro);
        }
    } else {
        header("location: cadastro-parceiros.php");
    }
}
?>
