<?php include_once("../config/conexao.php");   ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tito's Market - Gestão de categoria</title>
</head>

<body>
    <h4>Gestão de Categorias</h4>
    <table border>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Visibilidade</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            <?php
$queryConsultaCat = "SELECT * FROM tbl_categorias";
$consulta = mysqli_query($conexao, $queryConsultaCat);
$resultado = mysqli_fetch_all($consulta, MYSQLI_ASSOC);

foreach($resultado as $categoria){
 echo"<tr>
 <td>".$categoria["nome"]."</td>
 <td>".$categoria["visibilidade"]."</td>
 <td>".$categoria["id_situacao"]."</td>
        <td>
        <a href='?acao=editar&id=".$categoria["id"]."'>Editar</a>
        <a href='deletar-categoria.php?id=".$categoria["id"]."'>Deletar</a>
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
        echo"<p>Categoria cadastrada com sucesso!</p>"; 
    } if ($_GET["msg"] == "errocad"){
        echo"<p>Erro ao cadastrar categoria!</p>";
    }if($_GET["msg"] == "sucessodel"){
        echo"<p>Categoria delatada com sucesso!</p>";
    }if($_GET["msg"] == "errodel") {
        echo"<p>Erro ao deletar categoria!</p>";
    }
}

?>

    <?php
    if(isset($_GET["acao"])){
        if($_GET["acao"] =="editar"){
            $queryConsultarCategoria = "SELECT * FROM tbl_categorias WHERE id = ".$_GET["id"];
            $consultarCategoria = mysqli_query($conexao, $queryConsultarCategoria);
            $resultado = mysqli_fetch_all($consultarCategoria, MYSQLI_ASSOC);
            foreach($resultado as $categoria){
                echo'<h4>Editar categoria</h4>
            <form action="editar-categoria.php" method="POST">
                <input type="hidden" name="id" value="'.$categoria["id"].'">
                <input type="text" name="nome-categoria" value="'.$categoria["nome"].'">
                <input type="text" name="img-categoria" value="'.$categoria["img"].'">
                <input type="text" name="slug-categoria" value="'.$categoria["slug"].'">
                <button>Salvar</button>
                <button><a href="gestao-categoria.php">Cancelar</a></button>
                
            </form>'; 
            }    
        }
    } else {
        echo '<h4>Cadastro de categoria</h4>
        <form action="inserir-categoria.php" method="POST">
            <input type="text" name="nome-categoria">
            <input type="text" name="img-categoria">
            <input type="text" name="slug-categoria">
            <button>Gravar</button>
            <button><a href="index.php">Voltar</a></button>
        </form>';
    }
    ?>
</body>

</html>