<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
$nome = $_POST['name'];
$sobname = $_POST['sobname'];
$username = $_POST['username'];

//Abrindo Conexao com o banco de dados
$conexao = mysql_pconnect($hostp, $userp, $passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);

//Utilizando o  mysql_real_escape_string voce se protege o seu código contra SQL Injection.

$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );


if (!($nome) || !($sobname) || !($username) ){
    echo '<p>Preencha todos os campos</p>';
}
else{
	$userUP['nome'] = $nome;
	$userUP['sobname'] = $sobname;
	$userUP['username'] = $username;
    if( DBUpdate( 'user', $userUP, "id = '{$iduser}'" ) ){
        echo 'Sucesso';
        echo '<script>location.href="/";</script>';
    }
	else{
		echo 'Ocorreu um erro';
    }
}
?>