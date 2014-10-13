<?php
set_time_limit(0);
ob_start();

########### Extensiones whois.nic.mx
$extensions = array(
	'.com' 		=> array('whois.crsnic.net','No match for'),
	'.com.mx' 	=> array('whois.nic.mx','No match for'),
	'.mx' 		=> array('whois.nic.mx','No match for'),
	'.info' 	=> array('whois.afilias.net','NOT FOUND'),	
	'.net' 		=> array('whois.crsnic.net','No match for'),		
);
###########

if(isset($_GET['domain']))
{
	$domain = str_replace(array('www.', 'http://','/'), NULL, $_GET['domain']);
	
	if(strlen($domain) > 0)
	{
		foreach($extensions as $extension => $who)
		{
			$buffer = NULL;
				
			$sock = fsockopen($who[0], 43) or die('Error Connecting To Server:' . $server);
			fputs($sock, $domain.$extension . "\r\n");
				
				while( !feof($sock) )
				{
				  	$buffer .= fgets($sock,128);
				}
				
			fclose($sock);
							
			if(eregi($who[1], $buffer))
			{
				echo '<p>' . $domain. '<b>' . $extension .' </b><strong style="background: green; color:white; padding:0 3px;">Está Disponible</strong></p>';
			}
			else
			{
				echo '<p>' . $domain . '<b>' .$extension .' </b><strong style="background: red; color:white; padding: 0 3px;">NO está disponible</strong></p>';
			}
			echo '<br />';	
			
			ob_flush();
			flush();
			sleep(0.3);
			
		}
	}
	else
	{
		echo 'Por favor ingrese nombre del dominio';
	}
}
?>
