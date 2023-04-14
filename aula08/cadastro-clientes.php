<?php include_once("config/conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes</title>
</head>

<body>
    <h3>Cadastro de clientes</h3>
    <form action="inserir-clientes.php" method="POST">
        <input type="text" name="nome" placeholder="Digite seu nome">
        <input type="text" name="sobrenome" placeholder="Digite seu sobrenome">
        <input type="date" name="data-nasc" placeholder="Digite sua data de nascimento">
        <select name="genero">
            <?php 
        $query ="SELECT * FROM tbl_generos";
        $consulta_genero = mysqli_query($conexao, $query);
        $result = mysqli_fetch_all($consulta_genero, MYSQLI_ASSOC);
        
        foreach($result as $genero){

        ?>
            <option value="<?=$genero["id"]?>">
                <?=$genero["genero"]?>
            </option>
            <?php
        }
        ?>
        </select>
        <input type="checkbox" name="newsletter">
        Aceita receber nossas promoções por email?
        <button>Cadastrar</button>
    </form>
</body>

</html>