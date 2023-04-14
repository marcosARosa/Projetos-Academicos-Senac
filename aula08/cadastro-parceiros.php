<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de parceiros</title>
</head>

<body>
    <h3>Cadastro de parceiros</h3>
    <form action="inserir-parceiros.php" method="POST">
        <input type="text" name="razao_social" placeholder="Razão Social">
        <input type="text" name="nome_fantasia" placeholder="Nome fantasia">
        <input type="number" name="inscricao_estadual" placeholder="Inscrição Estadual">
        <input type="number" name="inscricao_municipal" placeholder="Inscrição Municipal">
        <button>Cadastrar</button>
    </form>
</body>

</html>