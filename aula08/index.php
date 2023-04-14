<?php include_once("config/conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tito's Market</title>
</head>

<body>

    <header>
        <nav>
            <a href="#">Home</a>
            <a href="#">Minha conta</a>
            <a href="#">Carrinho</a>
        </nav>

    </header>

    <main>

        <div id="categorias">
            <?php include_once("includes/vitrine-categorias.php")?>
            <!--CATEGORIAS-->
        </div>

        <div id="top-categorias">

            <!--TOP-CATEGORIAS-->
        </div>

        <div id="banner">

            <!--BANNER-->
        </div>

        <div id="top-mercados">

            <!--MERCADOS PEDIDOS USUÁRIO-->
        </div>

        <h3>Mercados</h3>
        <div id="mercados">


        </div>

    </main>

</body>

</html>