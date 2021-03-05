<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
$email = $_POST['email'];
$senha = DBEscape(strip_tags(trim(sha1($_POST['senha']))));
$user = $_POST['user'];

function validaEmail($email) {
	$conta = "^[a-zA-Z0-9\._-]+@";
	$domino = "[a-zA-Z0-9\._-]+.";
	$extensao = "([a-zA-Z]{2,4})$";
	$pattern = $conta.$domino.$extensao;
	if (ereg($pattern, $email))
	return true;
	else
	return false;
	}

if (!($email) || !($senha) ){
    print "Preencha todos os campos!"; exit();
}
if(!validaEmail($email)){
	print "E-mail invalido"; exit();
}
$dbCheck = DBRead( 'user', "WHERE email = '". $email."'" );
if( $dbCheck ){
	print "^Já utilizaram esse email"; exit();
}
else{
//Abrindo Conexao com o banco de dados
$conexao = mysql_pconnect($hostp,$userp,$passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);

//Utilizando o  mysql_real_escape_string voce se protege o seu código contra SQL Injection.
$email5 = mysql_real_escape_string($email);
$senha = mysql_real_escape_string($senha);
$inisession = date('Y-m-d');
$datec = date('Y-m-d');
$lastlogin = date('Y-m-d H:i:s');
$configurado = '0';
$num1 = rand(15, 50);
$num2 = rand(121235321, 20);
$antispam5 = $num1 * $num2;
$antispam = DBEscape(strip_tags(trim(sha1($antispam5))));
$limite = date('Y-m-d H:i:s', strtotime('+43800 min'));
$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');


	$form2['idcry'] = $antispam;
	$form2['email'] = $email5;
	$form2['password'] = $senha;
	$form2['inisession'] = $inisession;
	$form2['datec'] = $datec;
	$form2['lastlogin'] = $lastlogin;
	$form2['configurado'] = $configurado;
	$form2['ip'] = $ip;
	$form2['expirado'] = $limite;
	$form2['banned'] = '0';
	$form2['admin'] = '0';
	
	if( DBCreate( 'user', $form2 ) ){	
	print "Cadastrado com sucesso!";
	$busca  = "SELECT id FROM netflix_user WHERE email = '".$email."'";
	$identificacao = mysql_query($busca);
	$retorno = mysql_fetch_array($identificacao);
	$iduser = $retorno['id'];
	setcookie("iduser", $iduser);
	setcookie("inisession", $inisession);
	$busca2  = "SELECT idcry FROM netflix_user WHERE email = '".$email."'";
	$identificacao2 = mysql_query($busca2);
	$retorno2 = mysql_fetch_array($identificacao2);
	$idcry = $retorno2['idcry'];
	setcookie("thecry", $idcry, time()+3600 * 24 * 365);
	echo '<script>location.href="dashboard";</script>';
	}
	else{
		echo 'Ocorreu um erro';
	}


}
?>