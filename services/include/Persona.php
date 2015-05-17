<?
require_once("Include.php");

class Persona{
		
	function Persona(){
	
	}

	function insertPersona($_cedula, $_nombres, $_apellidos, $_email, $_contrasena, $_direccion, $_telefono, $_celular, $_genero, $_tipo_persona, $_idCiudad){
		$ObjDB = new ConexionBD();
		$strSQL = "INSERT INTO persona (cedula, nombres, apellidos, email, contrasena, direccion, telefono, celular, genero, tipo_persona, idCiudad) ";
		$strSQL = $strSQL."VALUES ('$_cedula', '$_nombres', '$_apellidos', '$_email', '$_contrasena', '$_direccion', '$_telefono', '$_celular', '$_genero', '$_tipo_persona', $_idCiudad)";
		//echo $strSQL;
		$ObjDB->db_query($strSQL);
		$ObjDB = NULL;
	}

	function getPersona($_email, $_contrasena){
		$ObjDB = new ConexionBD();
		$strSQL = "SELECT * FROM persona WHERE email='$_email' AND contrasena='$_contrasena' ";
		$arr = $ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB = NULL;
	}

	function getPersonaByCedula($_cedula){
		$ObjDB = new ConexionBD();
		$strSQL = "SELECT * FROM persona WHERE cedula='$_cedula'";
		$arr = $ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB = NULL;
	}

}
?>









