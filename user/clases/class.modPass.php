<?php 
require_once('../../clases/class.conexion.php');
/**
* 
*/
class ModPass extends Conexion
{
	protected $oldPass;
	protected $newPass;
	protected $cNewPass;
	protected $id;
	
	function __construct()
	{
		$_POST;
		parent::__construct();
		$this->id=$this->conexion->real_escape_string($_POST['id']);
		//$this->oldPass=$this->conexion->real_escape_string($_POST['psw']);
		$this->oldPass=md5($_POST['psw']);
		$this->newPass=md5($_POST['pswn']);
		$this->cNewPass=md5($_POST['cpswn']);
		//$this->cNewPass=$this->conexion->real_escape_string($_POST['cpswn']);
		//echo $this->oldPass."<br>";
		//echo $this->cNewPass;
		
	}
	public function comparaPass(){
		$antigua=$this->conexion->query("SELECT Contra FROM tbldatos WHERE iddatos='$this->id' and Contra='$this->oldPass'")or die("no se encontraron datos");
		$chpw=$antigua->fetch_array(MYSQL_ASSOC);
		$compara = ($chpw['Contra'] != FALSE) ? 1 : 0 ;
		return $compara;
	}
	public function comparaPassAsesor(){
		$antigua=$this->conexion->query("SELECT contra FROM tblasesores WHERE idasesor='$this->id' and contra='$this->oldPass'")or die("no se encontraron datos");
		$chpw=$antigua->fetch_array(MYSQL_ASSOC);
		$compara = ($chpw['Contra'] != FALSE) ? 1 : 0 ;
		return $compara;
	}
	public function cambiaPass(){
        $res=$this->comparaPass();
		if ($res==1) {
			if ($this->newPass == $this->cNewPass) {
				$nueva=$this->conexion->query("UPDATE tbldatos SET Contra='$this->cNewPass' WHERE iddatos ='$this->id'")or die("no se pudo actualizar el password");
				$retVal = ($nueva != FALSE) ? TRUE : FALSE ;
				return $retVal;
			}else{
				return FALSE;
			}
			return FALSE;
		}
	}
	public function cambiaPassAsesor(){
		$update = $this->conexion->query("UPDATE tblasesores SET contra = '$this->newPass', estatus = '2' WHERE idasesor = '$this->id'")or die("No puedo cambiar el pass");
		if ($this->conexion->affected_rows == 0) {
			return 0;
		}else{
			return 1;
		}
	}
	public function cambiaPassAsesor2(){
		$res = $this->comparaPassAsesor();
			if (condition) {
				$update = $this->conexion->query("UPDATE tblasesores SET contra = '$this->newPass' WHERE idasesor = '$this->id'")or die("No puedo cambiar el pass");
			if ($this->conexion->affected_rows == 0) {
				return 0;
			}else{
				return 1;
			}
		}else{
			return 0;
		}
		
	}




}

 ?>