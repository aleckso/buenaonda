<?
require_once("include/Ciudad.php");

$idDepartamento = $_GET['idDepartamento'];

$ciudad=new ciudad();
$ciudadList= $ciudad->getCiudadesByDepartamento($idDepartamento);

if(count($ciudadList)>0){
	for($i=0; $i<= count($ciudadList)-1; $i++){
		if($i<count($ciudadList)-1){
			echo $ciudadList[$i]['id_ciudad']."|".$ciudadList[$i]['nombre_ciudad'].",";
		}else{
			echo $ciudadList[$i]['id_ciudad']."|".$ciudadList[$i]['nombre_ciudad'];
		}
	}
}else{
	echo "-1| -- SELECT STATE --";
}

?>
