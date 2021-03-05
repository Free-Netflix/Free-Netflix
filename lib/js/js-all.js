$("document").ready(function(){
  $(".buscaranime").keyup(function(){
	var $this = $(this);
	var val   = $this.val();
	console.log(val);
	
	if(val == ""){
		$('.src').html("");
	}else{
		$.ajax({
		  url: "buscaanime.php",
		  type: "POST",
		  data: {nomeanime: val},
		  cache: false,
		  
		  success: function(res){
			$('.src').html(res);
		  }
		  
		});
	}
	
  });
  
  $('html, body').click(function(){
	$('.src').html("");
  });
  
});