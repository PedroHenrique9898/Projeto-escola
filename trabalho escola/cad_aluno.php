<?php

// fazer conexão com o banco
$conectar = mysql_connect("localhost","root","");
$banco = mysql_select_db("escola");

// if para a opção dos botões
if(isset($_POST['Gravar'])){

    // capturar as variáveis inseridas no HTML
    $cod_aluno = $_POST['cod_aluno'];
    $nome      = $_POST['nome'];
    $telefone  = $_POST['telefone'];
    $cod_curso = $_POST['cod_curso'];

    // variável que guarda o comando SQL pro BD
    $sql = "insert into aluno (cod_aluno, nome, telefone, cod_curso) 
            values ('$cod_aluno','$nome','$telefone','$cod_curso')";

    // mandar executar comando SQL
    $resultado = mysql_query($sql);

    // analisar resultado
    if ($resultado == TRUE){
        echo("Dados gravados com sucesso.");
    }
    else{
        echo("Erro. Tente novamente.");
    }

}

if(isset($_POST['Alterar'])){
    $cod_aluno = $_POST['cod_aluno'];
    $nome      = $_POST['nome'];
    $telefone  = $_POST['telefone'];
    $cod_curso = $_POST['cod_curso'];

    $sql = "update aluno set nome = '$nome', telefone = '$telefone', cod_curso = '$cod_curso' where cod_aluno = '$cod_aluno'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo("Dados alterados com sucesso!");
    }
    else{
        echo("Erro. Tente novamente.");
    }
}

if(isset($_POST['Excluir'])){
    $cod_aluno = $_POST['cod_aluno'];
    $nome      = $_POST['nome'];
    $telefone  = $_POST['telefone'];
    $cod_curso = $_POST['cod_curso'];

    $sql = "delete from aluno where cod_curso = '$cod_aluno'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo("Dados excluídos com sucesso!");
    }
    else{
        echo("Erro. Tente novamente.");
    }
}

if(isset($_POST['Pesquisar'])){
    $cod_aluno = $_POST['cod_aluno'];
    $nome      = $_POST['nome'];
    $telefone  = $_POST['telefone'];
    $cod_curso = $_POST['cod_curso'];

    $sql = "select * from aluno";

    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) == 0){
        echo "Erro. Tente novamente";
    }
    else{
        echo "<b>"."Pesquisa de Curso: "."</b><br>";
        
        while ($dados = mysql_fetch_array($resultado)){
                echo "Código: " . $dados['cod_aluno'] . "<br>" . "Nome: ".$dados['nome'] . "<br>" . "Telefone: ".$dados['telefone'] ."<br>" . "Cod. Curso: ".$dados['cod_curso'] ."<br>";
            }
    }
}

?>