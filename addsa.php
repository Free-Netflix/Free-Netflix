<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
$nome = $_POST['names'];
$tipo = $_POST['tipo'];
$capa = $_POST['capa'];
$fotoback = $_POST['background'];
$descrt = $_POST['descrpt'];
$logo = $_POST['logo'];

$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");

if($user){
$user = $user[0];
}else{
echo '<script>location.href="dashboard";</script>';	
}
if($user['admin'] == 0){
 echo '';
}
else{

if (!($nome) || !($tipo) || !($fotoback)|| !($capa) || !($descrt) || !($logo) ){
    print "Preencha todos os campos!"; exit();
}


else{
//Abrindo Conexao com o banco de dados
$conexao = mysql_pconnect($hostp,$userp,$passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);

//Utilizando o  mysql_real_escape_string voce se protege o seu código contra SQL Injection.
$nomeb = mysql_real_escape_string($nome);
$tipob = mysql_real_escape_string($tipo);
$descrtb = mysql_real_escape_string($descrt);
$fotob = mysql_real_escape_string($capa);
$fotobackb = mysql_real_escape_string($fotoback);
$logob = mysql_real_escape_string($logo);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
$form2['tipo'] = $tipob;
	$form2['name'] = $nomeb;
	$form2['desct'] = $descrtb;
	$form2['foto'] = $fotob;
	$form2['fotoback'] = $fotobackb;
	$form2['logo'] = $logob;
	$form2['views'] = '0';
	$form2['gen1'] = '0';
	$form2['gen2'] = '0';
	$form2['gen3'] = '0';
	if( DBCreate( 'series', $form2 ) ){	
	print "Adicionado com sucesso";
    echo '<script>location.href="admin.php?action=filme";</script>';
	}
	else{
		 print "Ocorreu um erro!";
	}
}
}
?>