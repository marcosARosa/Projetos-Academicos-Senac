<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de parceiros</title>
</head>

<body>
    <h3>Completar cadastro de parceiros</h3>
    <form action="inserir-parceiros-dados.php" method="POST">
        <input type="hidden" name="id_parceiro" value="<?=$_GET["parceiro"]?>">
        <input type="number" name="CNPJ" placeholder="CNPJ">
        <input type="email" name="email" placeholder="Email">
        <input type="number" name="telefone" placeholder="Telefone">
        <input type="text" name="endereco" placeholder="Endereço">
        <input type="text" name="cep" placeholder="CEP">
        <input type="text" name="bairro" placeholder="Bairro">
        <input type="number" name="numero" placeholder="Número">
        <input type="text" name="cidade" placeholder="Cidade">
        <input type="text" name="uf" placeholder="UF">
        <input type="password" name="senha" placeholder="Senha">
        <button>Cadastrar</button>
    </form>
</body>

</html>