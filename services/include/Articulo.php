<?
require_once("Include.php");

class Articulo{
		
	function Articulo(){
	
	}

	function insertArticulo($_articulo, $_descripcion, $_cantidad, $_talla, $_genero, $_precio, $_id_tipo_articulo){
		$ObjDB = new ConexionBD();
		$strSQL = "INSERT INTO articulo (articulo, descripcion, cantidad, talla, genero, precio, id_tipo_articulo) ";
		$strSQL = $strSQL."VALUES ('$_articulo', '$_descripcion', $_cantidad, '$_talla', '$_genero', $_precio, $_id_tipo_articulo)";
		$ObjDB->db_query($strSQL);
		//
		$strSQL = "SELECT idArticulo FROM articulo ORDER BY idArticulo DESC";
		$arr = $ObjDB->db_result_to_array($strSQL);
		return $arr[0]['idArticulo'];
		$ObjDB = NULL;
	}

	function getArticulo($idArticulo){
		$ObjDB = new ConexionBD();
		$strSQL = "SELECT * FROM articulo WHERE idArticulo=$idArticulo";
		$arr = $ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB = NULL;
	}

	function getArticuloList($id_tipo_articulo){
		$ObjDB = new ConexionBD();
		$strSQL = "SELECT * FROM articulo a, foto b WHERE a.idArticulo= b.idArticulo ";
		if(isset($id_tipo_articulo)){
			$strSQL = $strSQL."AND a.id_tipo_articulo=$id_tipo_articulo ";
		}
		$strSQL = $strSQL."GROUP BY a.idArticulo ORDER BY a.idArticulo DESC";
		$arr = $ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB = NULL;
	}

}
?>









