

<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?>
<?php
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
	
	
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
			echo '<script>location.href="dashboard.php";</script>';	
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
    <head>
<title><?php  if($user['admin'] == 1){ echo 'Administrator CPANEL'; } else{ echo '404 not found';}?></title>
<link rel="stylesheet" type="text/css" href="/css/pace.css"/>
<link rel="shortcut icon" href="/static/ico/default.ico"/>
</head>
    <?php
     if($user['admin'] == 1){
    ?>
    <html>
        <body>
        <div class="birl" style="background-image: url(/static/back-ad.jpg); background-size: cover; position: fixed; width: 100%; height: 100%;"></div>
        <div class="birl2" style="background: rgba(0,0,0,.50); width: 100%; height: 100%; position: fixed;"></div>
        <style>

        a{
            color: #000;
            text-decoration: none;
        }

        *{
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
            outline: none;
            list-style:none;
        }

        .panel{
            position: relative;
            width: 70%;
            height: 80%;
            <?php if($_GET['action'] == adicionarf){ ?>
            height: 88%;
            <?php }else{ ?>
                height: 80%;
            <?php } ?>
            margin: 0px auto;
            background: #fff;
            top: 10%;
            box-shadow: 1px 1px 1px #000;
        }

        .left-panel{
            width: 25%;
            background: #e5e5e5;
            height: 100%;
            float: left;
            box-shadow: 2px 1px 3px rgba(0,0,0,.50);
        }

        .top-panel-left{
            color: #151515;
            text-align: center;
            font-size: 1.5vw;
        }

        .opa{
            width: 100%;
            text-align: center;
            height: 1.5vw;
            font-size: 1.3vw;
            margin-top: 0.3vw;
            cursor: pointer;
            padding: 0.01vw;
        }

        .opa:hover{
            background: #141414;
            color: #fff;
        }

        .ativo{
            background: #141414;
            color: #fff;
        }
        </style>
        <div class="panel">

        <div class="left-panel">

        <div class="top-panel-left">
            <span style="position: relative; top: 0.9vw;">PAINEL ADMINISTRATIVO</span>
        </div>
        <br>
        <hr>

        <a href="admin.php?action=user&iduser=<?php echo $user['idcry'] ?>">
        <li class="opa <?php if($_GET['action'] == user){ echo "ativo"; }else if($_GET['action'] == uts ){ echo "ativo";}else{ echo ''; } ?>">
        Usuarios
        </li>
        </a>

        <a href="admin.php?action=filme&iduser=<?php echo $user['idcry'] ?>">
        <li class="opa <?php if($_GET['action'] == filme){ echo "ativo"; }else if($_GET['action'] == adicionarf){ echo "ativo"; }else if($_GET['action'] == adicionarep){ echo "ativo"; }else{ echo ''; } ?>">
        Filmes/Anime
        </li>
        </a>


        <p style="bottom: 0.5vw; position: absolute;left: 2vw; font-size: 1.2vw;">Site criado por <a style="color: red;" href="https://facebook.com/imxandeco"> Alexandre </a></p>

        </div>

<style>
.right-panel{
    float: right;
    width: 75%;
    height: 100%;
    background: #141414;
    right: 0;
	overflow-y: auto;
	overflow-x: hidden;
}

.baka{
    width: 100%;
    text-align : center;
    position: relative;
    top: 2vw;
    color: #fff;
    cursor: pointer;
    height: 1.8vw;
    font-size: 1.5vw;
}

.baka:hover{
    background: #fff;
    color: #000;
}

.editar-p{
    color: blue;
}

.editar-p:hover{
    color: red;
}
</style>

    
    <div class="right-panel">
    <?php if($_GET['action'] == user){ ?>
    <h1 style="color: #fff; font-size: 1.9vw; text-align: center; position: relative; top: 1vw;">
    Usuarios do site
    </h1>
    <?php
$peoples = DBRead( 'user', "WHERE id  ORDER BY id DESC LIMIT 100" );
if (!$peoples)
echo '';	
else  
	foreach ($peoples as $people):	 
?>
    <li class="baka">
        <p> <?php echo $people['email'];?> | <?php if($people['admin'] == 1){ echo 'Admin'; } else{ echo 'Membro'; } ?></p> <a class="editar-p"href="admin.php?action=uts&iduser=<?php echo $user['idcry'] ?>&usuarios=<?php echo $people['id']; ?>"><p style="float: right; position: absolute; top: 0; right: 2vw;">Editar</p></a>
    </li>
    <?php endforeach; ?>

    <?php } else  if($_GET['action'] == filme){ ?>
    <h1 style="color: #fff; font-size: 1.9vw; text-align: center; position: relative; top: 1vw;">
    Animes do site  
    </h1>

<style>
.adds{
    width: 13vw;
    position: relative;
    height: 2.5vw;
    border: none;
    background: red;
    color: #fff;
    top: 2vw;
    font-size: 1vw;
    cursor: pointer;
}
</style>
<center>
<a href="admin.php?action=adicionarf"><button class="adds">Adicionar Anime</button></a>
<a href="admin.php?action=adicionarep"><button class="adds">Adicionar episodio</button></a>


<?php
$peoples = DBRead( 'series', "WHERE id  ORDER BY id DESC LIMIT 100" );
if (!$peoples)
echo '';	
else  
	foreach ($peoples as $people):	 
?>
    <li class="baka" id="baka<?php echo $people['id']; ?>" style="margin-top: 0.5vw; top: 3vw;">
        <p> <?php echo $people['name'];?> 
        <a style="color: blue;float: right; position: relative; right: 2vw;" id="deletar<?Php echo $people['id']; ?>">Deletar</a>
        </p>
    </li>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script>
$(document).ready(function() {
    $("#deletar<?Php echo $people['id']; ?>").click(function() {
        var idPost = <?php echo $people['id']; ?>;
        $.post("/batata.php?id=<?php echo $people['id']; ?>", {id: idPost},
        function(data){
         $("#resposta").html(data);
         }
         , "html");
		 $("#baka<?php echo $people['id']; ?>").fadeOut(600);
         return false;
    });
});
</script>
    <?php endforeach; ?>




</center>
    <?php } else  if($_GET['action'] == configw){?>
    <h1 style="color: #fff; font-size: 1.9vw; text-align: center; position: relative; top: 1vw;">
    Configuração do site
    </h1>
    <?php }  else  if($_GET['action'] == uts){?>
        <?php
$useredit = $_GET['usuarios'];
$peoples = DBRead( 'user', "WHERE id = '".$useredit."' ORDER BY id DESC LIMIT 100" );
if (!$peoples)
echo '';	
else  
	foreach ($peoples as $people):	 
?>
    <h1 style="color: #fff; font-size: 1.9vw; text-align: center; position: relative; top: 1vw;">
    Editando <?php echo $people['email']; ?>
    </h1>
        <style>
        .baka-input{
            width: 50%;
            border: none;
            height: 2.5vw;
            margin-top: 2vw;
            padding-left: 1vw;
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
    <center>
    <input class="baka-input" type="text" placeholder="Email" value="<?php echo $people['email']; ?>"/>
    <input class="baka-input" type="text" placeholder="Senha nova" value=""/>

    <select name="listue" class="baka-input">
  <option value="0">Usuario</option>
  <option value="1">Administrador</option>
</select>

<select name="banidolist" class="baka-input">
  <option value="0">Desbanido</option>
  <option value="1">Banido</option>
</select>
<select name="expirado" class="baka-input">
  <option value="<?php echo $people['expirado'] ?>"><?PHP echo date('Y-m-d H:i:s', strtotime('+43800 min')); ?> (Acrescentar mais 1 mês)</option>
  <option value="1"><?PHP echo date('Y-m-d H:i:s', strtotime('-43800 min')); ?> (Expirar licensa)</option>
</select>

<button class="config-btn" id="concluido">Concluido</button>
    
    </center>

    <?php endforeach; ?>
    <?php } else  if($_GET['action'] == adicionarf){ ?>
        <style>
        .baka-input{
            width: 50%;
            border: none;
            height: 2.5vw;
            margin-top: 2vw;
            padding-left: 1vw;
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
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                box-shadow: 0 1px 1px rgba(0,0,0,.25);
                color: #fff;
                width: 30vw;
                background: #e50914;
                font-size: 1.5vw;
				top: 2vw;
            }
        </style>
        <h1 style="color: #fff; font-size: 1.9vw; text-align: center; position: relative; top: 1vw;">
        Adicionando Anime
        </h1>
        <center>
        <form method="post">
        <select name="banidolist" id="tipo" class="baka-input">
		<option value="1">Anime Filme</option>
          <option value="2">Anime</option>
        </select>
        <input class="baka-input" type="text" id="names" placeholder="Nome" value=""/>

        <input class="baka-input" type="text" id="capa" placeholder="Capa" value=""/>

        <input class="baka-input" type="text" id="background" placeholder="Background" value=""/>

        <input class="baka-input" type="text" id="logo" placeholder="Logo" value=""/>

        <textarea id="descrpt" style="padding: 1vw; height: 8vw;resize: none;" class="baka-input" type="text" placeholder="Descrição" value=""/></textarea>
        
        <button class="config-btn" id="addtp">
        Adicionar
        </button>

        <div id="resposta">
        </div>
    
        </form>
<style>
        #resposta{
    width: 100%;
    color: red;
    position: fixed;
    top: 0vw;
    height: auto;
    margin: 0px auto;
    text-align: center;
    border-radius: 0.3vw;
    font-size: 1.5vw;
    left: 0;
    background: #000;
}

</style>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#addtp").click(function() {
        var tipo = $("#tipo");
        var tipoPost = tipo.val();
        var names = $("#names");
        var namesPost = names.val();
        var capa = $("#capa");
        var capaPost = capa.val();
        var background = $("#background");
        var backgroundPost = background.val();
        var descrpt = $("#descrpt");
        var descrptPost = descrpt.val();
        var logo = $("#logo");
        var logoPost = logo.val();
        $.post("addsa.php", {tipo: tipoPost, names: namesPost, capa: capaPost, background: backgroundPost, descrpt: descrptPost, logo: logoPost},
        function(data){
         $("#resposta").html(data);
         }
         , "html");
         return false;
    });
});
</script>

        </center>

    <?php } else  if($_GET['action'] == adicionarep){  ?>
        <style>
        .baka-input{
            width: 50%;
            border: none;
            height: 2.5vw;
            margin-top: 2vw;
            padding-left: 1vw;
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
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,.25);
                box-shadow: 0 1px 1px rgba(0,0,0,.25);
                color: #fff;
                width: 30vw;
                background: #e50914;
                font-size: 1.5vw;
				top: 2vw;
            }
        </style>
        <h1 style="color: #fff; font-size: 1.9vw; text-align: center; position: relative; top: 1vw;">
       Adicionando episodio
        </h1>
        <center>
        <form method="post">
        <select id="tiposa" class="baka-input">
        <?php
$animels2 = DBRead( 'series', "WHERE id and tipo > 0 ORDER BY id DESC" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>
         <option value="<?php echo $animel['id']; ?>"><?php echo $animel['name']; ?></option>
         <?php endforeach ; ?>
        </select>
        <input class="baka-input" type="text" id="ep" placeholder="Episodio" />

        <input class="baka-input" type="text" id="mp4" placeholder="Vídeo MP4 link"/>


        <button class="config-btn" id="addts">
        Adicionar
        </button>
    </form> 
    <div id="resposta">
        </div>
    
<style>
        #resposta{
    width: 100%;
    color: red;
    position: fixed;
    top: 0vw;
    height: auto;
    margin: 0px auto;
    text-align: center;
    border-radius: 0.3vw;
    font-size: 1.5vw;
    left: 0;
    background: #000;
}

</style>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#addts").click(function() {
        var tiposa = $("#tiposa");
        var tiposaPost = tiposa.val();
        var ep = $("#ep");
        var epPost = ep.val();
        var mp4 = $("#mp4");
        var mp4Post = mp4.val();
        $.post("addsb.php", {tiposa: tiposaPost,ep: epPost, mp4: mp4Post},
        function(data){
         $("#resposta").html(data);
         }
         , "html");
         return false;
    });
});
</script>


        </center>
    <?php } else{?>

    <h1 style="color: #fff; font-size: 1.9vw; text-align: center; position: relative; top: 1vw;">
        Wooby Administrator
    </h1>
        <center>
    <img style="width: 10vw; width: 10vw; position: relative; top: 2vw; border-radius: 50%;" src="https://scontent.ffln4-1.fna.fbcdn.net/v/t1.0-9/23722498_304421860043610_2487643949019415175_n.jpg?oh=fe2e350ef8d58f90edeb1a1641c59ff0&oe=5A8DF606"/>
        </center>
    <?php } ?>
    </div>


        </div>

        </body>
    </html>
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
	 <script type="text/javascript" src="/js/pace.min.js"></script>