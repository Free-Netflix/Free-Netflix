<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';

if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
    $iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
    $user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
    $user = $user[0];
    $profile = $_GET['id'];

    DBDelete( 'profiles', "id = '{$profile}' and iduser = '{$user['id']}'  " );
    echo 'sucesso';
    }
    ?>