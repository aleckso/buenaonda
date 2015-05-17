<?
require_once("Include.php");

class Usuario{
		
	function Usuario(){
	
	}
	
	function isUsuario($id_usuario){
		$ObjDB= new ConexionBD();
		$strSQL="SELECT * FROM usuario WHERE id_usuario='$id_usuario'";
		$arr=$ObjDB->db_result_to_array($strSQL);
		if($ObjDB->db_query_numfilas!=0){
			$existe=1;
		}else{
			$existe=0;
		}
		$ObjDB=NULL;
		return $existe;
	}
	
	function getUsuario($id_usuario){
		$ObjDB= new ConexionBD();
		$strSQL="SELECT id_usuario, nombres, email, puntos, nivel, UNIX_TIMESTAMP(fecha_registro) fecha_registro FROM usuario WHERE id_usuario='$id_usuario'";
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;
	}

	function insertUsuario($id_usuario, $nombres, $email, $foto){
		$ObjDB = new ConexionBD();
		$strSQL="INSERT INTO usuario (id_usuario, nombres, email, foto) ";
		$strSQL= $strSQL."VALUES ('$id_usuario','$nombres', '$email', '$foto')";
		$ObjDB->db_query($strSQL);
		$ObjDB=NULL;
	}

}
?>









