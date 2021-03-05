<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?>
<?php
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
	
		$iduser2 = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
		$user2 = DBRead('user', "WHERE id = '{$iduser2}' LIMIT 1 ");
		$user2 = $user2[0];
	
	
			$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
            $user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
}
	if(empty($_COOKIE['iduser']) and (empty($_COOKIE['inisession']))){
		echo '<script>location.href="account";</script>';
	}
	if(empty($_COOKIE['inisession'])){
		echo '<script>location.href="account";</script>';
	}
	if(empty($_COOKIE['iduser'])){
		echo '<script>location.href="account";</script>';
	}
?>

<head>
<title>
Wooby
</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="/static/ico/default.ico"/>
</head>

<?php 
if($user2['configurado'] == 1){
?>
 <html>
        <style>
body {
    background: #081421;
    color: #d3d7de;
    font-family: "Courier new";
    font-size: 18px;
    line-height: 1.5em;
	cursor: default;
}

.code-area {
    position: absolute;
    width: 320px;
	min-width: 320px;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.code-area > span {
    display: block;
}

@media screen and (max-width: 320px) {
    .code-area {
		font-size: 5vw;
		min-width: auto;
        width: 95%;
		margin: auto;
		padding: 5px;
		padding-left: 10px;
		line-height: 6.5vw;
    }
}

        </style>
        <body>
        <div class="code-area">
  <span style="color: #777;font-style:italic;">
    // 404 page not found.
  </span>
  <span>
    <span style="color:#d65562;">
      if
    </span>
	  (<span style="color:#4ca8ef;">!</span><span style="font-style: italic;color:#bdbdbd;">found</span>)
    {
  </span>
  <span>
    <span style="padding-left: 15px;color:#2796ec">
       <i style="width: 10px;display:inline-block"></i>throw
    </span>
    <span>
      (<span style="color: #a6a61f">"(╯°□°)╯︵ ┻━┻"</span>);
    </span>
	  <span style="display:block">}</span>
  </span>
</div>
        </body>

        </html>

<?php } else if($user2['configurado'] == 0) { ?>

<style>
*{
	margin: 0;
	padding: 0;
	font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
	outline: none;
    list-style:none;
}


.header-al-home-a .logo{
		height: 3vw;
		margin-top: 0.5vw;
		margin-left: 3vw;
		opacity: .8;
		cursor: pointer;
	}

    .header-al-home-a .logo:hover{
        opacity: 1;
	}
</style>

<html>
<body style="background: #141414;">

<div class="header-al-home-a">
<img src="/static/logo.png" class="logo"/>
</div>

<style>
.config-perfil{
    position: relative;
    margin: 0px auto;
    width: 30vw;
    text-align: center;
    color: #fff;
    top: 3vw;
    font-size: 1.2vw;
    padding-top: 0.5vw;
}
.config-btn{
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

<div class="config-perfil">

<h1>Configure seu perfil</h1>

<img src="/static/avatar/user1.png" style="width: 8vw; padding-top: 1vw;"/>

<form action="#" method="post">
<input type="text" name="name" id="name" placeholder="Nome de quem vai usar a conta" style="font-size: 1vw; border: none;width: 100%; padding: 0.5vw; border-radius: 0.1vw; position: relative; top: 0.5vw;"/>
<button class="config-btn" id="concluido">Concluido</button>
</form>

<div id="resposta">

</div>

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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $("#concluido").click(function() {
        var name = $("#name");
        var namePost = name.val();
        $.post("configurando.php", {name: namePost},
        function(data){
         $("#resposta").html(data);
         }
         , "html");
         return false;
    });
});
</script>

</div>


</body>
</html>
<?php } ?>