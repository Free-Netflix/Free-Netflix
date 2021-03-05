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
			echo '<script>location.href="browser.php";</script>';	
			}
			
			
	if(isset($_COOKIE['usuario'])){
		$idperfil = DBEscape( strip_tags(trim($_COOKIE['usuario']) ) );
		$perfil = DBRead('profiles', "WHERE id = '{$idperfil}' LIMIT 1 ");

		if($perfil){
			$perfil = $perfil[0];
			}else{
			echo '<script>location.href="account.php?error";</script>';	
			}
			if($perfil['iduser'] <> $user['id']){
				setcookie("iduser" , "");
				setcookie("inisession" , "");
				setcookie("perfil" , "");
				setcookie("usuario" , "");
				header("location: account.php?error");
			}

		
		
	}
	}

	if(empty($_COOKIE['iduser']) and (empty($_COOKIE['inisession']))){
		echo '<script>location.href="account.php";</script>';
	}
	if(empty($_COOKIE['inisession'])){
		echo '<script>location.href="account.php";</script>';
	}
	if(empty($_COOKIE['iduser'])){
		echo '<script>location.href="account.php";</script>';
	}
	if($user['configurado'] == 0){
		echo '<script>location.href="configure.php";</script>';
	}

	?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title><?php
ob_start();
if(empty($_COOKIE['usuario'])){
    echo 'Change Profile';
}
else{
	echo 'Netflix';
}

?></title>

  <link rel="shortcut icon" href="https://assets.nflxext.com/us/ffe/siteui/common/icons/nficon2016.ico"/>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>
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

	.header svg{
		height: 3vw;
		margin-top: 1.1vw;
		margin-left: 3vw;
		opacity: .8;
		cursor: pointer;
	}

	.header svg:hover{
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
		margin-left: -8vw;
		cursor: pointer;
		left: 13.6vw;
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
		width: 70vw;
	}

</style>
<body>


<div class="header">

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 81.387"><g fill="#b81d24"><path d="M256.09 76.212c4.178.405 8.354.84 12.52 1.29l9.198-22.712 8.743 24.807c4.486.562 8.97 1.152 13.44 1.768l-15.328-43.501L299.996 0H287.01l-.135.186-8.283 20.455L271.32.003h-12.822l13.237 37.565-15.644 38.644zM246.393 75.322V0h-12.817v74.265c4.275.33 8.552.684 12.817 1.056M150.113 71.11c3.46 0 6.916.026 10.366.054V43.492h15.397V31.708H160.48v-19.91h17.733V0h-30.6v71.12c.831 0 1.666-.013 2.5-.01M110.319 71.83c4.27-.152 8.544-.28 12.824-.384V11.8h11.98V.003H98.339V11.8h11.982v60.03h-.002zM12.295 79.772V34.897L27.471 77.96c4.667-.524 9.341-1.017 14.028-1.483V.001H29.201v46.483L12.825.001H0v81.384h.077c4.063-.562 8.14-1.096 12.218-1.613M85.98 11.797V.001H55.377V75.202a1100.584 1100.584 0 0 1 30.578-2.211V61.184c-5.916.344-11.82.74-17.71 1.181V43.497h15.397V31.706H68.245V11.797H85.98zM203.614 60.62V-.003h-12.873v71.876c10.24.376 20.44.9 30.606 1.56V61.619c-5.9-.381-11.81-.712-17.733-1"/></g></svg>
</div>

<div class="change-profile center">

<div class="who alc">Quem está assistindo?</div>
<div class="what center">
<?php
$peoples = DBRead( 'profiles', "WHERE id and iduser = '".$user['id']."'  ORDER BY id DESC LIMIT 5" );
if (!$peoples)
echo '';	
else  
	foreach ($peoples as $people):	 
?>
<button style="border:none; background: transparent;" name="people">
<a style="color: transparent" href="swift.php?id=<?php echo $people['id'] ?>&user=<?php echo $user['id']; ?>&what=<?Php echo $user['idcry']; ?>">
<div class="avatar1 people<?Php echo $people['foto'] ?>"></div></a>
</button>
<div class="pessoas"><p class="ava-who"><?php
	$str2 = nl2br( $people['nome'] );
	$len2 = strlen( $str2 );
	$max2 = 13;
   if( $len2 <= $max2 )
   echo $str2;
	else    
   echo substr( $str2, 0, $max2 ) . '...'?></p></div>




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
	<center><button class="ger">GERENCIAR PERFIS</button></center>

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
        $.post("configurando.php?addprofile=<?Php echo $user['idcry']; ?>", {name: namePost,radio: radioPost},
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
                background: #e50914;
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
*{
	font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
	outline: none;
    list-style:none;
}
</style>
<body style="background: #000;">

<?php 
$inicio = $user['datec'];
$expirado = date('Y-m-d', strtotime('+43700 min'));
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
	height: 10vw;
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
	top: 1vw;
	left: 2vw;
}

.error-msg p{
	position: relative;
	top: 1.5vw;
	left: 2vw;
	font-size: 1.1vw;
}

.pagar{
	float: left;
	position: relative;
	width: 15vw;
	height: 2.5vw;
	top: 2vw;
	left: 2vw;
	border: none;
	cursor: pointer;
	-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
	-moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
    box-shadow: 0 1px 1px rgba(0,0,0,.25);
	color: #fff;
    background: #e50914;
	font-size: 1.2vw;
}

.center-error{
	max-width: 50vw;
	height: inherit;
	margin: 0px auto;
}
</style>

<div class="error-msg">

<div class="center-error">
<h1 class="error-h1">Parece que seu mês grátis acabou.</h1>
<p>Para efetuar efetuar pagamento, clique no botão abaixo!</p>

<button class="pagar">Efetuar pagamento</button>
</div>
</div>

<?php } ?>

  <div class="wrapper">
  
<header id="header-new" style="z-index: 1000;">
  <nav>
    <a href="#" id="logo">
      <img src="http://vignette4.wikia.nocookie.net/smurfs/images/a/a1/Netflix-logo.png/revision/latest?cb=20150508223333"/>
    </a>
    
    <div class="left-menu">
      <h5>Procurar<i class="fa fa-caret-down"></i></h5>
    </div><!--left-menu end-->
    <div class="right-menu">
      <h5><i class="fa fa-search"></i>Pesquisa</h5>
      <div class="user">
        <img class="user-img" src="/static/avatar/user<?php echo $perfil['foto'] ?>.png"/>
        <h5><?php echo $perfil['nome'] ?><i class="fa fa-caret-down"></i></h5>
      </div><!--user end-->
    </div><!--right-menu-end-->
  </nav>
  <div class="description">
  <?php
$animels2 = DBRead( 'series', "WHERE id ORDER BY id DESC LIMIT 1" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>
 <style>
  .wrapper header{
    background: -webkit-linear-gradient(0deg, rgba(0, 0, 0, 0.8) 45%, rgba(255, 255, 255, 0)), url("static/videos/<?php echo $animel['fotoback']; ?>") no-repeat center top;
  }
 </style>
    <img class="show-logo" src="static/videos/<?php echo $animel['logo']; ?>"/>
    <p><?php
	$str2 = nl2br( $animel['desct'] );
	$len2 = strlen( $str2 );
	$max2 = 200;
   if( $len2 <= $max2 )
   echo $str2;
	else    
   echo substr( $str2, 0, $max2 ) . '...'?></p>
    <button class="play" style="cursor: pointer;"><i class="fa fa-play"></i> Assistir</button>
    <button class="add" style="cursor: pointer;"><i class="fa fa-plus"></i> Adicionar minha lista</button>
  <?php endforeach; ?>
  </div><!--description end-->
</header>
  <main>
    <section>
      <h3 style="font-size: 22px;">Continuar assistindo como <?php echo $perfil['nome'];  ?></h3>
      <div class="multiple-items">

      <?php
$animels52 = DBRead( 'history', "WHERE id and idpeople = '". $user['id'] ."' and perfil = '". $perfil['id'] ."'ORDER BY id ASC LIMIT 40" );
 if (!$animels52)
	echo '';
else 
	foreach ($animels52 as $animel5):
 ?>
<?php
$videoh = $animel5['idserie'];
$animels2 = DBRead( 'series', "WHERE id = '". $videoh ."' ORDER BY id ASC LIMIT 1" );
 if (!$animels2)
	echo '';
else 
	foreach ($animels2 as $animel):
 ?>
       <img style="cursor: pointer;" src="static/videos/<?php echo $animel['foto']; ?>" id="serie<?php echo $animel['id'] ?>"/>
  <?php endforeach; endforeach;?>
      </div><!--multiple-items-->


      <h3 style="font-size: 22px;">Em alta</h3>
      <div class="multiple-items">
        <img src="https://www.whats-on-netflix.com/wp-content/uploads/2015/11/ftwd-featured.jpg"/>
        <img src="https://pmcdeadline2.files.wordpress.com/2014/06/house-of-cards-seaosn-2__140603234815.jpg"/>
        <img src="http://www.underbellyofsunshine.com/wp-content/uploads/2015/04/Bojack%20Horseman.jpg"/>
        <img src="http://www.themarysue.com/wp-content/uploads/2015/10/maxresdefault5.jpg"/>
        <img src="https://i.ytimg.com/vi/Ymw5uvViqPU/maxresdefault.jpg"/>
        <img src="http://media.comicbook.com/2016/07/daredevil-netflix-190285.jpg"/>
      </div><!--multiple-items-->
      <h3 style="font-size: 22px;">TV Shows</h3>
      <div class="tv-shows">
        <img src="http://cdn.collider.com/wp-content/uploads/2015/10/master-of-none-poster-image.jpg"/>
        <img src="https://oyster.ignimgs.com/wordpress/stg.ign.com/2016/11/netflix-lemony-snicket-unfortunate-eventes-poster.jpg"/>
        <img src="https://dl9fvu4r30qs1.cloudfront.net/db/88/4cee42424bf685282f3cb6c0686a/my-beautiful-broken-mind-poster.jpg"/>
        <img src="http://www.etonline.com/media/photo/2016/10/24277797/1900_Gilmore_Girls_Revival_Fall.jpg"/>
        <img src="http://cdn.collider.com/wp-content/uploads/marco-polo-poster.jpg"/>
        <img src="http://abduzeedo.com/sites/default/files/originals/6f1c7f40664543.5787e03bf042c.jpg"/>
        <img src="http://www.ramascreen.com/wp-content/uploads/2014/07/Hemlock-Grove-season-2-poster1.jpg"/>
        <img src="http://cdn.movieweb.com/img.site/PHfxK9hXDzmVjh_2_l.jpg"/>
        <img src="http://screencrush.com/files/2015/11/preview.jpg"/>
      </div><!--tv-shows end-->
    </section>
  </main>
</div><!--wrapper end-->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js'></script>

    <script  src="js/index.js"></script>

</body>


<?php
$animels52 = DBRead( 'history', "WHERE id and idpeople = '". $user['id'] ."' and perfil = '". $perfil['id'] ."'ORDER BY id ASC LIMIT 40" );
 if (!$animels52)
	echo "";
else 
	foreach ($animels52 as $animel5):
 ?>


<?php
$videoh = $animel5['idserie'];
$animels2 = DBRead( 'series', "WHERE id = '". $videoh ."'  ORDER BY id ASC LIMIT 1" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>
 <p><?php echo $animel['id']; ?></p>
       <script type="text/javascript">
     $('#serie<?php echo $animel['id']; ?>').click(function(){
     location.href="watch.php?id=<?php echo $animel5['idvideo']; ?>";
    });
  </script>
  <?php endforeach; endforeach;?>

<?php } ?>
</html>
