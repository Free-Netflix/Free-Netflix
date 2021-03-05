<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
if(isset($_GET['timer'])){
$progress = $_GET['timer'];
$profile = $_GET['profile'];
$videoid = $_GET['video'];

$currenttime = $_GET['currenttime'];
$idserie = $_GET['anime'];

$upRate = array('progress' => $progress);
DBUpDate( 'history', $upRate, "idvideo = '{$videoid}' and perfil = '{$profile}' " );


$upRate2 = array('atualprogress' => $currenttime);
DBUpDate( 'history', $upRate2, "idvideo = '{$videoid}' and perfil = '{$profile}'" );


$upRate3 = array('perfil' => $profile);
DBUpDate( 'history', $upRate3, "idvideo = '{$videoid}' and perfil = '{$profile}'" );

$upRate3 = array('idserie' => $idserie);
DBUpDate( 'history', $upRate3, "idvideo = '{$videoid}' and perfil = '{$profile}'" );

$upRate3 = array('idvideo' => $videoid);
DBUpDate( 'history', $upRate3, "idvideo = '{$videoid}' and perfil = '{$profile}'" );
}

		?>