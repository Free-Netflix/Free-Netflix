<!--Obrigado por usar nossa plataforma <3 -->
<!-- Criado por Luiz e Alexandre com todo carinho para vocês -->
<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?><?php
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

<head>
<title>
<?php
ob_start();
if(empty($_COOKIE['iduser']) and (empty($_COOKIE['inisession']))){
    echo '404 NOT FOUND';
}

if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
	
	if(empty($_COOKIE['usuario'])){
		echo 'Change Profile';
	}
	else{
		echo 'Wooby Configurando perfil';
	}
}
?>
</title>
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

body{
    background: #141414;
}

.header-1{
    width: 100%;
    height: 4vw;
    background: #000;
}

.header-1 .logo{
		height: 3vw;
		margin-top: 0.5vw;
		margin-left: 5vw;
		opacity: .8;
		cursor: pointer;
	}

    .header-1 .logo:hover{
        opacity: 1;
    }


.tabs{
    height: 100%;
    width: 4vw;
    position: fixed;
    background: #313131;
    left: 0;
    box-shadow: 0.1vw 0.1vw 0.1vw #000;
}

.tabs button{
    display: flex;
    border: none;
    width: 3.2vw;
    height: 3.2vw;
    border-radius: 50%;
    position: relative;
    left: 0.5vw;
    margin-top: 0.5vw;
    cursor: pointer;
    background: #000;
}

.tabs button:hover{
    background: #4706af;
}

.tabs button svg{
    height: 2vw;
    width: 2vw;
    position: relative;
    left: 0.6vw;
    fill: #fff;
}
</style>

<?php
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){?>
<html>

<body>

<div class="tabs">

<button>
<svg id="Layer_1" style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M22.279,9.118l-1.653-0.191c-0.12-0.355-0.156-0.707-0.328-1.055l1.244-1.459c0.601-0.737,0.574-1.799-0.098-2.471  l-1.024-1.038c-0.672-0.673-1.728-0.727-2.464-0.125L16.5,3.968c-0.335-0.166-0.686-0.312-1.053-0.437l-0.19-1.623  C15.16,0.963,14.372,0.5,13.422,0.5h-1.468c-0.95,0-1.74,0.463-1.836,1.409L9.927,3.656C9.572,3.775,9.22,3.859,8.872,4.031  L7.413,2.81C6.677,2.209,5.614,2.247,4.942,2.92L3.904,3.95C3.232,4.622,3.178,5.68,3.779,6.417l1.189,1.457  C4.801,8.209,4.655,8.561,4.531,8.928l-2.123,0.19C1.463,9.214,0.5,10.003,0.5,10.953v1.468c0,0.95,0.963,1.74,1.909,1.836  l1.997,0.191c0.12,0.355,0.328,0.707,0.5,1.055l-1.158,1.459c-0.601,0.737-0.531,1.799,0.141,2.471l1.046,1.038  c0.672,0.672,1.738,0.726,2.475,0.125l1.46-1.189c0.335,0.166,0.689,0.312,1.056,0.437l0.191,1.935  c0.096,0.945,0.886,1.721,1.836,1.721h1.468c0.95,0,1.74-0.776,1.836-1.721l0.191-1.903c0.355-0.12,0.707-0.281,1.055-0.453  l1.459,1.181c0.736,0.6,1.799,0.544,2.471-0.129l1.038-1.04c0.672-0.672,0.726-1.735,0.125-2.472l-1.189-1.459  c0.166-0.335,0.312-0.688,0.437-1.055l1.435-0.191c0.945-0.096,1.221-0.886,1.221-1.836v-1.468  C23.5,10.003,23.224,9.214,22.279,9.118z M22.5,12.422c0,0.317,0.085,0.58-0.23,0.612l-2.116,0.232  c-0.19,0.019-0.279,0.127-0.38,0.289c-0.035,0.056-0.019,0.116-0.034,0.179c-0.162,0.554-0.357,1.072-0.622,1.541  c-0.125,0.22-0.091,0.495,0.069,0.691l1.452,1.775c0.2,0.246,0.185,0.6-0.039,0.824l-1.037,1.038  c-0.224,0.224-0.578,0.242-0.823,0.042l-1.774-1.447c-0.153-0.126-0.358-0.167-0.549-0.116c-0.057,0.015-0.111,0.039-0.161,0.069  c-0.506,0.277-1.024,0.49-1.542,0.634c-0.244,0.068-0.421,0.278-0.447,0.53l-0.232,2.455c-0.032,0.315-0.295,0.731-0.612,0.731  h-1.468c-0.317,0-0.58-0.415-0.612-0.73l-0.232-2.366c-0.019-0.19-0.127-0.404-0.289-0.505c-0.056-0.035-0.116-0.082-0.179-0.097  c-0.554-0.162-1.072-0.389-1.541-0.653c-0.22-0.125-0.495-0.107-0.691,0.053l-1.775,1.444c-0.246,0.201-0.6,0.181-0.824-0.043  l-1.038-1.039c-0.224-0.224-0.242-0.579-0.042-0.824l1.447-1.775c0.125-0.153,0.168-0.358,0.116-0.55  c-0.015-0.057-0.039-0.111-0.069-0.161c-0.277-0.506-0.49-1.024-0.634-1.542c-0.068-0.244-0.278-0.421-0.53-0.447l-2.642-0.232  C2.103,13.002,1.5,12.738,1.5,12.422v-1.468c0-0.317,0.603-0.58,0.918-0.612l2.46-0.232c0.19-0.019,0.451-0.126,0.552-0.287  c0.038-0.061,0.11-0.126,0.124-0.195c0.161-0.548,0.399-1.061,0.661-1.526c0.125-0.22,0.113-0.495-0.047-0.691L4.727,5.636  c-0.2-0.246-0.179-0.6,0.045-0.824l1.039-1.038C6.035,3.55,6.389,3.532,6.635,3.732L8.41,5.179c0.154,0.126,0.359,0.168,0.55,0.116  c0.057-0.015,0.111-0.039,0.161-0.069c0.506-0.277,1.024-0.49,1.542-0.634c0.244-0.068,0.421-0.278,0.447-0.53l0.232-2.142  C11.373,1.603,11.637,1.5,11.953,1.5h1.468c0.317,0,0.58,0.103,0.612,0.418l0.232,2.21c0.019,0.19,0.127,0.326,0.289,0.426  c0.056,0.035,0.116,0.043,0.179,0.058c0.554,0.162,1.072,0.369,1.541,0.634c0.22,0.125,0.494,0.097,0.691-0.063l1.775-1.449  c0.246-0.2,0.6-0.183,0.824,0.041l1.038,1.038c0.224,0.224,0.242,0.578,0.042,0.824l-1.447,1.774  c-0.125,0.153-0.168,0.358-0.116,0.55c0.015,0.057,0.039,0.111,0.069,0.161c0.277,0.506,0.49,1.024,0.634,1.542  c0.068,0.244,0.278,0.421,0.53,0.447l1.955,0.232c0.315,0.032,0.231,0.295,0.231,0.612V12.422z"/><path d="M12.688,7.382c-2.374,0-4.306,1.932-4.306,4.306s1.932,4.306,4.306,4.306s4.306-1.932,4.306-4.306  S15.062,7.382,12.688,7.382z M12.688,14.763c-1.696,0-3.076-1.38-3.076-3.076s1.38-3.076,3.076-3.076s3.076,1.38,3.076,3.076  S14.383,14.763,12.688,14.763z"/></svg>
</button>

<button>
<svg enable-background="new 0 0 24 24" id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M16.5,14c-1.5,0-2.7,0.4-3.6,0.9c1.4,1.2,2,2.6,2.1,2.7l0.1,0.2V20h8v-2C23,18,21.4,14,16.5,14z"/></g><g><circle cx="16.5" cy="8.5" r="3.5"/></g></g><g><path d="M4,8.5C4,6.6,5.6,5,7.5,5S11,6.6,11,8.5c0,1.9-1.6,3.5-3.5,3.5S4,10.4,4,8.5z M7.5,14C2.6,14,1,18,1,18v2h13v-2   C14,18,12.4,14,7.5,14z"/></g></svg></button>
</button>

<button>
<svg enable-background="new 0 0 512 512" height="512px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="288,224 288,128 224,128 224,288 352,288 352,224 "/><path d="M256,0C114.625,0,0,114.625,0,256s114.625,256,256,256s256-114.625,256-256S397.375,0,256,0z M256,448  c-106.031,0-192-85.969-192-192S149.969,64,256,64c106.03,0,192,85.969,192,192S362.031,448,256,448z"/></svg>
</button>

</div>

<div class="header-1">
<a href="/">
<img src="/static/logo.png" class="logo"/>
</a>
</div>

<style>
.pagar{
	background: #000;
	width: 45vw;
	height: 18vw;
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
<h1>Editando perfil</h1>
<form class="editar" method="post">
    <input type="text" name="first_name" value="" id="name" placeholder="Nome"  />
    <input type="text" name="last_name" value="" id="sobname" placeholder="Sobrenome" />
    <input type="text" name="last_name" value="" id="username" placeholder="Nome de usuario" />
    <center><input class="pagare" type="submit" name="submit" value="Concluir" id="concluido"/></center>
</form>
</div>

<div id="resposta">

</div>
<style>
#resposta{
    width: 45vw;
    color: red;
    position: relative;
    top: 8vw;
    margin: 0px auto;
    text-align: center;
    border-radius: 0.3vw;
    font-size: 1.5vw;
    background: #000;
    height: auto;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#concluido").click(function() {
        var name = $("#name");
        var namePost = name.val();
		var sobname = $("#sobname");
        var sobnamePost = sobname.val();
        var username = $("#username");
        var usernamePost = username.val();
        $.post("/configurandop.php?config1=<?Php echo $user['idcry']; ?>", {name: namePost,sobname: sobnamePost,username: usernamePost,},
        function(data){
         $("#resposta").html(data);
         }
         , "html");
         return false;
    });
});
</script>

</body>

</html>
<?php } ?>