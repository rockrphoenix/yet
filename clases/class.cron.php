<?php
require_once("class.conexion.php");
/**
 * @author grupo syse
 * @copyright 2014
 */
	class Cronn extends Conexion
	{
		function __construct()
		{
			parent::__construct();
		}
        public function checkUser(){
            $users= $this->conexion->query("SELECT iddatos from tbldatos where status=2")or die("No busqué el usuario");
            $c = 0;
            while ($total=$users->fetch_array(MYSQL_ASSOC)) {
                $totalArray[$c] = $total[iddatos];
                $c++;
            }
            return $totalArray;
			$users->free();
            $this->conexion->close();
        }
        public function compareUser($array){
            $clientes= $array;
            $ruta="../../clientes/";
            if(!empty($clientes)){
                foreach($clientes as $row){
                    $rutaCompleta = $ruta.$row;
                    if(!file_exists($rutaCompleta))
                    {
                        mkdir ($rutaCompleta);
                    }
                }
            }
        }
        public function updateUsers(){
            $users= $this->conexion->query("SELECT iddatos,PeriodoFinal FROM tbldatos td inner join tbltipousuario tu on tu.idTipoUsuario=td.idTipoUsuario where status = 2")or die("No busqué el usuario");
            $total=$users->fetch_array(MYSQL_ASSOC);
            if(!empty($total)){
                while($total=$users->fetch_array(MYSQL_ASSOC)){
                    if($total[PeriodoFinal]<date('Y-m-d')){
                        if($total[PeriodoFinal]!=NULL){
                            $update=$this->conexion->query("update tbldatos set Status=1 where iddatos=".$total[iddatos]);
                        }
                    }
                }
            }
			$users->free();
            $this->conexion->close();
        }
        
    }

?>