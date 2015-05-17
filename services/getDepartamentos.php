<?
require_once("include/Ciudad.php");

$idDepartamento = $_GET['idDepartamento'];

$ciudad=new ciudad();
$departamentoList= $ciudad->getDepartamentos($idDepartamento);

echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<ObjectData>';
	echo '<departamentos>';
	for($i=0; $i<= count($departamentoList)-1; $i++){
		echo '<departamento>';
			echo '<id>'.$departamentoList[$i]['idDepartamento']."</id>";
			echo '<nombre>'.$departamentoList[$i]['departamento']."</nombre>";
			$nodos = rand(0,10);
			echo '<nodos>';
			for($j=0; $j<$nodos;$j++){ 
				$nodo = rand(0,10).'.'.rand(0,10).'.'.rand(0,10).'.'.rand(0,10);
				$alerta = rand(0,4);
				if($alerta!=1){
					$alerta=0;
				}
				echo '<nodo>';
					echo '<ip>'.$nodo."</ip>";
					echo '<alerta>'.$alerta."</alerta>";
				echo '</nodo>';
			}
			echo '</nodos>';
		echo '</departamento>';
	}
	echo '</departamentos>';

echo '</ObjectData>';

?>
