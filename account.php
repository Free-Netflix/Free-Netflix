<?php
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
    echo '<script>location.href="/dashboard";</script>';
}
?>

<head>
<title>
Wooby
</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/css/pace.css"/>
<link rel="shortcut icon" href="/static/ico/default.ico"/>
</head>
<html>
<style>
*{
	margin: 0;
	padding: 0;
	font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
	outline: none;
    list-style:none;
}

body{
    background: #f3f3f3;
}


.header-al-home-a{
    width: 100%;
    height: 5vw;
    left: 0;
    top: 0;
    position: absolute;
    z-index: 1000;
}

.header-al-home-a .logo{
		height: 4vw;
		margin-top: 1.1vw;
		margin-left: 3vw;
		opacity: .8;
		cursor: pointer;
	}

    .header-al-home-a .logo:hover{
        opacity: 1;
	}

    .login-b{
    color: #5e09e5;
    background-color: transparent;
    line-height: normal;
    margin: 18px 3% 0;
    padding: 7px 17px;
    font-weight: 400;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    font-size: 1.5vw;
    height: 2.2vw;
    width: 5vw;
    border: none;
    float: right;
    cursor: pointer;
}

</style>
<body>

<div class="header-al-home-a">
<a href="/">
<img src="/static/logo.png" class="logo"/>
</a>
<?php
            if(isset($_GET['ActionFree'])){

?>
    	<a href="/account">
<button class="login-b">
Entrar
</button>
</a>
            <?php } ?>
</div>
<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?>
<?php
$resultsearchs = DBRead( 'back', "WHERE id ORDER BY rand() DESC LIMIT 1" );
 if (!$resultsearchs)
 echo '';
else
foreach ($resultsearchs as $resultsearch):
?>
<Style>
.body-a{
    background-image: url(/static/backgronds/<?php echo $resultsearch['img'];?>);
}
</style>
<?php endforeach;?>

<style>
.body-a{
    width: 100%;
    height: 100%;
    background-size: cover;
}

.center{
    margin: 0px auto;
    position: relative;
    width: 30vw;
    height: 100%;
}

.card-login{
    background: #f3f3f3;
    position: absolute;
    width: 34vw;
    height: 35vw;
    bottom: 7vw;
    border-radius: 0.1vw;
}

.entrar{
    font-size: 2.4vw;
    color: #333;
    margin: 0 0 .4em;
    font-weight: 400;
    padding: 2vw;
}

.email-input{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    font-size: 1.2vw;
    border: solid 0.1vw #b3b3b3;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 0.1vw;
    display: block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 85%;
    color: #000;
    padding: 1vw 1vw;
    height: 2.4vw;
}

.email-input:focus{
    border-color: grey;
}

.pass-input{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    font-size: 16px;
    border: solid 0.1vw #b3b3b3;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 0.1vw;
    display: block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 85%;
    color: #000;
    height: 44px;
    position: relative;
    top: 3vw;
    padding: 1vw 1vw;
    height: 2.4vw;
}

.pass-input:focus{
    border-color: grey;
}


</style>



<?php
            if(isset($_GET['ActionFree'])){

?>
<div class="free-body" style="background:#f3f3f3; height: 100%; width: 100%; position: relative;">
            <?php } else{?>
                <div class="body-a">
            <?php } ?> 

<?php
 if(isset($_GET['ActionFree'])){
            if($_GET['ActionFree'] == 1){
?>
            <style>
            .check{
                background: url(/static/Checkmark.png) no-repeat 50% 50%;
                -moz-background-size: 60px;
                background-size: 60px;
                height: 60px;
                width: 60px;
                text-align: center;
                max-width: 440px;
                margin: 0 auto;
                position: relative;
            }

            .free{
                position: relative;
                top: 12vw;
            }

            .free p{
                font-weight: 700;
                font-size: 1.6vw;
                text-align: center;
                padding-top: 2vw;
                color: #333;
            }

            .free .text-f{
                font-size: 1.2vw;
                text-align: center;
                padding-top: 2vw;
                color: #333;
                width: 100%;
            }

            .free-btn{
                display: inline-block;
                text-decoration: none;
                line-height: 1rem;
                vertical-align: middle;
                cursor: pointer;
                font-weight: 700;
                letter-spacing: .025rem;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                text-align: center;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                border: none;
                position: relative;
                min-height: 3.6vw;
                top: 2vw;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                box-shadow: 0 1px 1px rgba(0,0,0,.25);
                color: #fff;
                width: 30vw;
                background: #5e09e5;
                font-size: 1.5vw;
            }
            </style>
            <div class="center free">
                <div class="check"></div>
                <p>Escolha seu plano.</p>
                <p class="text-f">Escolha qualquer plano; você só paga quando seu mês grátis terminar.</p>
                <a href="/account.php?ActionFree=registerf"><button class="free-btn">Continuar</button></a>
            </div>


            <?php } else if($_GET['ActionFree'] == "registerf"){?>
            <style>
 .free-btn{
                display: inline-block;
                text-decoration: none;
                line-height: 1rem;
                vertical-align: middle;
                cursor: pointer;
                font-weight: 700;
                letter-spacing: .025rem;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                text-align: center;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                border: none;
                position: relative;
                min-height: 3.6vw;
                top: 5vw;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                box-shadow: 0 1px 1px rgba(0,0,0,.25);
                color: #fff;
                width: 30vw;
                background: #5e09e5;
                font-size: 1.5vw;
            }
            </style>

                <div class="center">
<div class="card-login">
<p class="entrar">Termine seu registro</p>
<center>
<div style="padding-top: 2vw;">
<form action="#" method="post">
<span style="float: left; position: absolute; top: 7.6vw; left: 2.6vw;">E-mail</span>
<input type="text" id="email" class="email-input"/>
<span style="float: left; position: absolute; top: 13.6vw; left: 2.6vw;">Senha</span>
<input type="password" id="senha" class="pass-input"/>
<button class="free-btn" id="cadastrar" name="cadastrar">CRIAR CONTA FREE 1 MÊS</button>
<style>

#resposta{
    width: 30vw;
    color: red;
    position: relative;
    top: 6vw;
    height: auto;
    margin: 0px auto;
    text-align: center;
    border-radius: 0.3vw;
    font-size: 1.5vw;
}

</style>

<div id="resposta">
    

</div>
</form>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#cadastrar").click(function() {
        var email = $("#email");
        var emailPost = email.val();
        var senha = $("#senha");
        var senhaPost = senha.val();
        $.post("register.php", {email: emailPost, senha: senhaPost},
        function(data){
         $("#resposta").html(data);
         }
         , "html");
         return false;
    });
});
</script>

</div>
</center>
</div>
</div>
            <?php } }else{?>

<div class="center">
<div class="card-login">

<?php
  if(isset($_GET['error'])){?>
  <p class="entrar">Conta expirada.</p>
  <?php } else{?>
<p class="entrar">Entrar</p>
  <?php } ?>

<Style>
.tens{
    position: absolute;
    top: 30vw;
    left: 2vw;
    font-size: 1.2vw;
}

.tens a{
    color: #5e09e5;
    text-decoration: none;
}

.tens a:hover{
    text-decoration: underline;
}

</style>

<p class="tens">Não tens uma conta, <a href="account/1">registre-se agora</a></p>

<center>
<div style="padding-top: 2vw;">
<form action="#" method="post">
<span style="float: left; position: absolute; top: 7.6vw; left: 2.6vw; font-size: 1.2vw;">E-mail</span>
<input type="text" class="email-input" name="lemail" id="lemail"/>
<span style="float: left; position: absolute; top: 13.6vw; left: 2.6vw; font-size: 1.2vw;">Senha</span>
<input type="password" class="pass-input" name="lsenha" id="lsenha"/>
<button class="login-btn" id="login" name="cadastrar">Entrar</button>

<div id="resposta2">
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#login").click(function() {
        var email2 = $("#lemail");
        var emailPost2 = email2.val();
        var senha2 = $("#lsenha");
        var senhaPost2 = senha2.val();
        $.post("login.php", {lemail: emailPost2, lsenha: senhaPost2},
        function(data){
         $("#resposta2").html(data);
         }
         , "html");
         return false;
    });
});
</script>

</form>

<style>
.login-btn{
                display: inline-block;
                text-decoration: none;
                line-height: 1rem;
                vertical-align: middle;
                cursor: pointer;
                font-weight: 700;
                letter-spacing: .025rem;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                text-align: center;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                border: none;
                position: relative;
                min-height: 3.6vw;
                top: 5vw;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                box-shadow: 0 1px 1px rgba(0,0,0,.25);
                color: #fff;
                width: 30vw;
                background: #5e09e5;
                font-size: 1.5vw;
            }
</style>

<style>
#resposta2{
    width: 30vw;
    color: red;
    position: relative;
    top: 6vw;
    height: auto;
    margin: 0px auto;
    text-align: center;
    border-radius: 0.3vw;
    font-size: 1.5vw;
}
</style>



</div>
</center>
</div>
</div>


            <?php } ?>



</div>

</body>
<script type="text/javascript" src="/js/pace.min.js"></script>
</html>