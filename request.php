<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
$idset = DBEscape( strip_tags(trim($_GET['serie']) ) );
$idse = DBRead('series', "WHERE id = '{$idset}' LIMIT 1 ");
if($idse){
	$idse = $idse[0];
	}else{
	echo '<script>location.href="dashboard";</script>';	
	}
	if(isset($_GET['serie'])){
	$infor = $_GET['infor'];
		?>

<script>
  $('#close').click(function(){
	$("#infor<?php echo $infor;?>").fadeOut(600);
    });
</script>

<div class="informa">


<div class="close" id="close<?php echo $infor;?>" style="z-index: 10421421312321;">
	<svg height="2vw"  width:"2vw" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
</div>

<script>
  $('#close<?php echo $infor;?>').click(function(){
	$("#infor<?php echo $infor;?>").fadeOut(600);
    });
</script>

<style>
.left-de{
	display: block;
}

.ep-info{
	width: 100%;
	height: 100%;
	display: none;
	opacity: 0.9;
	background: #000;
	position: absolute;
	top: 0;
	left: 0;
	z-index: 1052122210;
}
</style>

<div class="left-de" id="info-c">

<?php
$animels2 = DBRead( 'series', "WHERE id ORDER BY id = '{$_GET['serie']}' DESC LIMIT 1" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>
<h1 style="font-size: 1.4vw;"><?php
	$str2 = nl2br( $animel['name'] );
	$len2 = strlen( $str2 );
	$max2 = 40;
   if( $len2 <= $max2 )
   echo $str2;
	else    
   echo substr( $str2, 0, $max2 ) . '...'?></h1>
<p class="desct" style="font-size: 1.2vw;">
<?php
	$str2 = nl2br( $animel['desct'] );
	$len2 = strlen( $str2 );
	$max2 = 800;
   if( $len2 <= $max2 )
   echo $str2;
	else    
   echo substr( $str2, 0, $max2 ) . '...'?>
</p>
	<?php endforeach; ?>
<style>
.over-back{
	width: 55%;
	background-size: cover;
	height: 100%;
	background-image: url(<?php echo $animel['fotoback']; ?>);
	position: absolute;
	display: flex;
	top: 0;
	float: right;
	right: 0;
	z-index: 2;
}
</style>

<div class="over-back">

</div>
</div>


<div class="ep-info" id="epc">

<?php
require 'db.php';
$idwatchep = $_GET['serie'];
$totaldepost = mysql_query("SELECT * FROM netflix_videos WHERE idserie = '{$idwatchep}' ");
$totaldepost = mysql_num_rows($totaldepost);
if($totaldepost >= 6){
?>
<div class="left-i" onclick="ScrollByRight()" style="position: relative; top: 9.5vw; left: 2.2vw;">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M7.701,14.276l9.586-9.585c0.879-0.878,2.317-0.878,3.195,0l0.801,0.8c0.878,0.877,0.878,2.316,0,3.194  L13.968,16l7.315,7.315c0.878,0.878,0.878,2.317,0,3.194l-0.801,0.8c-0.878,0.879-2.316,0.879-3.195,0l-9.586-9.587  C7.229,17.252,7.02,16.62,7.054,16C7.02,15.38,7.229,14.748,7.701,14.276z" fill="#fff"/></svg>
</div>

<div class="right-i" onclick="ScrollByLeft()" style="position: relative; top: 9.5vw;">
<svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24.291,14.276L14.705,4.69c-0.878-0.878-2.317-0.878-3.195,0l-0.8,0.8c-0.878,0.877-0.878,2.316,0,3.194  L18.024,16l-7.315,7.315c-0.878,0.878-0.878,2.317,0,3.194l0.8,0.8c0.878,0.879,2.317,0.879,3.195,0l9.586-9.587  c0.472-0.471,0.682-1.103,0.647-1.723C24.973,15.38,24.763,14.748,24.291,14.276z" fill="#fff"/></svg>
</div>
<?php } ?>
<div class="video-a" id="scrollep" style="position: relative; top: 7vw;">

<?php
$idwatch = $_GET['serie'];
$resultsearchs2 = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 1" );
 if (!$resultsearchs2)
 echo '';
else
foreach ($resultsearchs2 as $resultsearch2):
?>
	<?php
$idwatch = $resultsearch2['id'];
$animes = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 10" );
$resultsearchs = DBRead( 'videos', "WHERE idserie = '{$idwatch}'  LIMIT 240" );
 if (!$resultsearchs)
 echo '';
else
foreach ($resultsearchs as $resultsearch):
?>

<a href="watch.php?id=<?php echo $resultsearch['id'] ?>&href=dashboard.php?serieinfo=<?php echo $resultsearch2['id'] ?>">
<div class="video" id="click<?php echo $resultsearch2['id']; ?>">
<img src="<?php echo $resultsearch2['foto']; ?>" class="focus"/>
<p style="color: #fff; text-align: center; font-size: 1.3vw;">Ep <?php echo $resultsearch['ep']; ?></p>
</div>
</a>

	<?php endforeach; endforeach; ?>

<script>
  $('#close').click(function(){
	$("#infor<?php echo $infor;?>").fadeOut(600);
    });
</script>

</div>
</div>

<style>
.assistirt{
	height: 5vw;
	width: 5vw;
	position: absolute;
	z-index: 100000;
	float: right;
	right: 20vw;
	border: none;
	top: 40%;
	border-radius: 50%;
	background: rgba(0,0,0,.50);
	cursor: pointer;
	border: 0.1vw solid #fff;
	-webkit-transition: all 1s; /* Safari */
    transition: all 1s;
}

.assistirt:hover{
	ms-transform: scale(1.3, 1.3); /* IE 9 */
    -webkit-transform: scale(1.3, 1.3); /* Safari */
    transform: scale(1.3, 1.3);
}
</style>


<?php
$idwatch = $_GET['serie'];
$resultsearchs2 = DBRead( 'series', "WHERE id = '{$idwatch}'  LIMIT 1" );
 if (!$resultsearchs2)
 echo '';
else
foreach ($resultsearchs2 as $resultsearch2):
?>
	<?php
$idwatch = $resultsearch2['id'];
$animes = DBRead( 'series', "WHERE id = '{$idwatch}' LIMIT 10" );
$resultsearchs = DBRead( 'videos', "WHERE idserie = '{$idwatch}' LIMIT 1" );
 if (!$resultsearchs)
 echo '';
else
foreach ($resultsearchs as $resultsearch):
?>


<a href="watch.php?id=<?php echo $resultsearch['id']; ?>">
<button class="assistirt">
<svg height="3vw" fill="#fff" id="Layer_1" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" width="3vw" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M1,14c0,0.547,0.461,1,1,1c0.336,0,0.672-0.227,1-0.375L14.258,9C14.531,8.867,15,8.594,15,8s-0.469-0.867-0.742-1L3,1.375  C2.672,1.227,2.336,1,2,1C1.461,1,1,1.453,1,2V14z"/></svg>
</button>
</a>
<?php endforeach; endforeach;?>

<style>
.baixo-desc{
	z-index: 121421874812783217831 !important;
}
</style>

<div class="baixo-desc">

<center>
<p style="font-size: 1vw;" class="feels feels-ativo" id="infob">VISÃO GERAL</p>
<?php
     if($idse['tipo'] > 1){
    ?>
<p style="font-size: 1vw;" class="feels" id="infoc">EPISÓDIOS</p>
	 <?php } ?>
</center>

<script>
var info = document.getElementById('infob');
var ep = document.getElementById('infoc');
  $('#infoc').click(function(){
	info.style = 'border-bottom: 0.2vw solid transparent;';
	ep.style = 'border-bottom: 0.2vw solid #5e09e5;';
	$("#epc").fadeIn(600);
    });

	$('#infob').click(function(){
	$("#epc").fadeOut(600);
	info.style = 'border-bottom: 0.2vw solid #5e09e5;';
	ep.style = 'border-bottom: 0.2vw solid transparent;';
    });

	function ScrollByLeft() {
	document.getElementById("scrollep").scrollBy(1500, 0);
}
function ScrollByRight() {
	document.getElementById("scrollep").scrollBy(-1500, 0);
}

function ScrollLeft() {
	document.getElementById("scrollep").scrollLeft=1500;
}
function ScrollRight() {
	document.getElementById("scrollep").scrollLeft=-1500;
}


</script>

</div>

</div>


<script>
  $('#close').click(function(){
	$("#infor<?php echo $infor;?>").fadeOut(600);
    });
</script>

	<?php } ?>