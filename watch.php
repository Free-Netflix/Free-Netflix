<?php
if(isset($_COOKIE['iduser']) ){?>
<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
date_default_timezone_set("America/Sao_Paulo");
if(!isset($_GET['id']) || empty($_GET['id']))
echo '<script>location.href="/";</script>';
else{
$id = DBEscape( strip_tags(trim($_GET['id']) ) );
$video = DBRead('videos', "WHERE id = '{$id}' LIMIT 1 ");
if(!$video)
echo '<script>location.href="/";</script>';
if($video){
$video = $video[0];
$upVisits = array(
'views' => $video['views'] + 1);
DBUpDate( 'videos', $upVisits, "id = '{$id}'" );
}
}
$idwatch = $video['idserie'];
$anime = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 1" );
if(!$anime)
echo '<script>location.href=/";</script>';
else{
$anime = $anime[0];
}

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
		$user = $user[0];
		
		if($user['configurado'] == 0){
			echo '<script>location.href="configure";</script>';
    }
    
    $inicio = $user['datec'];
    $expirado = date('Y-m-d', strtotime('+43700 min'));
    if (strtotime($inicio) >= strtotime($expirado)) {
      setcookie("iduser" , "");
      setcookie("inisession" , "");
      setcookie("usuario" , "");
      header("location: account.php?error");
    }
    
    $viewsadd = array('views' => $anime['views'] + 1);
    DBUpDate( 'series', $viewsadd, "id = '{$anime['id']}'" );
	
	if(empty($_COOKIE['usuario'])){
	echo '<script>location.href="dashboard/error";</script>';
}
}

?>

<?php if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
  if(isset($_COOKIE['usuario'])){
  ?>




<?php 
$dbCheck = DBRead( 'history', "WHERE idserie = '". $anime['id'] ."' and perfil = '".  $_COOKIE['usuario'] ."' " );
if( $dbCheck ){
	$userUP['idvideo'] = $_GET['id'];
  $userUP['ep'] = $video['ep'];
  $userUP['perfil'] = $_COOKIE['usuario'];
    if( DBUpdate( 'history', $userUP, "idserie = '{$anime['id']}'" ) ){
      echo '';
    }
}
else{
	$form2['idpeople'] = $_COOKIE['iduser'];
	$form2['idvideo'] = $_GET['id'];
	$form2['perfil'] = $_COOKIE['usuario'];
  $form2['idserie'] = $anime['id'];
  $form2['ep'] = $video['ep'];
  $form2['progress'] = '0';
  $form2['atualprogress'] = '0';
	if( DBCreate( 'history', $form2 ) ){	
	echo '';
	}
}
?>

<?php } } ?>

<head>
<title>Wooby</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
<meta charset="utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="shortcut icon" href="/static/ico/default.ico"/>
</head>

<html>
<body>


<div id="player2">
<div class="header">
  <a href="
  <?php 
  if(isset($_GET['href'])){
    echo $_GET['href'];
  }
  else{
    echo 'dashboard.php';
  }
  ?>
  ">
<div class="voltar" id="voltar">
<img class="net_back" src="/img/voltar.png"/>
<img class="net_back2" src="/img/voltar_ativo.png"/>


<div class="hover-back">
<img class="seta" src="/img/v.png"/>
<p>Voltar à navegação</p>
</div>
</a>

</div>
</div>
</div>



<div class="todoesephover" id="todoesephover">
<h1 style="left: 200px; position: absolute;color: #fff;">Todos os episodios de <?php echo $anime['name']; ?></h1>


<div>
<div class="bakaero">

<style>
.close{
	float: right;
    right: 2vw;
    top: -9vw;
    position: absolute;
    width: 2.5vw;
    height: 2.5vw;
    cursor: pointer;
    padding: 0.3vw;
    z-index: 11250;
	}

	.close:hover{
		background: rgba(0,0,0,.50);
	}

	.close svg{
		fill: #fff;
	}
</style>

<div class="close" id="close" style="z-index: 51000;">
	<svg height="2.5vw"  width:"2.5vw" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
</div>
<script>
	$('#close').click(function(){
	  $("#todoesephover").fadeOut(600);
    video.play();
    });
</script>
</script>
<?php
$idwatch = $anime['id'];
$resultsearchs2 = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 1" );
 if (!$resultsearchs2)
 echo '';
else
foreach ($resultsearchs2 as $resultsearch2):
?>
<?php
$idwatch = $resultsearch2['id'];
$videoa = $video['id'];
$animes = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 1" );
$resultsearchs = DBRead( 'videos', "WHERE idserie = '{$idwatch}'" );
 if (!$resultsearchs)
 echo '';
else
foreach ($resultsearchs as $resultsearch):
?>
<a href="watch.php?id=<?php echo $resultsearch['id'] ?>&href=watch.php?id=<?php echo $resultsearch2['id'] ?>">
<div id="img" class="hover1">
<h2 style="font-size: 18px;bottom: -15px;position: absolute; background:rgba(0,0,0,.50); color: #f5f5f5; text-shadow: 3px 3px 3px #000;">Ep. <?php echo $resultsearch['ep']; ?> Episódio <?php echo $resultsearch['ep']; ?></h2>
</div>
</a>

<style>
#img{
  background-image: url(<?php echo $resultsearch2['foto']; ?>);
  background-size: cover;
  width: 120px;
  height: 120px;
}
</style><?php endforeach; endforeach; ?>
</div>
</div>
</div>

<div id="align">
<div class="player" id="player">


<div id="baixo">
<div class="playbtn">
<button id="buttonpp" style="display:none;"><img class="play" src="/img/play.png"/></button>
<button id="buttonpmp"><img class="play" src="/img/pause.png"/></button>

</div>
<div id="line-left"></div>
<div class="volume">
<button id="mute">
<img class="volume" src="/img/volume.png"/>
</button>
<button id="muted" style="display:none;">
<img class="volume" src="/img/mute.png"
</button>
</div>
<div id="line-left2"></div>
<h1><?php echo $anime['name'];?> - <span style="font-size: 1.7vw;">Ep <?php echo $video['ep']; ?> </span></h1>
<div class="right">
<button id="help">
<img class="nextep" src="/img/ajuda.png"/>
</button>

<div id="helphover">
<img src="/img/baixo.png">
<a>Encontrou alguma coisa errada? Relate aqui:</a>
</div>

<div id="line-left3"></div>


<?php
$idwatch = $anime['id'];
$resultsearchs2 = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 1" );
 if (!$resultsearchs2)
 echo '';
else
foreach ($resultsearchs2 as $resultsearch2):
?>
<?php
$idwatch = $resultsearch2['id'];
$videoa = $video['id'];
$animes = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 1" );
$resultsearchs = DBRead( 'videos', "WHERE id > '{$videoa}' and idserie = '{$idwatch}'  LIMIT 1" );
 if (!$resultsearchs)
 echo '';
else
foreach ($resultsearchs as $resultsearch):
?>
<a href="watch.php?id=<?php echo $resultsearch['id']; ?>" style="color:transparent;">
<button id="nextep">
<img class="nextep" src="/img/ep.png"/>
</button>
</a>


<div id="hoverep">
<img src="/img/baixo.png">
<h1>Próximo episódio</h1>
<img src="<?php echo $resultsearch2['foto']; ?>" id="baka"></img>

<style>
#baka{
  top: -30px !important;
  width: 100px;
  height: 100px;
  float: left;
  right: 40px  !important;
  position: absolute;
}
</style>

<div id="right-ep" style="left: -50px !important; position: relative;">
<h2 style="top: -30px; left: -40px; position: relative;">Ep. <?php echo $resultsearch['ep']; ?> Episódio <?php echo $resultsearch['ep']; ?></h2>
<p><?php
	$str2 = nl2br( $resultsearch2['desct'] );
	$len2 = strlen( $str2 );
	$max2 = 57;
   if( $len2 <= $max2 )
   echo $str2;
	else    
   echo substr( $str2, 0, $max2 ) . '...'?></p>

</div>
</div>
<?php endforeach; endforeach; ?>





<img class="nextep" src="/img/eps.png" id="todosp"/>
<img class="nextep" src="/img/sub.png"/>

<button id="fullscreenico">
<img class="nextep" src="/img/full.png"/>
</button>

<button id="fullscreenedico" style="display:none;">
<img class="nextep" src="/img/desfull.png"/>
</button>
</div>

<div id="current">
<div id="defaultBar">
</div>
<div id="progressBar">
</div>
</div>

<div id="currtime">0:00</div>

</div>

</div>
</div>
<video id="playerwatchpri" src="<?php echo $video['video']; ?><?php
	$userideq = $_COOKIE['iduser'];
	$animels = DBRead( 'videos', "WHERE idserie = '{$anime['id']}' ORDER BY id DESC LIMIT 1" );
$resultsearchs = DBRead( 'history', "WHERE id and idpeople = '".$userideq."' and idvideo = '".$video['id']."' and perfil = '".$_COOKIE['usuario']."' ORDER BY id DESC" );
 if (!$resultsearchs)
 echo '';
else 
foreach ($resultsearchs as $resultsearch):
?>
<?php echo '#=t';?><?php echo $resultsearch['atualprogress'];?>
<?php endforeach;?>" preload="metadata" autoplay>

</video>




<script>

</script>

<script type="text/javascript" src="assets/js/mod_xhr.js"></script>
<script type="text/javascript">
document.getElementById("playerwatchpri").onclick = function() {vidplay()};
document.getElementById("buttonpp").onclick = function() {vidplay()};
document.getElementById("buttonpmp").onclick = function() {vidplay()};
document.getElementById("playerwatchpri").onclick = function() {vidplay()};
document.getElementById("playerwatchpri").ondblclick = function() {goFullscreen()};
document.getElementById("player").onmouseover = function() {showplayer()};
document.getElementById("baixo").onmouseover = function() {showplayer()};
document.getElementById("mute").onclick = function() {mute()};
document.getElementById("muted").onclick = function() {mute()}
document.getElementById("fullscreenico").onclick = function() {goFullscreen()};
document.getElementById("fullscreenedico").onclick = function() {goFullscreen()}
document.getElementById("fullscreenedico").onclick = function() {goFullscreen()};
document.getElementById("help").onmouseover = function() {help()};
document.getElementById("todosp").onclick = function() {todosep()};


var video = document.getElementById('playerwatchpri');

var videoStartTime = 0;
var durationTime = 0;

video.addEventListener('loadedmetadata', function() {
  videoStartTime = <?php
	$userideq = $_COOKIE['iduser'];
	$animels = DBRead( 'videos', "WHERE idserie = '{$anime['id']}' ORDER BY id DESC LIMIT 1" );
$resultsearchs = DBRead( 'history', "WHERE id and idpeople = '".$userideq."' and idvideo = '".$video['id']."' and perfil = '".$_COOKIE['usuario']."' ORDER BY id DESC" );
 if (!$resultsearchs)
 echo '';
else 
foreach ($resultsearchs as $resultsearch):
?>
<?php echo $resultsearch['atualprogress'];?>
<?php if(empty($resultsearch['atualprogress'])){ echo '0'; }?>
<?php endforeach;?>;
  durationTime = 4;
  this.currentTime = videoStartTime;
}, false);


<?php
$idwatch = $anime['id'];
$resultsearchs2 = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 1" );
 if (!$resultsearchs2)
 echo '';
else
foreach ($resultsearchs2 as $resultsearch2):
?>
<?php
$idwatch = $resultsearch2['id'];
$videoa = $video['id'];
$animes = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 1" );
$resultsearchs = DBRead( 'videos', "WHERE id > '{$videoa}' and idserie = '{$idwatch}'  LIMIT 1" );
 if (!$resultsearchs)
 echo '';
else
foreach ($resultsearchs as $resultsearch):
?>
document.getElementById("nextep").onmouseover = function() {ep()};
<?php endforeach; endforeach; ?>

function help(){
document.getElementById("todoesephover").style.display = "none";
document.getElementById("current").style.display = "none";
document.getElementById("currtime").style.display = "none";
document.getElementById("helphover").style.display = "block";
document.getElementById("hoverep").style.display = "none";
}

function todosep(){
document.getElementById("todoesephover").style.display = "block";
document.getElementById("helphover").style.display = "none";
document.getElementById("hoverep").style.display = "none";
document.getElementById("hoverep").style.display = "none";
video.pause();
}


function ep(){
document.getElementById("hoverep").style.display = "block";
document.getElementById("current").style.display = "none";
document.getElementById("currtime").style.display = "none";
document.getElementById("helphover").style.display = "none";
}


var video = document.getElementById("playerwatchpri");
var bar = document.getElementById("current");
bar.addEventListener("click", seek);
var progressBar = document.getElementById("progressBar");


function seek(e) {
var percent = e.offsetX / this.offsetWidth;
video.currentTime = percent * video.duration;
progressBar.value = percent / 100;
}

video.addEventListener('progress', function() {
var bufferedEnd = video.buffered.end(video.buffered.length - 1);
var duration =  video.duration;
if (duration >= 0) {
      document.getElementById('defaultBar').style.width = ((bufferedEnd / duration)*100) + "%";
}
});

video.addEventListener('timeupdate', function() {
var duration =  video.duration;
if (duration > 0) {
	var bufferedEnd = video.buffered.end(video.buffered.length - 1);
document.getElementById('progressBar').style.width = ((video.currentTime / duration)*100) + "%";

var videotimer = document.getElementById('defaultBar').style.width = ((bufferedEnd / duration)*100) + "%";
video.ontimeupdate = function() {myFunction()};

function myFunction() {
  // Display the current position of the video in a <p> element with id="demo"
      document.getElementById("currtime").innerHTML = video.currentTime;
  }
  <?php
  if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
    $animels = DBRead( 'videos', "WHERE idserie = '{$anime['id']}' ORDER BY id DESC LIMIT 1" );
   if (!$animels)
    echo "";
  else 
    foreach ($animels as $animel):
    ?>

      var i = 1;
var id = '#imagem'
// Intervalo em milissegundos (1s == 1000ms)
var milissegundos = 5000;

// Executa a função a cada intervalo de tempo
var interval = setInterval(function(){
  i++;
  // Seta o source da nova imagem
  xhr.get('historytime.php?timer='+videotimer+'&video=<?php echo $video['id'];?>&currenttime='+video.currentTime+'&profile=<?php echo $_COOKIE['usuario'];?>&anime=<?php echo $anime['id']; ?>', function(nots){
           });

}, milissegundos);

  <?php endforeach;}?>
  }
  });	

function vidplay() {	
if (video.paused) {
video.play();
document.getElementById("buttonpmp").style.display = "block";
document.getElementById("buttonpp").style.display = "none";
} else {	
video.pause();
document.getElementById("buttonpp").style.display = "block";
document.getElementById("buttonpmp").style.display = "none";
}
}

function skip(value) {
var video = document.getElementById("playerwatchpri");
video.currentTime += value;
video.play();
}

function mute(){
if (video.muted) {
video.muted = false;
document.getElementById("mute").style.display = "block";
document.getElementById("muted").style.display = "none";
}else{
video.muted = true;
document.getElementById("muted").style.display = "block";
document.getElementById("mute").style.display = "none";	
}
}
	
function goFullscreen() {
if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
document.getElementById("normal").setAttribute("id","full");
document.getElementById("header").style.display = "none";
document.getElementById("inikopy").setAttribute("id","fullscreen");
document.getElementById("fullscreenedico").style.display = "block";
document.getElementById("fullscreenico").style.display = "none";
	} else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
document.getElementById("fullscreenico").style.display = "block";
document.getElementById("fullscreenedico").style.display = "none";	
}
}

document.onkeyup = function(evt) {
evt = evt || window.event;
if (evt.keyCode == 27 || evt.keyCode == 122) {
if (document.exitFullscreen) {
document.exitFullscreen();
} else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
document.getElementById("full").setAttribute("id","normal");
document.getElementById("header").style.display = "block";
document.getElementById("fullscreen").setAttribute("id","inikopy");
document.getElementById("fullscreenico").style.display = "block";
document.getElementById("fullscreenedico").style.display = "none";	
}
}

document.getElementById("playerwatchpri").addEventListener('timeupdate', function() {
var video = document.getElementById("playerwatchpri");
	var nt = video.currentTime * (100 / video.duration);
	var curmins = Math.floor(video.currentTime / 60);
	var cursecs = Math.floor(video.currentTime - curmins * 60);
	var durmins = Math.floor(video.duration / 60);
	var dursecs = Math.floor(video.duration - durmins * 60);
	if(cursecs < 10){ cursecs = "0"+cursecs; }
	if(dursecs < 10){ dursecs = "0"+dursecs; }
	if(curmins < 10){ curmins = "0"+curmins; }
	if(durmins < 10){ durmins = "0"+durmins; }
	document.getElementById("currtime").innerHTML = curmins+":"+cursecs;
});

var timeout;
document.getElementById("playerwatchpri").onmousemove = function(){
  clearTimeout(timeout);
  timeout = setTimeout(function(){
document.getElementById("playerwatchpri").style.cursor = "none";	
document.getElementById("player").style.opacity = "0";
document.getElementById("player2").style.opacity = "0";
  }, 2000);
document.getElementById("playerwatchpri").style.cursor = "auto";
document.getElementById("player").style.opacity = "1";	
document.getElementById("player2").style.opacity = "1"; 	
document.getElementById("helphover").style.display = "none";
document.getElementById("hoverep").style.display = "none";
document.getElementById("current").style.display = "block";
document.getElementById("currtime").style.display = "block";
}
function showplayer(){
document.getElementById("player").style.opacity = "1";	 
document.getElementById("player2").style.opacity = "1"; 	
document.getElementById("current").style.display = "block";
document.getElementById("currtime").style.display = "block";
}
</script>

</body>

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