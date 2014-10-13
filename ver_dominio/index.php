<html>
<head>
<title>Jquery Easy - Verificar si un dominio esta disponible con php y json</title>

<link href="main.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>

<script language="javascript">
$(document).ready(function() {
	
	var loading;
	var results;
	var form;
	
	form = document.getElementById('form');
	loading = document.getElementById('loading');
	results = document.getElementById('results');
	
	$('#Submit').click( function() {
		
		if($('#Search').val() == "")
		{alert('Ingrese un dominio');return false;}
		
		results.style.display = 'none';
		$('#results').html('');
		loading.style.display = 'inline';
		
		$.post('process.php?domain=' + escape($('#Search').val()),{
		}, function(response){
			
			results.style.display = 'block';
			$('#results').html(unescape(response));	
			loading.style.display = 'none';
		});
		
		return false;
	});
	
});
</script>
</head>
<body>
<div class="cabecera"><img src="http://www.jqueryeasy.com/application/views/templates/colorvoid/static/images/logo.gif" /></div>
<h3 align="center">Verificar si un dominio esta disponible con php y json</h3>
<center>

	
	
	<form method="post" action="./" id="form"> 
	     <h3 style="color:#FFF">Ingrese solo el nombre del dominio (*sin prefijo .com, .org, etc)</h3>
		<input type="text" autocomplete="off" id="Search" name="domain"> 
		<input type="submit" id="Submit" value="Submit">
	
	</form>


	<div id="loading">Enviando datos....</div>
		
	 <div id="results" style="width:420px; height:600px;" align="left">
		
	 </div>	
 
 
 </center>
 </body>
 </html>
 
