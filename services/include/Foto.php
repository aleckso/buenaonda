<?
require_once("Include.php");

class Foto{
		
	function Foto(){
	
	}

	function insertFoto($foto, $idArticulo){
		$ObjDB = new ConexionBD();
		$strSQL = "INSERT INTO foto (foto, idArticulo) VALUES ('$foto', $idArticulo)";
		//echo $strSQL;
		$ObjDB->db_query($strSQL);
		$ObjDB = NULL;
	}

	function getFotos($idArticulo){
		$ObjDB = new ConexionBD();
		$strSQL = "SELECT * FROM foto WHERE idArticulo=$idArticulo ORDER BY idFoto ASC";
		$arr = $ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB = NULL;	
	}

}
?>