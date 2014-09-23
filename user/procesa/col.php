<?php
	require_once("../clases/clase.colonia.php");
	$opcion = new Col($_GET);
	$alg = $opcion->encuentraColonia();
    //echo "[";
	while($row = $alg->fetch_assoc()){
		$rows[]= $row['d_codigo'].",".utf8_encode($row['d_estado']).",".utf8_encode($row['D_mnpio']).",".utf8_encode($row['d_ciudad']).",".utf8_encode($row['d_asenta']);
		/*$rows[]=array('cp'=>$row['d_codigo'],'estado'=>$row['d_estado'],'municipio'=>$row['D_mnpio'],
                        'cestado'=>$row['c_estado'],'cmunicipio'=>$row['c_mnpio'],'ciudad'=>$row['d_ciudad'],
                        'cciudad'=>$row['c_cve_ciudad']);*/
        //echo "\"".$row['codigo'].",".$row['estado'].",".$row['municipio'].",".$row['ciudad'].",".$row['colonia']."\"".",";
	}
    //echo "]";
    //print_r($rows);
	echo json_encode($rows);
?>