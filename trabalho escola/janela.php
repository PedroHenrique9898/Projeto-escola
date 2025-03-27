<?php

// Conectar com o Banco de Dados:
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db('escola');

if (isset($_POST['conectar']))
{
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "select login, senha from usuario 
    where login = '$login' and senha = '$senha'";

    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) <= 0 )
{
   echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');
        window.location.href='loginusuario.php';
        </script>";
    }
    else
    {
        setcookie('login',$login);
        header('Location:menu.html');
    }
}

?>


<HTML>
<HEAD>
 <TITLE>LOGIN</TITLE>
</HEAD>
<BODY>
<h2>Login Usu�rio </h2>
<form  name="formulario"  method="POST" action="loginusuario.php">
Login: <input type="text" name="login" id="login" size=10>
<br><br>
Senha: <input type="password" name="senha" id="senha" size=10>
<br><br>
<input type="submit" name="conectar" value="conectar">
</form>
</BODY>
</HTML>

