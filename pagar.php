<!--Obrigado por usar nossa plataforma <3 -->
<!-- Criado por Luiz e Alexandre com todo carinho para vocês -->
<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?>
<?php
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
	


			$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
			$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
		
		if($user){
			$user = $user[0];
			}else{
			echo '<script>location.href="dashboard";</script>';	
			}

			if($user['configurado'] == 0){
				echo '<script>location.href="configure";</script>';
			}
			
			
	if(isset($_COOKIE['usuario'])){
		$idperfil = DBEscape( strip_tags(trim($_COOKIE['usuario']) ) );
		$perfil = DBRead('profiles', "WHERE id = '{$idperfil}' LIMIT 1 ");

		if($perfil){
			$perfil = $perfil[0];
			}else{
			echo '<script>location.href="account";</script>';	
			}
			if($perfil['iduser'] <> $user['id']){
				setcookie("iduser" , "");
				setcookie("inisession" , "");
				setcookie("perfil" , "");
				setcookie("usuario" , "");
				header("location: account");
			}

		
		
	}
	}


	?>
<!DOCTYPE html>
<?php 
$inicio = $user['datec'];
$expirado = date('Y-m-d', strtotime('+43700 min'));
if (strtotime($inicio) >= strtotime($expirado)) {
	?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wooby - Pagamento</title>
	<link rel="shortcut icon" href="/static/ico/default.ico"/>
</head>

<body class="logado" style="overflow-x: hidden; overflow-y: auto;">

<style>

*{
	margin: 0;
	padding: 0;
	font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
	outline: none;
    list-style:none;
}

.logado{
	background-image:url(/static/backgronds/4.png);
	width: 100%;
	height: 100%;
}

.bakap{
	width: 100%;
	height: 100%;
	position: fixed;
	background: rgba(0,0,0,.82);
	z-index: 500;
}


</style>
<div class="bakap"></div>


<div class="header" id="headera" style="z-index: 10000000;">

<a href="/">
<img src="/static/logo.png" class="logo"/>
</a>

<div class="right-user">

<?php
$peoples = DBRead( 'profiles', "WHERE id = '".$_COOKIE['usuario']."' and iduser = '".$user['id']."'  ORDER BY id DESC LIMIT 1" );
if (!$peoples)
echo '';	
else  
	foreach ($peoples as $people):	 
?>
<div class="avatar people<?php echo $people['foto'] ?>"></div>
	<div class="people" id="bakaero">
	<p style="color: #fff; position: relative; float: left;left: 0.5vw;margin-top:0.5vw;font-size: 0.8vw;"><?Php echo $people['nome']; ?>	<span class="seta"></span></p>
	</div>

	<?php endforeach;?>

	<style>
.menu-right{
	background: #000;
	width: 13vw;
	position: absolute;
	float: right;
	right: -2vw;
	top: 3.8vw;
	height: auto;
	display: none;
}

.menu-right p{
	font-size: 1.1vw;
}

.people1{
		background-image: url(/static/avatar/user1.png);
	}


	.peopleplus{
		background-image: url(/static/avatar/plus.png);
	}

	.people2{
		background-image: url(/static/avatar/user2.png);
	}

	.people3{
		background-image: url(/static/avatar/user3.png);
	}

	.people4{
		background-image: url(/static/avatar/user5.png);
	}

	.kids{
		background-image: url(/static/avatar/kids.png);
	}

	.avatar1{
		height: 2.9vw;
		width: 2.9vw;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		position: relative;
		text-decoration: none;
		border: 0.1vw solid rgba(0,0,0,.4);
		background-repeat: no-repeat;
		-moz-background-size: cover;
		background-size: cover;
		background-color: #333;
		margin-left: 1vw;
		margin-top: 0.5vw;
		cursor: pointer;
		left: 0vw;
	}

	.avatar1:hover{
		border: 0.1vw solid #fff;
	}

	.li-perfil{
		background: #010101;
		cursor: pointer;
		margin-top: 0.5vw;
	}

	.li-perfil:hover{
		background: #515151;
	}




.header{
	width: 100%;
	height: 3.8vw;
	background: rgba(0, 0, 0, 0.7);
	position: relative;
	left: 0;
	top: 0;
	z-index: 10000;
}

	.header .logo{
		height: 3vw;
		margin-top: 0.5vw;
		margin-left: 3vw;
		opacity: .8;
		cursor: pointer;
	}

	.header .logo:hover{
		opacity: 1;
	}

	.right-user{
		float: right;
		width: 20%;
		height: inherit;
		right: 3vw;
		position: relative;
	}

	.people1{
		background-image: url(/static/avatar/user1.png);
	}

	.people2{
		background-image: url(/static/avatar/user2.png);
	}

	.people3{
		background-image: url(/static/avatar/user3.png);
	}

	.people4{
		background-image: url(/static/avatar/user4.png);
	}

	.people5{
		background-image: url(/static/avatar/user5.png);
	}

	.kids{
		background-image: url(/static/avatar/kids.png);
	}

	.avatar{
		height: 1.8vw;
		width: 1.8vw;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		position: relative;
		text-decoration: none;
		background-repeat: no-repeat;
		-moz-background-size: cover;
		background-size: cover;
		background-color: #333;
		margin-top: 1vw;
		display: inline-block;
		cursor: pointer;
		float: right;
		right: 5vw;
	}

	.people{
		width: 5vw;
		height: 2vw;
		top: 1vw;
		position: absolute;
		float: right;
		right: 0;
		cursor: pointer;
	}

	.seta1{
	position: relative;
    border-style: solid;
    border-width: 0.3vw 0.3vw 0 0.3vw;
    border-color: #fff transparent transparent transparent;
	top: 1vw;
	right: -0.5vw;
	float: right;
	}

	.apresent{
		width: 100%;
		height: 50vw;
		top: 0vw;
		background-size: cover;
		position: relative;
	}

	.aaa{
		background: linear-gradient(to bottom, #0000ff4a, #141414);
		width: 100%;
		position: absolute;
		bottom: 0;
		height: 7vw;
	}

	.logo-serie{
		height: 12vw;
		width: 30vw;
		position: relative;
		z-index: 1000;
		top: 12vw;
		left: 5vw;
	}

	.apresent-info{
		width: 30vw;
		height: 9vw;
		position: absolute;
		bottom: 15vw;
		left: 5vw;
	}

	.apresent-info p{
		color: #fff;
		font-size: 1.7vw;
		font-weight: 700;
		text-shadow: 1px 1px 1px #000;s
	}

	.apresent-info p2{
		color: #fff;
		font-size: 1.3vw;
		font-weight: 700;
		line-height: 1.2;
		text-shadow: 1px 1px 1px #000;
	}

	.videos-tab{
		width: 100%;
		height: 8vw;
		position: relative;
		top: -7vw;
	}

	.videos-tab cont{
	font-size: 1.4vw;
    color: #fff;
    font-weight: 700;
    margin: 0 4% .5em 4%;
    text-decoration: none;
    display: inline-block;
    min-width: 6em;
	margin-top: 1vw;
	z-index: 5000;
	position: relative;
	}
	</style>

<div class="menu-right" id="menuzinho">
<p style="color: #fff; padding: 0.5vw;">Menu</p>
<hr>
<?php
$peoples = DBRead( 'profiles', "WHERE id and iduser = '".$user['id']."'  ORDER BY id DESC LIMIT 3" );
if (!$peoples)
echo '';	
else  
	foreach ($peoples as $people):	 
?>

<a href="/swift.php?id=<?php echo $people['id'] ?>">
<li class="li-perfil">
<button style="border:none; background: transparent;" name="people">
<div class="avatar1 people<?Php echo $people['foto'] ?>"></div>
<p style="color: #fff; position: relative; top: -2vw; left: 5vw;"><?php
	$str2 = nl2br( $people['nome'] );
	$len2 = strlen( $str2 );
	$max2 = 10;
   if( $len2 <= $max2 )
   echo $str2;
	else    
   echo substr( $str2, 0, $max2 ) . '...'?></p>
</button>
</li>	
</a>

	<?php endforeach;?>

	<a href="/logoutp" style="color: transparent;">
<li class="li-perfil">
<p style="text-align: center; color: #fff;">Gerenciar perfil</li>
</li>
</a>

<?php  if($user['admin'] == 1){ ?>

	<a href="admin.php?href=dashboard.php" style="color: transparent;">
<li class="li-perfil">
<p style="text-align: center; color: #fff;">Administrador</li>
</li>
</a>

<?php } ?>

<a href="logout.php" style="color: transparent;">
<li class="li-perfil">
<p style="text-align: center; color: #fff;">Sair</li>
</li>
</a>

</div>

</div>

</div>

<style>
.pagar{
	background: #000;
	width: 45vw;
	height: 15vw;
	z-index: 10000;
	position: relative;
	margin: 0px auto;
	top: 8vw;
	padding: 3vw;
}

.pagar input{
	width: 100%;
	height: 2vw;
	border: none;
	margin-top: 1vw;
	padding-left: 0.5vw;
	font-size: 1.3vw;
}

.pagar h1{
	color: #fff;
	padding: 1vw;
	font-size: 1.8vw;
}

.pagar .pagare{
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
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                box-shadow: 0 1px 1px rgba(0,0,0,.25);
                color: #fff;
                width: 30vw;
                background: #5e09e5;
                font-size: 1.5vw;
}

</style>

	<div class="pagar">
	<h1>Realizar pagamento</h1>
	<form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank">
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="no_note" value="1" />
		<input type="hidden" name="lc" value="BR" />
		<input type="hidden" name="currency_code" value="BRL" />
		<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
		<input type="text" name="first_name" value="" placeholder="Nome"  />
		<input type="text" name="last_name" value="" placeholder="Sobrenome" />
		<input type="hidden" name="payer_email" value="<?php echo $user['email']; ?>"  />
		<input type="hidden" name="item_number" value="<?php echo $user['id']; ?>" / >
		<center><input class="pagare" type="submit" name="submit" value="Comprar via PayPal"/></center>
		<p style="color: #fff;position: relative; left: 0; top: 1vw; font-size: 1.2vw;">Não feche esta página</p>
	</form>
	</div>
<?php }else{?>

	<html>

<head>
<meta charset="utf-8">
<title>404 NOT FOUND</title>
<link rel="shortcut icon" href="/static/ico/default.ico"/>
</head>

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


<?php } ?>

<script>
    var option2 = document.getElementById('menuzinho');
document.getElementById("bakaero").onmouseover = function() {animacaomenupos()};
function animacaomenupos(){
document.getElementById("menuzinho").style.display = "block";
}
document.addEventListener('click', function(){
	option2.style.display = 'none';
});
</script>

<script>
var headerstyle = document.getElementById('headera');
window.onscroll = function(){
var top = window.pageYOffset || document.documentElement.scrollTop
if( top > 100 ) {
headerstyle.style = 'background: rgba(0, 0, 0, 0.7); position: fixed;';
}else{
headerstyle.style = 'position: relative; background-image: linear-gradient(#000 0%, transparent 100%);';
}
}
</script>
</body>
</html>
