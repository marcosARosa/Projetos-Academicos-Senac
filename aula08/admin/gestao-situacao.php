<?php include_once("../config/conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tito's Market - Cadastro Siatuação</title>
</head>

<body>
    <h4>Gestão de Situação</h4>
    <table border>
        <thead>
            <tr>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $queryConsultaSit = "SELECT * FROM tbl_situacao";
                $consulta = mysqli_query($conexao, $queryConsultaSit);
                $resultado = mysqli_fetch_all($consulta, MYSQLI_ASSOC);

                foreach($resultado as $situacao) {
                    echo"<tr>
                        <td>".$situacao["situacao"]."</td>
                        <td>
                        <a href='?acao=editar&id=".$situacao["id"]."'>Editar</a>
                        <a href='deletar-situacao.php?id=".$situacao["id"]."'>Deletar</a>
                        </td>                    
                    </tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
    // verifica se na url existe o parametro msg
if(isset($_GET["msg"])){
    //verifica de qual tipo é a msg
    if($_GET["msg"] == "sucessocad"){
        echo"<p>Situação cadastrada com sucesso!</p>"; 
    } if ($_GET["msg"] == "errocad"){
        echo"<p>Erro ao cadastrar situação!</p>";
    }if($_GET["msg"] == "sucessodel"){
        echo"<p>Situação deletada com sucesso!</p>";
    }if($_GET["msg"] == "errodel") {
        echo"<p>Erro ao deletar situação!</p>";
    }
}

?>
    <?php
if(isset($_GET["acao"])){
    if($_GET["acao"] == "editar"){
        $queryConsultarSituacao = "SELECT * FROM tbl_situacao WHERE id = ".$_GET["id"];
        $consultarSituacao = mysqli_query($conexao, $queryConsultarSituacao);
        $resultado = mysqli_fetch_all($consultarSituacao, MYSQLI_ASSOC);
        foreach($resultado as $situacao){
            echo'<h4>Editar situação</h4>
            <form action="editar-situacao.php" method="POST">
            <input type="hidden" name="id" value="'.$situacao["id"].'">
            <input type="text" name="situacao" value="'.$situacao["situacao"].'">
            <button>Salvar</button>
            <button><a href="gestao-situacao.php">Cancelar</a></button>
        </form>';
        }
    }
} else {
    echo '<h4>Cadastro de situação</h4>
    <form action="inserir-situacao.php" method="POST">
        <input type="text" name="situacao">
        <button>Gravar</button>
        <button><a href="index.php">Voltar</a></button>
    </form>';
}


?>

</body>

</html>