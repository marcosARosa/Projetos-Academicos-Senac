<?php include_once("../config/conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tito's Market - Cadastro de tipo de documento</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body>
    <h4>Gestão de tipo de documento</h4>
    <table border>
        <thead>
            <tr>
                <th>Tipo de documento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $queryConsultaDoc = "SELECT * FROM tbl_tipo_docs";
            $consulta = mysqli_query($conexao, $queryConsultaDoc);
            $resultado = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
            
            foreach($resultado as $docs) {
              echo"<tr> 
              <td>".$docs["tipo_doc"]."</td>
              <td>
              <a href='?acao=editar&id=".$docs["id"]."'>Editar</a>
              <a href='deletar-tipo-doc.php?id=".$docs["id"]."'>Deletar</a>
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
        echo"<p>Documento cadastrado com sucesso!</p>"; 
    } if ($_GET["msg"] == "errocad"){
        echo"<p>Erro ao cadastrar documento!</p>";
    }if($_GET["msg"] == "sucessodel"){
        echo"<p>Documento deletado com sucesso!</p>";
    }if($_GET["msg"] == "errodel") {
        echo"<p>Erro ao deletar documento!</p>";
    }
}

?>


    <?php
if(isset($_GET["acao"])){
    if($_GET["acao"] == "editar"){
        $queryConsultaDocumento = "SELECT * FROM tbl_tipo_docs WHERE id = ".$_GET["id"];
        $consultaDocumento = mysqli_query($conexao, $queryConsultaDocumento);
        $resultado = mysqli_fetch_all($consultaDocumento, MYSQLI_ASSOC);
        foreach($resultado as $docs){
            echo'<h4>Editar tipo documento</h4>
            <form action="editar-tipo-doc.php" method="POST">
            <input type="hidden" name="id" value="'.$docs["id"].'">
            <input type="text" name="tipo_doc" value="'.$docs["tipo_doc"].'">
            <button>Salvar</button>
            <button><a href="gestao-tipo-doc.php">Cancelar</a></button>
        </form>';

        } 
    }
} else {

    echo '<h4>Cadastro de tipo de documento</h4>
    <form action="inserir-tipo-doc.php" method="POST">
        <input type="text" name="tipo_doc">
        <button>Gravar</button>
        <button><a href="index.php">Voltar</a></button>
    </form>';
}

?>
    </form>
</body>

</html>