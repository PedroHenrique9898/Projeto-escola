<?php
// Conectar com o Banco de Dados:
$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db('escola');

if (isset($_POST['Gravar'])) {
    $cod_coordenador = $_POST['cod_coordenador'];
    $nome = $_POST['nome'];

    $sql = "insert into coordenador (cod_coordenador, nome)
            values ('$cod_coordenador','$nome')";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "<p class='success'>Dados gravados com sucesso!</p>";
    } else {
        echo "<p class='error'>Erro. - Motivo: Falha ao gravar os dados.</p>";
    }
}

//------------------------------------------------------------------------------------------

if (isset($_POST['Alterar'])) {
    $cod_coordenador = $_POST['cod_coordenador'];
    $nome = $_POST['nome'];

    $sql = "update coordenador set nome = '$nome'
            where cod_coordenador = '$cod_coordenador'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "<p class='success'>Dados alterados com sucesso!</p>";
    } else {
        echo "<p class='error'>Erro. - Motivo: Falha ao alterar os dados.</p>";
    }
}

//------------------------------------------------------------------------------------------

if (isset($_POST['Excluir'])) {
    $cod_coordenador = $_POST['cod_coordenador'];
    $nome = $_POST['nome'];

    $sql = "delete from coordenador where cod_coordenador = '$cod_coordenador'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE) {
        echo "<p class='success'>Dados excluídos com sucesso!</p>";
    } else {
        echo "<p class='error'>Erro. - Motivo: Falha ao excluir os dados.</p>";
    }
}

//------------------------------------------------------------------------------------------

if (isset($_POST['Pesquisar'])) {
    $sql = "select * from coordenador";

    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) == 0) {
        echo "<p class='error'>Erro. - Motivo: Dados não encontrados.</p>";
    } else {
        echo "<b>Pesquisa de Coordenadores:</b><br>";
        while ($dados = mysql_fetch_array($resultado)) {
            echo "<div class='result'>
                    <p><strong>Código:</strong> " . $dados['cod_coordenador'] . "</p>
                    <p><strong>Nome:</strong> " . $dados['nome'] . "</p>
                  </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Coordenador</title>
    <link rel="stylesheet" href="styles.css"> <!-- Vinculando o CSS externo -->
</head>
<body>

    <div class="form-container">
        <h2>Formulário de Cadastro de Coordenadores</h2>
        <form name="formulario" method="POST" action="cadastro_coordenador.php">
            <div>
                <label for="cod_coordenador">Código do Coordenador:</label>
                <input type="text" name="cod_coordenador" id="cod_coordenador" size="5">
            </div>
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" size="50">
            </div>
            <div class="form-buttons">
                <input type="submit" name="Excluir" value="Excluir">
                <input type="submit" name="Alterar" value="Alterar">
                <input type="submit" name="Pesquisar" value="Pesquisar">
                <input type="submit" name="Gravar" value="Gravar">
            </div>
        </form>
    </div>

</body>
</html>
