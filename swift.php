<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?>
<?php

if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){



$idperfil = DBEscape( strip_tags(trim($_GET['id']) ) );
$perfil = DBRead('profiles', "WHERE id = '{$idperfil}' LIMIT 1 ");
$perfil = $perfil[0];



$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
$user = $user[0];

if($user){
    $user = $user[0];
    }else{
    echo '<script>location.href="/dashboard";</script>';	
    }


    if($perfil['iduser'] <> $user['id']){
       echo '';
       setcookie("usuario" , $perfil['id']);
       echo '<script>location.href="/dashboard";</script>';
    }
    else{
        setcookie("iduser" , "");
        setcookie("inisession" , "");
        setcookie("perfil" , "");
        setcookie("usuario" , "");
        header("location: /account");
    }
    

}
else{
    setcookie("iduser" , "");
    setcookie("inisession" , "");
    setcookie("perfil" , "");
    setcookie("usuario" , "");
    header("location: account");
}

?>