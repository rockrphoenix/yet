 $(document).ready(function(){
 	$('#paquete').click(function(){
 		$('#tabla_basico').fadeIn(2000);
 	});
 	$('#tri').click(function(){
 		if($('#total_basico_sem').css("display") === 'block'){
 			$('#total_basico_sem').hide();
 		}else if($('#total_basico_anu').css("display") === 'block'){
 			$('#total_basico_anu').hide();
 		};
 		$('#total_basico_tri').fadeIn(2000);
 	});
 	$('#sem').click(function(){
 		if($('#total_basico_tri').css("display") === 'block'){
 			$('#total_basico_tri').hide();
 		}else if($('#total_basico_anu').css("display") === 'block'){
 			$('#total_basico_anu').hide();
 		};
 		$('#total_basico_sem').fadeIn(2000);
 	});
 	$('#anu').click(function(){
 		if($('#total_basico_sem').css("display") === 'block'){
 			$('#total_basico_sem').hide();
 		}else if($('#total_basico_tri').css("display") === 'block'){
 			$('#total_basico_tri').hide();
 		};
 		$('#total_basico_anu').fadeIn(2000);
 	});
 });
