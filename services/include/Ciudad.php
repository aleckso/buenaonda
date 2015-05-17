<?
require_once("Include.php");

class Ciudad{
		
	function Ciudad(){
	
	}
	
	function getCiudades(){
		$ObjDB= new ConexionBD();
		$strSQL="SELECT id_ciudad, nombre_ciudad FROM ciudad order by nombre_ciudad asc";
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;	
	}

	function getCiudadesAll(){
		$ObjDB= new ConexionBD();
		$strSQL="SELECT * FROM ciudad order by nombre_ciudad asc";
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;	
	}

	function getCiudadesDepartamentosSinMapa(){
		$ObjDB= new ConexionBD();
		$strSQL="SELECT * FROM ciudad a, departamento b WHERE a.id_departamento=b.id_departamento AND a.ubicacion = '' order by nombre_ciudad asc";
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;	
	}

	function getCiudadesLocation(){
		$ObjDB= new ConexionBD();
		$strSQL="SELECT a.id_ciudad, a.nombre_ciudad, a.ubicacion, a.zoom FROM ciudad a, lugar b WHERE a.id_ciudad = b.id_ciudad AND a.ubicacion !='' AND b.ubicacionLugar!='' group by nombre_ciudad order by nombre_ciudad asc";
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;
	}

	function getCiudadLocation($id_ciudad){
		$ObjDB= new ConexionBD();
		$strSQL="SELECT ubicacion FROM ciudad WHERE id_ciudad=$id_ciudad ";
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;
	}

	function getCiudadesByDepartamento($id_departamento){
		$ObjDB= new ConexionBD();
		$strSQL="select * from ciudad where id_departamento=".$id_departamento;
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;	
	}
	
	function getCiudad($id_ciudad){
		$ObjDB= new ConexionBD();
		$strSQL="select * from ciudad where id_ciudad=".$id_ciudad;
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;	
	}
	
	function getDepartamento($id_departamento){
		$ObjDB= new ConexionBD();
		$strSQL="select * from departamento where id_departamento=".$id_departamento;
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;	
	}
		
	function getDepartamentos(){
		$ObjDB= new ConexionBD();
		$strSQL="select * from departamento order by nombre_departamento asc";
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;	
	}
	
	function getDepartamentoByIdCiudad($idCiudad){
		$ObjDB= new ConexionBD();
		$strSQL="select * from departamento a, ciudad b where b.id_departamento=a.id_departamento AND b.id_ciudad=".$idCiudad;
		//echo "strSQL: ".$strSQL;
		$arr=$ObjDB->db_result_to_array($strSQL);
		return $arr;
		$ObjDB=NULL;
	}

	function updateUbicacion($id_ciudad, $ubicacion, $zoom){
		$ObjDB = new ConexionBD();
		$strSQL="UPDATE ciudad SET ubicacion='".$ubicacion."', zoom=".$zoom." WHERE id_ciudad=".$id_ciudad;
		//echo '<br>'.$strSQL;
		$ObjDB->db_query($strSQL);
		$ObjDB=NULL;
	}
}
?>