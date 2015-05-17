<?
require_once("Include.php");

class Proyecto{
		
	function Proyecto(){
	
	}
	
	function getProyecto($id_proyecto){
		$ObjDB= new ConexionBD();
		$strSQL="SELECT * FROM proyecto WHERE id_proyecto=$id_proyecto";
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;
	}

	function insertProyecto($id_usuario, $titulo, $descripcion){
		$ObjDB = new ConexionBD();
		$strSQL="INSERT INTO proyecto (id_usuario_creador, titulo, descripcion) ";
		$strSQL= $strSQL."VALUES ('$id_usuario_creador', '$titulo', '$descripcion')";
		$ObjDB->db_query($strSQL);
		//
		$strSQL="SELECT * FROM proyecto ORDER BY id_proyecto DESC";
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;
	}

}
?>









