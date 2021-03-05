<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?>
<?php 
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
    $iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
    $user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
    $user = $user[0];

    if($user['admin'] == 1){
    $batata = $_GET['id'];
    DBDelete( 'series', "id = '{$batata}'  " );
    echo 'sucesso';
    }
}
?>