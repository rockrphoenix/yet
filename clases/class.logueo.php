<?php
    session_start();
    require_once("class.conexion.php");
	class Logueo extends Conexion
	{		
		function __construct()
		{
			$_POST;
			parent::__construct();
            //quitamos el posible SQLInjection del usuario
            $_POST['email'] = $this->conexion->real_escape_string($_POST['email']);  
            //sacamos el hash del password para que se compare ya encriptado
            $_POST['psw'] = md5($this->conexion->real_escape_string($_POST['psw']));
		}
		public function buscarUsuario(){
			$email = $_POST['email'];
			$psw = $_POST['psw'];
			$busqueda = $this->conexion->query("SELECT iddatos,idInmobiliaria, Usuario,nombres,paterno, td.Email, Status
            FROM tbldatos td
            inner join tblinmobiliaria ti on ti.idCliente= td.iddatos  WHERE td.Email = '$email' AND Contra = '$psw'")or die("No busqué el usuario");
            $resultado = $busqueda->fetch_array(MYSQL_ASSOC);
			if (count($resultado)>0) {
				if ($resultado[Status] == 0) {
				    //usuario no activado
                    session_destroy();
					return 2;
				}else{
				    // usuario encontrado
                    $_SESSION['id'] = $resultado[iddatos];
                    $_SESSION['usuario'] = $resultado[Usuario];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['nombres'] = $resultado[nombres];
                    $_SESSION['paterno'] = $resultado[paterno];
                    $_SESSION['inmobiliaria'] = $resultado[idInmobiliaria];
                    //todo bien
					return 1;
				}
			}else{
			     //usuario  no existe o usuario o pass incorrectos
                return $this->buscaAsesor();//entonces busco en la tabla de asesores
			}
			$this->conexion->free_result;
            $this->conexion->close();
		}

        public function buscaAsesor(){
            $psw = $_POST['psw'];
            $asesor = $this->conexion->query("SELECT idasesor, idcliente, nombres, email, paterno, estatus FROM tblasesores WHERE email='$_POST[email]' AND contra = '$psw'")or die("No encuentro al asesor");
            $res = $asesor->fetch_array(MYSQL_ASSOC);
            if (count($res)>0) {
                if ($res[estatus]==0) {
                    session_destroy();
                    return 2;
                }else{
                    // usuario encontrado
                    $_SESSION['id'] = $res[idcliente];
                    $_SESSION['idasesor'] = $res[idasesor];
                    $_SESSION['usuario'] = $res[nombres];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['nombres'] = $res[nombres];
                    $_SESSION['paterno'] = $res[paterno];
                    //$_SESSION['inmobiliaria'] = $res[idInmobiliaria];
                    //todo bien
                    header("location: ../user/index.php");
                }
            }else{
                return 0;
            }
        }
        
        public function validaSesion(){
            session_start();
            if(empty($_SESSION['usuario'])) {
                session_destroy();
                header("Location: ../zona.php?variable=!!");
                exit;
            }else{
                return $this->obtenEstatus();
            }     
        }
        public function obtenEstatus(){
            if (isset($_SESSION['idasesor'])) {
                $est = $this->conexion->query("SELECT estatus FROM tblasesores WHERE idasesor = '$_SESSION[idasesor]'")or die("no busque estatus de asesor");
                $aEstatus = $est->fetch_array(MYSQL_ASSOC);
                $retVal = ($aEstatus['estatus'] == 1) ? 3 : 4 ;
                return $retVal;
            }else {
                $est = $this->conexion->query("SELECT Status FROM tbldatos WHERE iddatos = '$_SESSION[id]'")or die("no busque estatus de cliente");
                $aEstatus = $est->fetch_array(MYSQL_ASSOC);
                 return $aEstatus['Status'];
            }
        }
        public function destruyeSesion(){
            session_start();
            session_destroy();
            header("Location: ../zona.php");
            exit;
        }
        public function validaAdmin(){
            session_start();
            if(empty($_SESSION['usuario'])) {
                session_destroy();
                header("Location: ../zona.php");
                exit;
            }elseif($_SESSION['usuario']!="admin"){
                session_destroy();
                header("Location: ../zona.php");
                exit;
            }        
        }
	}
?>