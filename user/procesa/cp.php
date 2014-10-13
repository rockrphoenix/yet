<?php
	require_once("../clases/clase.codigopostal.php");
	$opc = new CP($_GET);
	$cont = 0;
	$al = $opc->encuentraCodigo();
	while($row = $al->fetch_array()){
		$rows[]= $row['d_codigo'].",".utf8_encode($row['d_estado']).",".utf8_encode($row['D_mnpio']).",".utf8_encode($row['d_ciudad']).",".utf8_encode($row['d_asenta']);
		/*$rows[]=array('cp'=>$row['d_codigo'],'estado'=>$row['d_estado'],'municipio'=>$row['D_mnpio'],
                        'cestado'=>$row['c_estado'],'cmunicipio'=>$row['c_mnpio'],'ciudad'=>$row['d_ciudad'],
                        'cciudad'=>$row['c_cve_ciudad']);*/
	}
	echo json_encode($rows);
?>