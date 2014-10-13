<?php
set_time_limit(0);
ob_start();

########### Extensiones
$extensions = array(
	'.com' 		=> array('whois.crsnic.net','No match for'),
	'.info' 	=> array('whois.afilias.net','NOT FOUND'),	
	'.net' 		=> array('whois.crsnic.net','No match for'),
	'.co.uk' 	=> array('whois.nic.uk','No match'),		
	'.nl' 		=> array('whois.domain-registry.nl','not a registered domain'),
	'.ca' 		=> array('whois.cira.ca', 'AVAIL'),
	'.name' 	=> array('whois.nic.name','No match'),
	'.ws'		=> array('whois.website.ws','No Match'),
	'.be' 		=> array('whois.ripe.net','No entries'),
	'.org' 		=> array('whois.pir.org','NOT FOUND'),
	'.biz' 		=> array('whois.biz','Not found'),
	'.tv' 		=> array('whois.nic.tv', 'No match for'),
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
				echo '<h4 class="available"><span>Disponible</span>' . $domain. '<b>' . $extension .'</b> Esta Disponible</h4>';
			}
			else
			{
				echo '<h4 class="taken"><span>Tomado</span>' . $domain . '<b>' .$extension .'</b> Esta Tomado</h4>';
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
