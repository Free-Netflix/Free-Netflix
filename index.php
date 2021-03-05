<?php
if(empty($_COOKIE['iduser']) ){?>
<head>
<title>
Wooby Animes
</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="/static/ico/default.ico"/>
<link rel="stylesheet" type="text/css" href="/css/pace.css"/>
 <script type="text/javascript" src="/js/pace.min.js"></script>
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
    background: #000;
}

.header-al-home-a{
    width: 100%;
    height: 5vw;
    left: 0;
    top: 0;
    position: absolute;
    z-index: 5000;
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

.body-oa-tod{
    position: relative;
    -webkit-transform: translate(0,-50%);
    -moz-transform: translate(0,-50%);
    -ms-transform: translate(0,-50%);
    -o-transform: translate(0,-50%);
    transform: translate(0,-50%);
    width: 100%;
    height: 85vw;
    top: 15vw;
    background-size: cover;
	background-image: url(/static/back.jpg);
}

.eo{
    background-image: -webkit-gradient(linear,left top,right top,color-stop(20%,rgba(0,0,0,.8)),color-stop(85%,rgba(0,0,0,0)));
    background-image: -webkit-linear-gradient(left,rgba(0,0,0,.8) 20%,rgba(0,0,0,0) 85%);
    background-image: -moz-linear-gradient(left,rgba(0,0,0,.8) 20%,rgba(0,0,0,0) 85%);
    background-image: -o-linear-gradient(left,rgba(0,0,0,.8) 20%,rgba(0,0,0,0) 85%);
    background-image: linear-gradient(to right,rgba(0,0,0,.8) 20%,rgba(0,0,0,0) 85%);
    width: 80%;
    height: 100%;
    position: absolute;
    z-index: 1000;
}

.login-b{
    color: #fff;
    background-color: #5e09e5;
    line-height: normal;
    margin: 18px 3% 0;
    padding: 7px 17px;
    font-weight: 400;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    font-size: 1vw;
    height: 2.2vw;
    width: 5vw;
    border: none;
    float: right;
    cursor: pointer;
}

.apresentation{
    position: absolute;
    color: #fff;
    top: 15vw;
    width: 50vw;
    height: 20vw;
    left: 2vw;
}

.apresentation h1{
    font-size: 4.5vw;
    padding: 0.9vw;
    text-shadow: 0.2vw 0.2vw #000;
}

.apresentation p{
    padding: 1.3vw;
    font-size: 1.8vw;
    font-weight: bold;
}

.apresentation .btn-free {
    color: #fff;
    font-size: 1.2vw;
    background-color: #5e09e5;
    background-image: -webkit-gradient(linear,left top,left bottom,from(#5e09e5),to(#055bdb));
    background-image: -webkit-linear-gradient(top,#5e09e5,#055bdb);
    background-image: -moz-linear-gradient(top,#5e09e5,#055bdb);
    background-image: -o-linear-gradient(top,#5e09e5,#055bdb);
    background-image: linear-gradient(to bottom,#5e09e5,#055bdb);
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,.45);
    -moz-box-shadow: 0 1px 0 rgba(0,0,0,.45);
    box-shadow: 0 1px 0 rgba(0,0,0,.45);
    border: none;
    height: 3vw;
    width: 19vw;
    cursor: pointer;
}

</style>

<body>

<div class="header-al-home-a">
<a href="/">
<img src="/static/logo.png" class="logo"/>
</a><a href="account">
<button class="login-b">
Entrar
</button>
</a>
</div>

<div class="eo"></div>
<video src="http://woobyanimes.com/static/loop.mp4" style="display: none;" class="body-oa-tod" autoplay muted loop>
</video>

<div class="body-oa-tod"></div>

<div class="apresentation" style="z-index: 10000;">
<h1>Seu próximo anime, agora.</h1>
<p>Veja seus animes favoritos, quando quiser!<p>
<a href="/account/1">
<button class="btn-free">ASSISTA UM MÊS GRÁTIS</button>
</a>
</div>

</div>

<style>
.baladinha{
    background-color: #141414;
    border-right: none;
    width: 100%;
    height: 11vw;
    position: relative;
    top: -42vw;
    border-bottom: 0.1vw solid #4c4545;
    padding-top: 0vw;
	z-index: 1000000;
}


#icon-cancel{
    width: 4vw;
    height: 4vw;
    position: relative;
    top: 1vw;
    fill: #fff;
}

#icon-cross-device-screens-desktop{
    fill: #fff;
    width: 9vw;
    height: 4vw;
    top: 1vw !important;
    position: relative;
}

#icon-price-tag{
    fill: #fff;
    width: 8vw;
    height: 4vw;
}

.baladinha li{
    width: 20%;
    height: inherit;
    display: inline-block;
    left: 40%;
    position: relative;
    margin-left: 0.5vw;
    top: 0;
    height: 9vw;
    cursor: pointer;
    opacity: 0.6;
    padding-top: 1.8vw;
}

.baladinha li:hover{
    opacity: 1;
}

.baladinha p{
    color: #fff;
    position: relative;
    top: 2vw;
    font-weight: bold;
    font-size: 1.2vw;
}

.time{
    top: 1vw !important;
}

.ta{
    height: 7.65vw !important;
}

.ativo{
    border-bottom: 0.2vw solid #5e09e5;
    opacity: 1 !important;
}

</style>

<div class="baladinha">

<li class="ativo">
<center>
<svg enable-background="new 0 0 24 24" id="icon-cancel" height="24px" id="Layer_1" version="1.1" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M19.6,15.2c0-0.2,0-0.5,0.1-0.7c0-4.4-2.4-6.1-4.9-7.6c-0.2-0.1-0.4-0.1-0.5,0c-0.2,0.1-0.2,0.3-0.2,0.5   c0.3,1.5,0,2.8-0.7,3.7c-0.6,0.7-1.4,1-2.4,0.9c2-3.6,1-5.3,0.2-6.9C10.5,4,10,3,10.7,1.2c0.1-0.2,0-0.4-0.2-0.6   c-0.2-0.1-0.4-0.1-0.6,0c-3,2.1-5.8,7.8-5.7,11.9c0,0.9,0.1,1.8,0.2,2.7c-2.1,0.9-3.2,2.1-3.2,3.5c0,2.7,4.7,4.9,10.8,4.9   s10.8-2.1,10.8-4.9C22.8,17.3,21.6,16.1,19.6,15.2z M12,20.4c-2.8,0-5.1-1.8-5.1-4c0-1.1,0.6-2.2,1.7-3c0.2-0.1,0.4-0.1,0.5,0   c0.2,0.1,0.3,0.3,0.2,0.5c0,0,0,0.1,0,0.1c0,1.5,1.2,2.7,2.7,2.7s2.7-1.2,2.7-2.7c0,0,0-0.1,0-0.2c0-0.2,0.1-0.4,0.2-0.4   c0.2-0.1,0.4-0.1,0.5,0c1.1,0.8,1.7,1.9,1.7,3C17.1,18.6,14.8,20.4,12,20.4z"/></g></svg>
<p>Redes Socias e Produtos!</p>
</center>
</li>


</div>

<style>
.cancel{
    background: #000;
    width: 100%;
    position: absolute;
    height: 28vw;
    top: 53.5vw;
    display: block;
}

.onde{
    background: #000;
    width: 100%;
    position: absolute;
    height: 28vw;
    top: 53.5vw;
    display: none;
}
</style>


<div class="cancel">
<center>
<style>
.left{
    width: 45vw;
    position: relative;
    top: 5vw;
    padding: 2vw;
}

.left span{
    font-size: 2vw;
	display: inline-block;
	-webkit-transition: all 1s; /* Safari */
    transition: all 1s;
	opacity: .7;
	margin-left: 2vw;
}

.left span:hover{
	opacity: 1;
	-ms-transform: scale(1.3, 1.3); /* IE 9 */
    -webkit-transform: scale(1.3, 1.3); /* Safari */
    transform: scale(1.3, 1.3);
	border-radius: 50%;
}

.left span img{
	height: 6.5vw;
	width: 6.5vw;
	cursor: pointer;
}


.red-free{
    color: #fff;
    background-color: #5e09e5;
    background-image: -webkit-gradient(linear,left top,left bottom,from(#5e09e5),to(#055bdb));
    background-image: -webkit-linear-gradient(top,#5e09e5,#055bdb);
    background-image: -moz-linear-gradient(top,#5e09e5,#055bdb);
    background-image: -o-linear-gradient(top,#5e09e5,#055bdb);
    background-image: linear-gradient(to bottom,#5e09e5,#055bdb);
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,.45);
    -moz-box-shadow: 0 1px 0 rgba(0,0,0,.45);
    box-shadow: 0 1px 0 rgba(0,0,0,.45);
    border: none;
    width: 15vw;
    height: 3vw;
    cursor: pointer;
    position: relative;
    top: 1vw;
    font-size: 1vw;
}

.left span p{
	position: relative;
	top: 1vw;
	font-size: 1.25vw;
	left: 0;
}

.left a{
	color: transparent;
}

.produtos{
	width: 100%;
	height: 16vw;
	background: #141414;
	top: 5vw;
	position: relative;
	display: none;
}


.close{
		float: right;
		right: 1vw;
		top: 1vw;
		position: absolute;
	 	width: 2.5vw;
		height: 2.5vw;
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

	
	.produto{
		background: red;
		width: 12vw;
		height: 10vw;
		top: 2vw;
		position: relative;
		-webkit-transition: all 1s; /* Safari */
		transition: all 1s;
		cursor: pointer;
	}
	
	#scroll{
		transition:all 0.3s ease;
		position: relative;
		height: auto;
		overflow: hidden;
		display: flex;
		-webkit-transition: all 1s; /* Safari */
		transition: all 1s;
		height: 13vw;
		width: 100%;
		top: 4vw;
	}

	.produto img{
		width: 100%;
		height: 100%;
	}
	
	.produto:hover{
		-ms-transform: scale(1.3, 1.3); /* IE 9 */
		-webkit-transform: scale(1.3, 1.3); /* Safari */
		transform: scale(1.3, 1.3);
	}
	
	.produtos a{
		color: transparent;
	}
	
	.produtos h1{
		font-size: 1.95vw;
		position: relative;
		color: #fff;
	}
</style>
<div class="left">
<center>
<a href="https://www.facebook.com/WoobyAnimes/" target="_blank">
<span style="color: #fff;">
<img src="/static/icon.png"/>
<p>Facebook</p></span>
</a>
<span style="color: #fff;">
<img src="/static/icon2.png"/>
<p>Twitter</p></span>
<span style="color: #fff;">
<img src="/static/icon3.png"/>
<p>YouTube</p></span>
<span style="color: #fff;" id="prod">
<img src="/static/icon4.png"/>
<p>Produtos</p></span>
</div>
</center>

<div class="produtos" id="div-p">
<center>
<h1>Produtos</h1>
</center>
	<div class="close" id="close">
	<svg height="2.5vw"  width="2.5vw" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
	</div>
	

		<center>
		<a href="https://go.hotmart.com/O6950092W" target="_blank">
		<div class="produto"><img src="static/logo1.jpg"/></div>
		</a>
		</center>

</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $('#prod').click(function(){
	$("#div-p").fadeIn(600);
    });
	
	 $('#close').click(function(){
	$("#div-p").fadeOut(600);
    });
</script>


</body>
<?php } else{
    include 'dashboard.php';
}
    ?>
</html>
