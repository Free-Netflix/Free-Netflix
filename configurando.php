<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
$nome = $_POST['name'];

if (!($nome) ){
    print "Preencha todos os campos!"; exit();
}
else{
//Abrindo Conexao com o banco de dados
$conexao = mysql_pconnect($hostp, $userp, $passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);

//Utilizando o  mysql_real_escape_string voce se protege o seu código contra SQL Injection.
$email5 = mysql_real_escape_string($email);
$senha = mysql_real_escape_string($senha);
$inisession = date('Y-m-d H:i:s');
$datec = date('Y-m-d H:i:s');
$lastlogin = date('Y-m-d H:i:s');
$configurado = '0';
$num1 = rand(15, 50);
$num2 = rand(121235321, 20);
$antispam5 = $num1 * $num2;
$antispam = DBEscape(strip_tags(trim(sha1($antispam5))));
require 'db.php';
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$totaldeperfil5 = mysql_query("SELECT * FROM netflix_profiles WHERE iduser = $iduser ");
$totaldeperfil = mysql_num_rows($totaldeperfil5);
if($totaldeperfil == 0){
    $foto = 1;
}
else if($totaldeperfil == 1){
    $foto = 2;
}
else if($totaldeperfil == 2){
    $foto = 3;
}
else if($totaldeperfil == 3){
    $foto = 4;
}
else if($totaldeperfil == 4){
    $foto = 5;
}
else{
    $foto = 1;
}
$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );

	$form2['nome'] = $nome;
	$form2['idcry'] = "0";
	$form2['datec'] = $datec;
	$form2['iduser'] = $iduser;
  $form2['foto'] = $foto;
	if( DBCreate( 'profiles', $form2 ) ){	
	$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
    $userUP['configurado'] = 1;
    if( DBUpdate( 'user', $userUP, "id = '{$iduser}'" ) ){
        echo '';
    } 
	print "Perfil criado com sucesso";
    echo '<script>location.href="dashboard";</script>';
    echo '<script> $("#postadd").fadeOut(1200);</script>';
	}
	else{
		echo 'Ocorreu um erro';
	}

}
?>