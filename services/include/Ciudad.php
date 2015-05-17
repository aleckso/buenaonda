<?
require_once("Include.php");

class Ciudad{
		
	function Ciudad(){
	
	}

	function getCiudades(){
		$ObjDB = new ConexionBD();
		$strSQL = "SELECT * FROM ciudad";
		$arr = $ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB = NULL;
	}

}
?>