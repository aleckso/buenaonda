<?
if (!isset($_SESSION)) {
  session_start();
}
require_once("include/Ciudad.php");
require_once("include/Proyecto.php");

$oProyecto = new Proyecto();

$id_usuario = $_SESSION['FBID'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$proyecto_datos = $oProyecto->insertProyecto($id_usuario, $titulo, $descripcion);
$id_proyecto = $proyecto_datos[0]['id_proyecto'];

echo $id_proyecto;
?>
