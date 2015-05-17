<?
require_once("Include.php");

class TipoArticulo{
		
	function TipoArticulo(){
	
	}

	function getTipoArticulos(){
		$ObjDB = new ConexionBD();
		$strSQL = "SELECT * FROM tipo_articulo";
		$arr = $ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB = NULL;
	}

}
?>