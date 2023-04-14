<?php include_once("../config/conexao.php");  ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tito's Market - Cadastro Gênero</title>
</head>

<h4>Gestão de Gênero</h4>
    <table border>
        <thead>
            <tr>
                <th>Gênero</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $queryConsultaGen = "SELECT * FROM tbl_generos";
                $consulta = mysqli_query($conexao, $queryConsultaGen);
                $resultado = mysqli_fetch_all($consulta, MYSQLI_ASSOC);

                foreach($resultado as $genero) {
                    echo"<tr>
                        <td>".$genero["genero"]."</td>
                        <td>
                        <a href='?acao=editar&id=".$genero["id"]."'>Editar</a>
                        <a href='deletar-genero.php?id=".$genero["id"]."'>Deletar</a>
                        </td>                    
                    </tr>";

                }
            ?>
        </tbody>
    </table>
    <?php
    if(isset($_GET["msg"])){
    //verifica de qual tipo é a msg
    if($_GET["msg"] == "sucessocad"){
        echo"<p>Gênero cadastrado com sucesso!</p>"; 
    } if ($_GET["msg"] == "errocad"){
        echo"<p>Erro ao cadastrar gênero!</p>";
    }if($_GET["msg"] == "sucessodel"){
        echo"<p>Gênero deletado com sucesso!</p>";
    }if($_GET["msg"] == "errodel") {
        echo"<p>Erro ao deletar gênero!</p>";
    }
}

?>
    <?php
if(isset($_GET["acao"])){
    if($_GET["acao"] == "editar"){
        $queryConsultarGenero = "SELECT * FROM tbl_generos WHERE id = ".$_GET["id"];
        $consultarGenero = mysqli_query($conexao, $queryConsultarGenero);
        $resultado = mysqli_fetch_all($consultarGenero, MYSQLI_ASSOC);
        foreach($resultado as $genero){
            echo'<h4>Editar gênero</h4>
            <form action="editar-genero.php" method="POST">
            <input type="hidden" name="id" value="'.$genero["id"].'">
            <input type="text" name="genero" value="'.$genero["genero"].'">
            <button>Salvar</button>
            <button><a href="gestao-genero.php">Cancelar</a></button>
        </form>';
        }
    }
} else {
    echo '<h4>Cadastro de gênero</h4>
    <form action="inserir-genero.php" method="POST">
        <input type="text" name="genero">
        <button>Gravar</button>
        <button><a href="index.php">Voltar</a></button>
    </form>';
}


?>
    </form>
<body>

    </form>
</body>

</html>