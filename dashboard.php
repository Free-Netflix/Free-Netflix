<!--Obrigado por usar nossa plataforma <3 -->
<!-- Criado por Luiz e Alexandre com todo carinho para vocês -->
<!--Obrigado por usar nossa plataforma <3 -->
<!-- Criado por Luiz e Alexandre com todo carinho para vocês -->
<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?>
<?php
if(isset($_COOKIE['iduser'])){
	

		$idcry = DBEscape( strip_tags(trim($_COOKIE['thecry']) ) );
		$usercry = DBRead('user', "WHERE id and idcry = '{$idcry}' LIMIT 1 ");
		
		if($usercry){
			$usercry = $usercry[0];
			}else{
			echo '<script>location.href="dashboard";</script>';	
			}
			
			if($user['idcry'] == $usercry['idcry']){
				echo '';
			}
			else{
			setcookie("iduser" , $usercry['id']);
			setcookie("thecry" , $usercry['idcry']);
			}


			$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
			$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
		
		if($user){
			$user = $user[0];
			}else{
			header("location: account");
			setcookie("iduser" , "");
			setcookie("inisession" , "");
			setcookie("perfil" , "");
			setcookie("usuario" , "");
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

<head>
<title>
<?php
ob_start();
if(empty($_COOKIE['iduser'])){
    echo '404 NOT FOUND';
}

if(isset($_COOKIE['iduser']) ){
	
	if(empty($_COOKIE['usuario'])){
		echo 'Change Profile';
	}
	else{
		echo 'Wooby';
	}
}
?>
</title>
<link rel="stylesheet" type="text/css" href="/css/pace.css"/>
<script type="text/javascript" src="/js/pace.min.js"></script>
<link rel="shortcut icon" href="/static/ico/default.ico"/>
</head>

<style>
*{
	margin: 0;
	padding: 0;
	font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
	outline: none;
    list-style:none;
}
</style>
<?php
if(isset($_COOKIE['iduser'])){?>
<html>
<?php 
if(empty($_COOKIE['usuario'])){
?>
<style>
body{
	background: #141414;
}

.center{
	margin: 0px auto;
	position: relative;
}

.change-profile{
	width: 100%;
	height: 25vw;
	margin-top: 9.5vw;
	}

	.alc{
		text-align: center;
	}

	.who{
		color: #fff;
		font-size: 3.5vw;
		line-height: 1.15;
	}

	.header{
		width: 100%;
		height: 3.5vw;
		background-image: -webkit-linear-gradient(top,rgba(0,0,0,.7) 10%,rgba(0,0,0,0));
	}

	.header .logo{
		height: 3vw;
		margin-top: 1.1vw;
		margin-left: 3vw;
		opacity: .8;
		cursor: pointer;
	}

	.header .logo:hover{
		opacity: 1;
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
		background-image: url(/static/avatar/user4.png);
	}

	.people5{
		background-image: url(/static/avatar/user5.png);
	}

	.kids{
		background-image: url(/static/avatar/kids.png);
	}

	.avatar1{
		height: 10vw;
		width: 10vw;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		position: relative;
		text-decoration: none;
		border: 0.3vw solid rgba(0,0,0,.4);
		background-repeat: no-repeat;
		-moz-background-size: cover;
		background-size: cover;
		background-color: #333;
		margin-top: 2vw;
		display: inline-block;
		<?Php 
		if($_GET['action'] == 1){
			echo 'margin-left: -10.2vw;';
			echo 'left: 10vw;';
		}
		else{
			echo 'margin-left: -8vw;';
			echo 'left: 8.6vw;';
		}
		?>
		cursor: pointer;
	}

	.avatar1:hover{
		border: 0.3vw solid #fff;
	}

	.avatar2{
		height: 8vw;
		width: 8vw;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		position: relative;
		text-decoration: none;
		border: 0.3vw solid rgba(0,0,0,.4);
		background-repeat: no-repeat;
		-moz-background-size: cover;
		background-size: cover;
		background-color: #333;
		margin-top: 2vw;
		display: inline-block;
		margin-left: 1vw;
		cursor: pointer;
		
	}

	.avatar2:hover{
		border: 0.3vw solid #fff;
	}

	.avatar2:focus{
		border: 0.3vw solid #fff;
	}


	.ava-who{
		color: grey;
		font-size: 1.3vw;
		position: relative;
		text-align: center;
		
		<?Php 
		if($_GET['action'] == 1){
			echo 'left: -3.5vw;';
		}
		else{
			echo 'left: -5vw;';
		}
		?>
	}

	button:hover + .pessoas .ava-who{
		color: #fff;
	}

	.pessoas{
		display: inline-block;
		width: 9.6vw;
		left: 0;
		position: relative;
		top: 2.2vw;
		left: 3.6vw;
	}

	.what{
		width: 100%;
	}

</style>
<body>


<div class="header">
<img src="/static/logo.png" class="logo"/>
</div>

<div class="change-profile center">
<center>
<div class="who alc">
<?Php 
if($_GET['action'] == 1){
	echo "Gerenciando perfil's";
}
else{
	echo "Quem está assistindo?";
}
	?></div>
<div class="what center">
<?php
$peoples = DBRead( 'profiles', "WHERE iduser = '".$user['id']."'  ORDER BY id ASC LIMIT 5" );
if (!$peoples)
echo '';
else  
	foreach ($peoples as $people):	 
?>
<button style="border:none; background: transparent;" name="people">
<?Php
if($_GET['action'] == 1){?>
 <?php echo ''; ?>
<?php }else{?>
	<a href="/swift.php?id=<?php echo $people['id'] ?>">
<?php } ?>
<div class="avatar1 people<?Php echo $people['foto'] ?>" id="d<?php echo $people['id']; ?>"></div></a>
</button>
<div class="pessoas" id="e<?php echo $people['id']; ?>"><p class="ava-who"><?php
	$str2 = nl2br( $people['nome'] );
	$len2 = strlen( $str2 );
	$max2 = 13;
   if( $len2 <= $max2 )
   echo $str2;
	else    
   echo substr( $str2, 0, $max2 ) . '...'?></p></div>



<?Php 
if($_GET['action'] == 1){
?>


<button class="closef" id="<?php echo $people['id']; ?>">X</button>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#<?php echo $people['id']; ?>").click(function() {
        var idPost = <?php echo $people['id']; ?>;
        $.post("/dqs.php?id=<?php echo $people['id']; ?>", {id: idPost},
        function(data){
         $("#resposta").html(data);
         }
         , "html");
		 $("#d<?php echo $people['id']; ?>").fadeOut(600);
		 $("#e<?php echo $people['id']; ?>").fadeOut(600);
		 $("#<?php echo $people['id']; ?>").fadeOut(600);
         return false;
    });
});
</script>

<style>
.closef{
	position:relative;
	border-radius: 50%;
	border: none;
	width: 1.5vw;
	height: 1.5vw;
	font-size: 1.2vw;
	top: -8.3vw;
	right: 2.5vw;
	background: rgba(0,0,0,.50);
	color: #fff;
	cursor: pointer;
}

.closef:hover{
	background: rgba(0,0,0,.90);
}
</style>
<?php } ?>
	<?php endforeach;?>

	<style>
	.ata{
		background: transparent;
	}
	</style>
<?php
require 'db.php';
$totaldepost = mysql_query("SELECT * FROM netflix_profiles WHERE iduser = $iduser ");
$totaldepost = mysql_num_rows($totaldepost);
if($totaldepost < 5){
?>
	<button style="border:none; background: transparent;" name="people">
<div class="avatar1 peopleplus" id="addpeople2"></div>
</button>

<div class="pessoas"><p class="ava-who">Adicionar perfil</p></div>
<?php } ?>
	<style>
	.ger{
	border: 1px solid grey;
    color: grey;
    text-transform: uppercase;
    padding: .5em 1.5em;
    letter-spacing: 2px;
    cursor: pointer;
    font-size: 1.2vw;
	background: transparent;
	position: relative;
	top: 7vw;
	}

	.ger:hover{
		color: #fff;
		border: 1px solid #fff;
	}
	</style>
	<?Php 
if($_GET['action'] == 1){?>
	<center><a href="/dashboard/2"><button class="ger">Concluir</button>
	<?Php 
if($_GET['action'] == 1){?>
 <?php echo ''; ?>
<?php }else{?>
	</a>
<?php } ?>
	</center>
<?php }else{?>
	<center><a href="/dashboard/1"><button class="ger">GERENCIAR PERFIS</button></a></center>
<?php } ?>
	<style>
	.addprofile{
		width: 100%;
		position: fixed;
		height: 100%;
		background: rgba(0,0,0,.50);
		top: 0;
		left: 0;
	}

	.tabadd{
		position: relative;
		margin: 0px auto;
		width: 50%;
		height: 30vw;
		background: #141414;
		top: 10vw;
		border-radius: 0.2vw;
	}

	.close{
		float: right;
		right: 1vw;
		top: 1vw;
		position: relative;
	 	width: 2.5vw;
		height: 2.5vw;
		cursor: pointer;
		padding: 0.3vw;
	}

	.close:hover{
		background: rgba(0,0,0,.50);
	}

	.close svg{
		fill: #fff;
	}

	input[type="radio"]{
		display:none;
	 }
	 #postadd{
		 display: none;
	 }
	</style>
	<div class="addprofile" id="postadd">

	<div class="tabadd">
	<div class="close" id="close">
	<svg height="2.5vw"  width:"2.5vw" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
	</div>
		<center>
		<h1 style="color: #fff; font-size: 2vw;padding: 1vw;">Adicionar perfil</h1>

		 <style>

input[type="radio"] + label
{
    cursor:pointer;
}

input[type="radio"]:checked + label .avatar2 {
    border: 3px solid #fff;
}
		 </style>
		
<?php
		$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
		$totaldeperfil2 = mysql_query("SELECT * FROM netflix_profiles WHERE iduser = $iduser ");
		$totaldeperfil = mysql_num_rows($totaldeperfil2);
?>
	  <form action="#" method="post">
		<div id="radio">
		<input type="radio" id="radio1" class="radios" name="radio" checked="checked" value="1">
		<label for="radio1">
		<div class="avatar2 people<?php
		if($totaldeperfil == 0){
			echo '1';
		}
		else if($totaldeperfil == 1){
			echo '2';
		}
		else if($totaldeperfil == 2){
			echo '3';
		}
		else if($totaldeperfil == 3){
			echo '4';
		}
		else if($totaldeperfil == 4){
			echo '2';
		}
		?>"></div>
		</label>
	  </div>
<input type="text" name="name" id="name" placeholder="Nome do perfil" style="font-size: 1vw; border: none;width: 90%; padding: 0.5vw; border-radius: 0.1vw; position: relative; top: 2vw; height: 2.5vw;"/>
<button class="config-btn" id="concluido">Concluido</button>
</form>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#concluido").click(function() {
        var name = $("#name");
        var namePost = name.val();
		var radio = $(".radios");
        var radioPost = radio.val();
        $.post("/configurando.php?addprofile=<?Php echo $user['idcry']; ?>", {name: namePost,radio: radioPost},
        function(data){
         $("#resposta").html(data);
         }
         , "html");
         return false;
    });
});
</script>

<script>
  $('#addpeople2').click(function(){
	  $("#postadd").fadeIn(600);
    });
	$('#close').click(function(){
	  $("#postadd").fadeOut(600);
    });
</script>

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

<style>
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
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                box-shadow: 0 1px 1px rgba(0,0,0,.25);
                color: #fff;
                width: 30vw;
                background: #5e09e5;
                font-size: 1.5vw;
				top: 5vw;
            }
</style>


		</center>
	</div>

	</div>



<!-- <button style="border:none; background: transparent;" name="people2"><div class="avatar1 people2"></div></button>
<div class="pessoas"><p class="ava-who">Vitor</p></div>

<button style="border:none; background: transparent;" name="people3"><div class="avatar1 people3"></div></button>
<div class="pessoas"><p class="ava-who">LucasAD</p></div>

<button style="border:none; background: transparent;" name="people4"><div class="avatar1 people4"></div></button>
<div class="pessoas"><p class="ava-who">Salviti</p></div>

<button style="border:none; background: transparent;" name="kids"><div class="avatar1 kids"></div></button>
<div class="pessoas"><p class="ava-who">Kids</p></div>
</div> -->


</div>
</body>
<?php } else{?>

	<style>
body{
	background: #141414;
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
	font-size: 1.6vw;
    color: #fff;
    font-weight: 700;
    margin: 0 4% .5em 4%;
    text-decoration: none;
    display: inline-block;
    min-width: 6em;
	margin-top: 1vw;
	z-index: 5000;
	text-shadow: 2px 3px 2px #000;
	position: relative;
	}
	</style>
<body class="logado" style="overflow-x: hidden; overflow-y: auto;">





<?php 
$inicio = $user['datec'];
$expirado = $user['expirado'];
if(empty($user['username'])) {
	?>

<style>

.logado{
	overflow-x: hidden;
	overflow-y: auto;
}

.error-msg{
	width: 100%;
	background: #000;
	height: 12.5vw;
	position: relative;
	top: 0;
	left: 0;
	color: #fff;
}

.error-h1{
	color: #fff;
    position: relative;
    vertical-align: middle;
    font-size: 1.5vw;
    font-weight: 400;
	top: 2.5vw;
	left: 2vw;
}

.error-msg p{
	position: relative;
	top: 3vw;
	left: 2vw;
	font-size: 1.1vw;
}

.pagar{
	float: left;
	position: relative;
	width: 15vw;
	height: 2.5vw;
	top: 4vw;
	left: 2vw;
	border: none;
	cursor: pointer;
	-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
	-moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
    box-shadow: 0 1px 1px rgba(0,0,0,.25);
	color: #fff;
    background: #5e09e5;
	font-size: 1.2vw;
}

.center-error{
	max-width: 50vw;
	height: inherit;
	margin: 0px auto;
}
</style>

<div class="error-msg" style="z-index: 10000;">

<div class="center-error">
<h1 class="error-h1">Parece que você ainda não configurou seu username!</h1>
<p>Para configurar clique no botão abaixo!</p>

<a href="config.php?id=<?php echo $user['idcry']; ?>"><button class="pagar">Configurar conta</button></a>
</div>
</div>

<?php } ?>






<?php 
$inicio = $user['datec'];
$expirado = $user['expirado'];
if (strtotime($inicio) >= strtotime($expirado)) {
	?>

<style>

.logado{
	overflow-x: hidden;
	overflow-y: auto;
}

.error-msg{
	width: 100%;
	background: #000;
	height: 12.5vw;
	position: relative;
	top: 0;
	left: 0;
	color: #fff;
}

.error-h1{
	color: #fff;
    position: relative;
    vertical-align: middle;
    font-size: 1.5vw;
    font-weight: 400;
	top: 2.5vw;
	left: 2vw;
}

.error-msg p{
	position: relative;
	top: 3vw;
	left: 2vw;
	font-size: 1.1vw;
}

.pagar{
	float: left;
	position: relative;
	width: 15vw;
	height: 2.5vw;
	top: 4vw;
	left: 2vw;
	border: none;
	cursor: pointer;
	-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
	-moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
    box-shadow: 0 1px 1px rgba(0,0,0,.25);
	color: #fff;
    background: #5e09e5;
	font-size: 1.2vw;
}

.center-error{
	max-width: 50vw;
	height: inherit;
	margin: 0px auto;
}
</style>

<div class="error-msg" style="z-index: 10000;">

<div class="center-error">
<h1 class="error-h1">Parece que seu mês grátis acabou.</h1>
<p>Para efetuar efetuar pagamento, clique no botão abaixo!</p>

<a href="pagar.php?id=<?php echo $user['idcry']; ?>"><button class="pagar">Efetuar pagamento</button></a>
</div>
</div>

<?php } ?>

<div class="header" id="headera" style="z-index: 10000000;">


<style>
.buscaranime{
	display: flex;
	width: 12vw;
	height: 2vw;
	position: relative;
	top: 1vw;
	border: none;
	padding: 1vw;
	border-radius: 0.2vw;
	font-size: 1vw;
	float: right;
	right: 1vw;
	-webkit-transition: all 1s; /* Safari */
    transition: all 1s;
}

.buscaranime:focus{
	width: 20vw;
}

.src{
	width: 19vw;
	background: #fff;
	height: auto;
	position: absolute;
	float: right;
	right: 2vw;
	top: 3.5vw;
}

.buscaright{
	width: 100%;
	height: 4vw;
	margin-top: 0.5vw;
}

.eoq{
	color: #000;
	text-decoration: none;
	font-size: 1vw;
}

.buscaright:hover{
	background: #5e09e5;
}

.avatar6{
	height: 3vw;
	width: 3vw;
	position: relative;
	top: 0.5vw;
	left: 0.5vw;
}

.name{
	position: relative;
	left: 4vw;
	bottom: 1.5vw;
}

.left-t{
	display: flex;
	position: absolute;
	height: inherit;
	width: 25%;
	top: 0;
	left: 13%;
}

.left-t a{
	color: #fff;
	padding: 1vw;
	font-size: 1.5vw;
	cursor: pointer;
	display: inline-block;
	margin-left: 0.9vw;
	text-decoration: none;
}

.left-t a:hover{
	border-bottom: 0.2vw solid #4c08b8;
	background: #515151;
}

.ativo{
	border-bottom: 0.2vw solid #4c08b8;
	background: #515151;
}

</style>

<input type="text" class="buscaranime" placeholder="Procurar..." />
<div id="box-s-h">
		    <ul class="src">
			</ul>
		  </div>
		  <script src="lib/js/jquery.js" type="text/javascript"></script>
		<script src="lib/js/js-all.js" type="text/javascript"></script>

<a href="/"><img src="/static/logo.png" class="logo"/></a>

<div class="left-t">
<a href="/" <?php if($_GET['action'] == animesall){ echo '';} else if($_GET['action'] == mylist){ echo ''; }else if($_GET['action'] == history){  echo ''; } else{ echo 'class="ativo"'; } ?>>ÍNICIO</a>
<a href="/dashboard.php?action=animesall" <?php if($_GET['action'] == animesall){ echo 'class="ativo"';} ?>>ANIMES</a>
<a href="/dashboard.php?action=history" <?php if($_GET['action'] == animesall){ echo '';} else if($_GET['action'] == mylist){ echo ''; }else if($_GET['action'] == history){  echo 'class="ativo"'; } else{ echo ''; } ?>>HISTORICO</a>
</div>

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



</style>

<div class="menu-right" id="menuzinho">
<p style="color: #fff; padding: 0.5vw;">Menu</p>
<hr>
<?php

$peoples = DBRead( 'profiles', "WHERE id <> '".$_COOKIE['usuario']."' and iduser = '".$user['id']."'  ORDER BY id DESC LIMIT 3" );
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



<a href="config.php" style="color: transparent;">
<li class="li-perfil">
<p style="text-align: center; color: #fff;">Configuração</li>
</li>
</a>

<a href="logout.php" style="color: transparent;">
<li class="li-perfil">
<p style="text-align: center; color: #fff;">Sair</li>
</li>
</a>

</div>

</div>

</div>

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


<?php if($_GET['action'] == animesall){ ?>

<style>
.video{
	width: 16vw;
	height: 9vw;
	display: inline-block;
	margin-left: 0.5vw;
	margin-top: 1vw;
	cursor: pointer;
	-webkit-transition: all 1s; /* Safari */
    transition: all 1s;
}

.video:hover{
	transform: scale(1.3);
    margin-left: 4vw;
    margin-right: 2vw;
    left: 30px;
}

.video .focus{
	width: 16vw;
	height: 9vw;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<center>

<?php
$animels2 = DBRead( 'series', "WHERE id and tipo > 1 ORDER BY id DESC LIMIT 40" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>

<div class="video" id="click76<?php echo $animel['id']; ?>">
<img src="<?php echo $animel['foto']; ?>" class="focus"/>
</div>



<script>
  $('#click76<?php echo $animel['id']; ?>').click(function(){
	$("#infor0").fadeIn(600);
				$.post('/request.php?serie=<?php echo $animel['id']; ?>&infor=0', function (html) {
				$('#infor0').html(html);
				});
    });
</script>




<?php endforeach;?>
</center>

<div class="conteudo-info" id="infor0">

</div>

<style>

#infor0{
position: fixed;
width: 100%;
height: 100%;
top: 0;
left: 0;
background: #000;
z-index: 1000000217382713;
display: none;
}

.conteudo-info{
	width: 100%;
	position: fixed;
	height: 100%;
	background: #000;
	top: 0vw;
	display: none;
	color: #fff;
	z-index: 10000000000;
	margin: 0px auto;
	left: 0;
}

.informa h1{
	left: 2vw;
	font-size: 2.2vw;
}

.informa .desct{
	width: 35vw;
	padding-left: 2vw;
	z-index: 50;
}

.baixo-desc{
	width: 100%;
	position: absolute;
	bottom: 0;
	height: 3vw;
	background: rgba(0,0,0,.50);
	z-index: 1060;
}

.feels{
	width: 9vw;
	position: relative;
	top: 1.3vw;
	text-align: center;
	display: inline-block;
	margin-left: 2vw;
	cursor: pointer;
	z-index: 50;
}

.feels:hover{
	border-bottom: 0.2vw solid #5e09e5;
}

.feels-ativo{
	border-bottom: 0.2vw solid #5e09e5;
}

.close{
		float: right;
		right: 1vw;
		top: 1vw;
		position: relative;
	 	width: 2vw;
		height: 2vw;
		cursor: pointer;
		padding: 0.3vw;
		z-index: 1250;
	}

	.close:hover{
		background: rgba(0,0,0,.50);
	}

	.close svg{
		fill: #fff;
	}

</style>



<?php } else if($_GET['action'] == history){?>

<style>
.video{
	width: 16vw;
	height: 9vw;
	display: inline-block;
	margin-left: 0.5vw;
	margin-top: 1vw;
	cursor: pointer;
	-webkit-transition: all 1s; /* Safari */
    transition: all 1s;
}

.video:hover{
	transform: scale(1.6);
    margin-left: 4vw;
    margin-right: 2vw;
    left: 30px;
}

.video .focus{
	width: 16vw;
	height: 9vw;
}
</style>
<center>
<?php
$animels52 = DBRead( 'history', "WHERE id and idpeople = '". $user['id'] ."' and perfil = '". $perfil['id'] ."'ORDER BY id DESC LIMIT 40" );
 if (!$animels52)
	echo "";
else 
	foreach ($animels52 as $animel5):
 ?>
<?php
$videoh = $animel5['idserie'];
$animels2 = DBRead( 'series', "WHERE id = '". $videoh ."' ORDER BY id DESC LIMIT 1" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>
<a href="watch.php?id=<?php echo $animel5['idvideo'];?>&chalala=<?php echo $animel5['progress']; ?>">
<div class="video">
<p style="color: #fff; font-size: 1.2vw; background: #000; width: 100%;">Episodio <?php echo $animel5['ep']; ?></p>
<img src="<?php echo $animel['foto']; ?>" class="focus"/>
	<div style="width: 80%; height: 12px; background: #fff; position: relative; top: 0.2vw;left: 0%; box-shadow: 3px 2px 3px #141414;">
<div style="float: left;width:<?php if($animel5['progress'] < 1){ echo '3%;'; }?> <?php echo $animel5['progress'];?> <?php if(empty($animel5['progress'])){ echo '0'; }?>; height: inherit; background: #5e09e5;"></div>
</div>
</div>
</a>
<?php endforeach; endforeach;?>
</div>
</center>
<?php } else{ ?>

<div class="apresent">
<?php
$animels2 = DBRead( 'series', "WHERE id ORDER BY id DESC LIMIT 1" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>

<img src="<?php echo $animel['logo']; ?>" class="logo-serie"></img>
<div class="apresent-info">

<style>

.apresent{
	background-image: url(<?php echo $animel['fotoback']; ?>);
	z-index: 1000;
}

</style>

<p><?php echo $animel['name']; ?></p>
<p2>
<?php
	$str2 = nl2br( $animel['desct'] );
	$len2 = strlen( $str2 );
	$max2 = 180;
   if( $len2 <= $max2 )
   echo $str2;
	else    
   echo substr( $str2, 0, $max2 ) . '...'?>
</p2>
 <?php
 $videoid = $animel['id'];
$videols2 = DBRead( 'videos', "WHERE id and idserie = '". $videoid ."' ORDER BY id ASC LIMIT 1" );
 if (!$videols2)
	echo "";
else 
	foreach ($videols2 as $videol):
 ?>
<a href="watch.php?id=<?php echo $videol['id']; ?>">
<button class="asssitirs">Assistir</button>
</a>
<?php endforeach;?>

<?php endforeach; ?>

<style>
.asssitirs{
	width: 10vw;
    height: 3vw;
    border: none;
    color: #fff;
    font-size: 1.5vw;
    padding: 0.2vw;
    position: absolute;
    top: 10.5vw;
    background: rgba(0,0,0,.30);
    border: 0.1vw solid rgba(0,0,0,.30);
    cursor: pointer;
    left: 0.5vw;
}

.asssitirs:hover{
	background: rgba(0,0,0,.80);
}
</style>
</div>
</div>


<style>
.bakap{
	width: 100%;
	height: 2vw;
	background: rgba(0,0,0,.90);
}
</style>


<?php
$animels52 = DBRead( 'history', "WHERE id and idpeople = '". $user['id'] ."' and perfil = '". $perfil['id'] ."'ORDER BY id ASC LIMIT 1" );
 if (!$animels52)
	echo "<div class='bakap'>
		<p style='z-index: 1300;width: auto;color: #fff; font-size: 1.5vw; position: relative; left: 3.5vw; top: 0vw;'>Que pena você não assistiu nada ainda, assista algo para aparecer aqui.</p>
	</div>";
else 
	foreach ($animels52 as $animel5):
 ?>



<div class="videos-tab" style="top: -8vw; position: relative;">
<cont>Continuar assistindo como <?php echo $perfil['nome'];  ?></cont>
<style>
.videos-tab{
	width: 100%;
}
.video-a{
	position: relative;
	height: 13vw;
	overflow: hidden;
	display: block;
	-webkit-transition: all 1s; /* Safari */
    transition: all 1s;
	z-index: 1500;
}


.video .focus{
	height: 9vw;
    width: 16vw;
	position: relative;
}

.video{
	top: 2.5vw;
opacity: 1;
}

.video:hover{
	transform: scale(1.3);
   margin-left: 4vw;
    margin-right: 2vw;
    left: 30px;
}


.left-i{
	float: left;
	height: 9vw;
	width: 2.5vw;
	left: 0.2vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	cursor: pointer;
	z-index: 3000;
	top: 6vw;
}

.left-i svg{
	fill: #fff;
	position: absolute;
	top: 3vw;
}

.right-i{
	float: right;
	height: 9vw;
	width: 2.5vw;
	right: 0vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	z-index: 3000;
	cursor: pointer;
	top: 6vw;
}

.right-i svg{
	fill: #fff;
	position: absolute;
	top: 3vw;
}

.shiftLeft { 
  transform: translate3d(-40px, 0, 0);
}

.shiftRight { 
  transform: translate3d(40px, 0, 0);
}

#scroll{
	transition:all 0.3s ease;
}
</style>
<?php
require 'db.php';
$totaldepost = mysql_query("SELECT * FROM netflix_history WHERE id and perfil = '{$_COOKIE['usuario']}' ");
$totaldepost = mysql_num_rows($totaldepost);
if($totaldepost >= 7){
?>
<div class="left-i" onclick="ScrollByRight2()" style="top: 3.5vw; height: 11vw;">
<svg enable-background="new 0 0 32 32" height="32px" style="top: 4vw;" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M7.701,14.276l9.586-9.585c0.879-0.878,2.317-0.878,3.195,0l0.801,0.8c0.878,0.877,0.878,2.316,0,3.194  L13.968,16l7.315,7.315c0.878,0.878,0.878,2.317,0,3.194l-0.801,0.8c-0.878,0.879-2.316,0.879-3.195,0l-9.586-9.587  C7.229,17.252,7.02,16.62,7.054,16C7.02,15.38,7.229,14.748,7.701,14.276z" fill="#fff"/></svg>
</div>

<div class="right-i" onclick="ScrollByLeft2()" style="top: 3.5vw; height: 11vw;">
<svg enable-background="new 0 0 32 32" height="32px" style="top: 4vw;"  id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24.291,14.276L14.705,4.69c-0.878-0.878-2.317-0.878-3.195,0l-0.8,0.8c-0.878,0.877-0.878,2.316,0,3.194  L18.024,16l-7.315,7.315c-0.878,0.878-0.878,2.317,0,3.194l0.8,0.8c0.878,0.879,2.317,0.879,3.195,0l9.586-9.587  c0.472-0.471,0.682-1.103,0.647-1.723C24.973,15.38,24.763,14.748,24.291,14.276z" fill="#fff"/></svg>
</div>

<?php } ?>

<div class="video-a" id="scroll2">




<?php
$animels52 = DBRead( 'history', "WHERE id and idpeople = '". $user['id'] ."' and perfil = '". $perfil['id'] ."'ORDER BY id DESC LIMIT 40" );
 if (!$animels52)
	echo "";
else 
	foreach ($animels52 as $animel5):
 ?>
<?php
$videoh = $animel5['idserie'];
$animels2 = DBRead( 'series', "WHERE id = '". $videoh ."' ORDER BY id DESC LIMIT 1" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>
<a href="watch.php?id=<?php echo $animel5['idvideo'];?>&chalala=<?php echo $animel5['progress']; ?>">
<div class="video">
<p style="color: #fff; font-size: 1.2vw; background: #000; width: 100%;">Episodio <?php echo $animel5['ep']; ?></p>
<img src="<?php echo $animel['foto']; ?>" class="focus"/>
<div style="width: 80%; height: 12px; background: #fff; position: relative; top: 0.2vw;left: 13%; box-shadow: 3px 2px 3px #141414;">
<div style="width:<?php if($animel5['progress'] < 1){ echo '3%;'; }?> <?php echo $animel5['progress'];?> <?php if(empty($animel5['progress'])){ echo '0'; }?>; height: inherit; background: #5e09e5;"></div>
</div>
</div>
</a>
<?php endforeach; endforeach;?>
</div>


	<?php endforeach; ?>





<div class="videos-tab" style="position: relative; top: 2vw;">
<cont>Animes</cont>
<style>
.videos-tab{
	width: 100%;
	height: 13vw;
}
.video-a{
	position: relative;
	height: 13vw;
	overflow: hidden;
	display: flex;
	-webkit-transition: all 1s; /* Safari */
    transition: all 1s;
}

.left-i{
	float: left;
	height: 9vw;
	width: 2.5vw;
	left: 0.2vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	cursor: pointer;
	z-index: 3000;
	opacity: 0.6;
	top: 6vw;
}

.left-i:hover{
	opacity: 1;
}

.left-i svg{
	fill: #fff;
	position: absolute;
	top: 3vw;
}

.right-i{
	top: 6vw;
	float: right;
	height: 9vw;
	width: 2.5vw;
	right: 0vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	z-index: 3000;
	cursor: pointer;
	opacity: 0.6;
}

.right-i:hover{
	opacity: 1;
}

.right-i svg{
	fill: #fff;
	position: absolute;
	top: 3vw;
}

.shiftLeft { 
  transform: translate3d(-40px, 0, 0);
}

.shiftRight { 
  transform: translate3d(40px, 0, 0);
}

#scroll{
	transition:all 0.3s ease;
}
</style>
<?php
require 'db.php';
$totaldepost = mysql_query("SELECT * FROM netflix_series WHERE id and tipo > 1 ");
$totaldepost = mysql_num_rows($totaldepost);
if($totaldepost >= 7){
?>
<div class="left-i" onclick="ScrollByRight()">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M7.701,14.276l9.586-9.585c0.879-0.878,2.317-0.878,3.195,0l0.801,0.8c0.878,0.877,0.878,2.316,0,3.194  L13.968,16l7.315,7.315c0.878,0.878,0.878,2.317,0,3.194l-0.801,0.8c-0.878,0.879-2.316,0.879-3.195,0l-9.586-9.587  C7.229,17.252,7.02,16.62,7.054,16C7.02,15.38,7.229,14.748,7.701,14.276z" fill="#fff"/></svg>
</div>

<div class="right-i" onclick="ScrollByLeft()">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24.291,14.276L14.705,4.69c-0.878-0.878-2.317-0.878-3.195,0l-0.8,0.8c-0.878,0.877-0.878,2.316,0,3.194  L18.024,16l-7.315,7.315c-0.878,0.878-0.878,2.317,0,3.194l0.8,0.8c0.878,0.879,2.317,0.879,3.195,0l9.586-9.587  c0.472-0.471,0.682-1.103,0.647-1.723C24.973,15.38,24.763,14.748,24.291,14.276z" fill="#fff"/></svg>
</div>

<?php } ?>

<div class="video-a" id="scroll">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
$animels2 = DBRead( 'series', "WHERE id and tipo > 1 ORDER BY id DESC LIMIT 40" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>

<div class="video" id="click76<?php echo $animel['id']; ?>">
<img src="<?php echo $animel['foto']; ?>" class="focus"/>
</div>

<script>
  $('#click76<?php echo $animel['id']; ?>').click(function(){
	$("#infor1").fadeIn(600);
	$("#infor2").fadeOut(600);
	$("#infor4").fadeOut(600);
	$("#infor3").fadeOut(600);
				$.post('/request.php?serie=<?php echo $animel['id']; ?>&infor=1', function (html) {
				$('#infor1').html(html);
				});
    });
</script>

<?php endforeach;?>

</div>


<div class="conteudo-info" id="infor1">

</div>	










<style>
.video-r{
	margin-left: 0.14vw;
	display: inline-block;
	left: 2.5vw;
	position: relative;
	cursor: pointer;
	box-sizing: border-box;
	webkit-transition: all .54s cubic-bezier(.5,0,.1,1) 0s,opacity .44s cubic-bezier(.5,0,.1,1) .1s;
    -o-transition: all .54s cubic-bezier(.5,0,.1,1) 0s,opacity .44s cubic-bezier(.5,0,.1,1) .1s;
    -moz-transition: all .54s cubic-bezier(.5,0,.1,1) 0s,opacity .44s cubic-bezier(.5,0,.1,1) .1s;
    transition: all .54s cubic-bezier(.5,0,.1,1) 0s,opacity .44s cubic-bezier(.5,0,.1,1) .1s;
	z-index: 1500;

opacity: 1;
}

.video-r .focus{
	height: 25vw;
    width: 19vw;
	position: relative;
}

.video-r:hover{
	transform: scale(1.6);
    margin-left: 71px;
    margin-right: 120px;
    box-shadow: 1px 1px 1px #000;
    left: 30px;
}

.left-i-r{
	float: left;
	height: 25vw;
	width: 2.5vw;
	left: 0.2vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	cursor: pointer;
	z-index: 3000;
	opacity: 0.6;
}

.left-i-r:hover{
	opacity: 1;
}

.left-i-r svg{
	fill: #fff;
	position: absolute;
	top: 10vw;
}

.right-i-r{
	float: right;
	height: 25vw;
	width: 2.5vw;
	right: 0vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	z-index: 3000;
	cursor: pointer;
	opacity: 0.6;
}

.right-i-r:hover{
	opacity: 1;
}

.right-i-r svg{
	fill: #fff;
	position: absolute;
	top: 10vw;
}

</style>
<!-- 
<div class="videos-tab" style="position: relative; top: 2vw;">
<cont>Recomendados pela nossa equipe</cont>
<?php
require 'db.php';
$totaldepost = mysql_query("SELECT * FROM netflix_recomendado WHERE id ");
$totaldepost = mysql_num_rows($totaldepost);
if($totaldepost >= 7){
?>
<div class="left-i-r" onclick="ScrollByRightbaka()">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M7.701,14.276l9.586-9.585c0.879-0.878,2.317-0.878,3.195,0l0.801,0.8c0.878,0.877,0.878,2.316,0,3.194  L13.968,16l7.315,7.315c0.878,0.878,0.878,2.317,0,3.194l-0.801,0.8c-0.878,0.879-2.316,0.879-3.195,0l-9.586-9.587  C7.229,17.252,7.02,16.62,7.054,16C7.02,15.38,7.229,14.748,7.701,14.276z" fill="#fff"/></svg>
</div>

<div class="right-i-r" onclick="ScrollByLeftbaka()">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24.291,14.276L14.705,4.69c-0.878-0.878-2.317-0.878-3.195,0l-0.8,0.8c-0.878,0.877-0.878,2.316,0,3.194  L18.024,16l-7.315,7.315c-0.878,0.878-0.878,2.317,0,3.194l0.8,0.8c0.878,0.879,2.317,0.879,3.195,0l9.586-9.587  c0.472-0.471,0.682-1.103,0.647-1.723C24.973,15.38,24.763,14.748,24.291,14.276z" fill="#fff"/></svg>
</div>

<?php } ?>

<div class="video-a" id="scrollbaka">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
$animel5s2 = DBRead( 'recomendado', "WHERE id ORDER BY id DESC LIMIT 40" );
 if (!$animel5s2)
	echo "";
else 
	foreach ($animel5s2 as $animel5):
 ?>
<?php
$bakaer = $animel5['idserie'];
$animels2 = DBRead( 'series', "WHERE id = '". $bakaer ."' and tipo > 1 ORDER BY id DESC LIMIT 40" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>
 

<div class="video-r" id="clickbaka<?php echo $animel['id']; ?>">
<img src="<?php echo $animel['foto']; ?>" class="focus"/>
</div>




<script>
  $('#clickbaka<?php echo $animel['id']; ?>').click(function(){
	$("#infor").fadeIn(600);
				$.post('/request.php?serie=<?php echo $animel['id']; ?>', function (html) {
				$('#infor').html(html);
				});
    });
</script>





<?php endforeach; endforeach;?>
</div>
 -->





<div class="videos-tab" style="position: relative; top: 2vw;">
<cont>Filmes</cont>
<style>
.videos-tab{
	width: 100%;
	height: 13vw;
}
.video-a{
	position: relative;
	height: 13vw;
	overflow: hidden;
	display: flex;
	-webkit-transition: all 1s; /* Safari */
    transition: all 1s;
}
.video{
	margin-left: 0.14vw;
	display: inline-block;
	left: 2.5vw;
	top: 2.5vw;
	position: relative;
	cursor: pointer;
	box-sizing: border-box;
	webkit-transition: all .54s cubic-bezier(.5,0,.1,1) 0s,opacity .44s cubic-bezier(.5,0,.1,1) .1s;
    -o-transition: all .54s cubic-bezier(.5,0,.1,1) 0s,opacity .44s cubic-bezier(.5,0,.1,1) .1s;
    -moz-transition: all .54s cubic-bezier(.5,0,.1,1) 0s,opacity .44s cubic-bezier(.5,0,.1,1) .1s;
    transition: all .54s cubic-bezier(.5,0,.1,1) 0s,opacity .44s cubic-bezier(.5,0,.1,1) .1s;
	z-index: 1500;
	opacity: 1;
}

.video .focus{
	height: 9vw;
    width: 16vw;
	position: relative;
}

.video:hover{
	transform: scale(1.3);
   	margin-left: 4vw;
    margin-right: 2vw;
    left: 30px;
}


.left-i{
	float: left;
	height: 9vw;
	width: 2.5vw;
	left: 0.2vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	cursor: pointer;
	z-index: 3000;
}

.left-i svg{
	fill: #fff;
	position: absolute;
	top: 3vw;
}

.right-i{
	float: right;
	height: 9vw;
	width: 2.5vw;
	right: 0vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	z-index: 3000;
	cursor: pointer;
}

.right-i svg{
	fill: #fff;
	position: absolute;
	top: 3vw;
}

.shiftLeft { 
  transform: translate3d(-40px, 0, 0);
}

.shiftRight { 
  transform: translate3d(40px, 0, 0);
}

#scroll{
	transition:all 0.3s ease;
}
</style>
<?php
require 'db.php';
$totaldepost = mysql_query("SELECT * FROM netflix_series WHERE id and tipo = 1 ");
$totaldepost = mysql_num_rows($totaldepost);
if($totaldepost >= 7){
?>
<div class="left-i" onclick="ScrollByRight88()">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M7.701,14.276l9.586-9.585c0.879-0.878,2.317-0.878,3.195,0l0.801,0.8c0.878,0.877,0.878,2.316,0,3.194  L13.968,16l7.315,7.315c0.878,0.878,0.878,2.317,0,3.194l-0.801,0.8c-0.878,0.879-2.316,0.879-3.195,0l-9.586-9.587  C7.229,17.252,7.02,16.62,7.054,16C7.02,15.38,7.229,14.748,7.701,14.276z" fill="#fff"/></svg>
</div>

<div class="right-i" onclick="ScrollByLeft88()">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24.291,14.276L14.705,4.69c-0.878-0.878-2.317-0.878-3.195,0l-0.8,0.8c-0.878,0.877-0.878,2.316,0,3.194  L18.024,16l-7.315,7.315c-0.878,0.878-0.878,2.317,0,3.194l0.8,0.8c0.878,0.879,2.317,0.879,3.195,0l9.586-9.587  c0.472-0.471,0.682-1.103,0.647-1.723C24.973,15.38,24.763,14.748,24.291,14.276z" fill="#fff"/></svg>
</div>

<?php } ?>

<div class="video-a" id="scroll88">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
$animels2 = DBRead( 'series', "WHERE id and tipo = 1 ORDER BY id DESC LIMIT 40" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>

<div class="video" id="click0001<?php echo $animel['id']; ?>">
<img src="<?php echo $animel['foto']; ?>" class="focus"/>
</div>

<script>
  $('#click0001<?php echo $animel['id']; ?>').click(function(){
	$("#infor2").fadeIn(600);
	$("#infor4").fadeOut(600);
	$("#infor1").fadeOut(600);
	$("#infor3").fadeOut(600);
				$.post('/request.php?serie=<?php echo $animel['id']; ?>&infor=2', function (html) {
				$('#infor2').html(html);
				});
    });
</script>

<?php endforeach;?>
</div>
<div class="conteudo-info" id="infor2">

</div>






<?php
$animels52 = DBRead( 'history', "WHERE id and idpeople = '". $user['id'] ."' and perfil = '". $perfil['id'] ."'ORDER BY id ASC LIMIT 1" );
 if (!$animels52)
	echo "";
else 
	foreach ($animels52 as $animel5):
 ?>




<?php
$videoh = $animel5['idserie'];
$animelbs2 = DBRead( 'series', "WHERE id = '". $videoh ."' ORDER BY id ASC LIMIT 1" );
 if (!$animelbs2)
	echo "";
else 
	foreach ($animelbs2 as $animelb):
 ?>
<div class="videos-tab" style="position: relative; top: 2vw;">
<cont>Porque você assistiu <?php echo $animelb['name'];  ?></cont>
<style>
.videos-tab{
	width: 100%;
}
.video-a{
	position: relative;
	height: 13vw;
	overflow: hidden;
	display: flex;
	-webkit-transition: all 1s; /* Safari */
    transition: all 1s;
}

.video:hover{
	-ms-transform: scale(1.3, 1.3); /* IE 9 */
    -webkit-transform: scale(1.3, 1.3); /* Safari */
    transform: scale(1.3, 1.3);
	position: relative;
	z-index: 2500;
	opacity: 1;
}


.left-i{
	float: left;
	height: 9vw;
	width: 2.5vw;
	left: 0.2vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	cursor: pointer;
	z-index: 3000;
}

.left-i svg{
	fill: #fff;
	position: absolute;
	top: 3vw;
}

.right-i{
	float: right;
	height: 9vw;
	width: 2.5vw;
	right: 0vw;
	background: rgba(0,0,0,.50);
	position: absolute;
	z-index: 3000;
	cursor: pointer;
}

.right-i svg{
	fill: #fff;
	position: absolute;
	top: 3vw;
}

.shiftLeft { 
  transform: translate3d(-40px, 0, 0);
}

.shiftRight { 
  transform: translate3d(40px, 0, 0);
}

#scroll{
	transition:all 0.3s ease;
}
</style>
<?php
require 'db.php';
$totaldepost = mysql_query("SELECT * FROM netflix_series WHERE id <> '". $batata ."' ");
$totaldepost = mysql_num_rows($totaldepost);
if($totaldepost >= 7){
?>
<div class="left-i" onclick="ScrollByRight7()">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M7.701,14.276l9.586-9.585c0.879-0.878,2.317-0.878,3.195,0l0.801,0.8c0.878,0.877,0.878,2.316,0,3.194  L13.968,16l7.315,7.315c0.878,0.878,0.878,2.317,0,3.194l-0.801,0.8c-0.878,0.879-2.316,0.879-3.195,0l-9.586-9.587  C7.229,17.252,7.02,16.62,7.054,16C7.02,15.38,7.229,14.748,7.701,14.276z" fill="#fff"/></svg>
</div>

<div class="right-i" onclick="ScrollByLeft7()">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24.291,14.276L14.705,4.69c-0.878-0.878-2.317-0.878-3.195,0l-0.8,0.8c-0.878,0.877-0.878,2.316,0,3.194  L18.024,16l-7.315,7.315c-0.878,0.878-0.878,2.317,0,3.194l0.8,0.8c0.878,0.879,2.317,0.879,3.195,0l9.586-9.587  c0.472-0.471,0.682-1.103,0.647-1.723C24.973,15.38,24.763,14.748,24.291,14.276z" fill="#fff"/></svg>
</div>

<?php } ?>

<div class="video-a" id="scroll7">

<?php
$batata = $animelb['id'];
$animels2 = DBRead( 'series', "WHERE id <> '". $batata ."' ORDER BY id ASC LIMIT 9" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>

<div class="video" id="click6<?php echo $animel['id']; ?>">
<img src="<?php echo $animel['foto']; ?>" class="focus"/>
</div>



<script>
  $('#click6<?php echo $animel['id']; ?>').click(function(){
	$("#infor4").fadeIn(600);
	$("#infor2").fadeOut(600);
	$("#infor1").fadeOut(600);
	$("#infor3").fadeOut(600);
				$.post('/request.php?serie=<?php echo $animel['id']; ?>&infor=4', function (html) {
				$('#infor4').html(html);
				});
    });
</script>





<?php endforeach;?>
</div>


<?php endforeach; endforeach;?>


<div class="conteudo-info" id="infor4">

</div>










</div>


<style>

.conteudo-info{
	width: 100%;
	position: relative;
	height: 500px;
	background: #000;
	top: -1.2vw;
	display: none;
	color: #fff;
	z-index: 10000000000;
	left: 0;
}

.informa h1{
	margin-left: 2vw;
	font-size: 2.2vw;
}

.informa .desct{
	width: 35vw;
	padding-left: 2vw;
	z-index: 50;
}

.baixo-desc{
	width: 100%;
	position: absolute;
	bottom: 0;
	height: 3vw;
	background: rgba(0,0,0,.50);
	z-index: 10000000000000000;
}

.feels{
	width: 9vw;
	position: relative;
	top: 1.3vw;
	text-align: center;
	display: inline-block;
	margin-left: 2vw;
	cursor: pointer;
	z-index: 50;
}

.feels:hover{
	border-bottom: 0.2vw solid #5e09e5;
}

.feels-ativo{
	border-bottom: 0.2vw solid #5e09e5;
}

.close{
		float: right;
		right: 1vw;
		top: 1vw;
		position: relative;
	 	width: 2vw;
		height: 2vw;
		cursor: pointer;
		padding: 0.3vw;
		z-index: 1250;
	}

	.close:hover{
		background: rgba(0,0,0,.50);
	}

	.close svg{
		fill: #fff;
	}
</style>


<script type="text/javascript" src="assets/info/js/mod_xhr.js"></script>
<script type="text/javascript" src="assets/info/js/info.js"></script>


<div style="padding-bottom: 3vw;"></div>

</div>

<script>
 function ScrollByLeft() {
	document.getElementById("scroll").scrollBy(1500, 0);
}
function ScrollByRight() {
	document.getElementById("scroll").scrollBy(-1500, 0);
}

function ScrollLeft() {
	document.getElementById("scroll").scrollLeft=1500;
}
function ScrollRight() {
	document.getElementById("scroll").scrollLeft=-1500;
}



function ScrollByLeftbaka() {
	document.getElementById("scrollbaka").scrollBy(1500, 0);
}
function ScrollByRightbaka() {
	document.getElementById("scrollbaka").scrollBy(-1500, 0);
}

function ScrollLeftbaka() {
	document.getElementById("scrollbaka").scrollLeft=1500;
}
function ScrollRightbaka() {
	document.getElementById("scrollbaka").scrollLeft=-1500;
}







function ScrollByLeft2() {
	document.getElementById("scroll2").scrollBy(1500, 0);
}
function ScrollByRight2() {
	document.getElementById("scroll2").scrollBy(-1500, 0);
}

function ScrollLeft() {
	document.getElementById("scroll2").scrollLeft=1500;
}
function ScrollRight() {
	document.getElementById("scroll2").scrollLeft=-1500;
}


function ScrollByLeft88() {
	document.getElementById("scroll88").scrollBy(1500, 0);
}
function ScrollByRight88() {
	document.getElementById("scroll88").scrollBy(-1500, 0);
}

function ScrollLeft() {
	document.getElementById("scroll88").scrollLeft=1500;
}
function ScrollRight() {
	document.getElementById("scroll88").scrollLeft=-1500;
}


function ScrollByLeft5() {
	document.getElementById("scroll5").scrollBy(1500, 0);
}
function ScrollByRight5() {
	document.getElementById("scroll5").scrollBy(-1500, 0);
}

function ScrollLeft() {
	document.getElementById("scroll5").scrollLeft=1500;
}
function ScrollRight() {
	document.getElementById("scroll5").scrollLeft=-1500;
}

function ScrollByLeft7() {
	document.getElementById("scroll7").scrollBy(1500, 0);
}
function ScrollByRight7() {
	document.getElementById("scroll7").scrollBy(-1500, 0);
}

function ScrollLeft() {
	document.getElementById("scroll7").scrollLeft=1500;
}
function ScrollRight() {
	document.getElementById("scroll7").scrollLeft=-1500;
}


</script>

</body>
<?php } } ?>


<?php } else {?>

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

     <?php } ?>
</html>