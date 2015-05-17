<?
require_once("include/Ciudad.php");

$idCiudad = $_GET['idCiudad'];

$ciudad=new Ciudad();
$ciudadList= $ciudad->getCiudadLocation($idCiudad);

$ubicacion = $ciudadList[0]['ubicacion'];

echo $ubicacion;

?>
