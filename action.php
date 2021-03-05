<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?>
<?php
include('db.php');
$check = mysql_query("SELECT * FROM neko_post order by id desc");
if(isset($_POST['content']))
{
$content=mysql_real_escape_string($_POST['content']);
$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$num1 = rand(15, 50);
$num2 = rand(121235321, 20);
$antispam5 = $num1 * $num2;
$antispam = DBEscape(strip_tags(trim(sha1($antispam5))));
$time = date('Y-m-d H:i:s');
$tipo = 1;
$idperfil = DBEscape( strip_tags(trim($_COOKIE['usuario']) ) );
$idvideo=mysql_real_escape_string($_POST['ids']);


mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query("insert into netflix_comment(texto,iduser,idprofile,episodio) values ('$content','$iduser','$idperfil','$idvideo')");
$fetch= mysql_query("SELECT texto FROM netflix_comment order by id desc");
$row=mysql_fetch_array($fetch);
}
 $idperfil2 = DBEscape( strip_tags(trim($_COOKIE['usuario']) ) );
    $user = DBRead('people', "WHERE id = '{$idperfil2}' LIMIT 1 ");
	$user = $user[0];
?>

<div class="comentario1">

<div class="people<?php echo $user['foto']; ?> avatar"></div>
<p class="peoplep"><?php echo $user['nome']; ?> - Comentou</p>
<div style="width: 100%; height: 0.1vw; background: #000; position: absolute; top: 4.4vw;"></div>
<p class="todos"><?php echo $row['texto']; ?></p>

</div>