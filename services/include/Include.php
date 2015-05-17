<?php
require_once("Configuracion.php");

class ConexionBD
{
	var $hostname;
	var $database;
	var $username;
	var $password;
	var $db_query_numfilas;

	function ConexionBD()
	{
	 $ObjConf= new Configuracion();
	 $this->hostname = $ObjConf->getHostName();
	 $this->database = $ObjConf->getDataBase();
	 $this->username = $ObjConf->getUserName();
	 $this->password = $ObjConf->getPassword();
	 $this->db_query_numfilas=0;
	 $ObjConf=NULL;
	}
	
	function db_result_to_array($strSQL){
		try {
			$conn = mysqli_connect($this->hostname,$this->username,$this->password, $this->database);
			if (mysqli_connect_errno()) {
			    printf("Falló la conexión: %s\n", $mysqli->connect_error);
			    exit();
			}

			$result = $conn->query($strSQL);
			
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
			
			return $rows ;
		}catch (Exception $e) {
	    	//echo 'Caught exception: ',  $e->getMessage(), "-".$strSQL."\n";
		}
	}

	function db_valor($strSQL)
	{
		try {
			$conn = mysqli_connect($this->hostname,$this->username,$this->password, $this->database);
			if (mysqli_connect_errno()) {
			    printf("Falló la conexión: %s\n", $mysqli->connect_error);
			    exit();
			}

			$result = $conn->query($strSQL);
			
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
			
			return $rows[0][0] ;
		}catch (Exception $e) {
	    	//echo 'Caught exception: ',  $e->getMessage(), "-".$strSQL."\n";
		}
	}
	
	function db_query($strSQL){
		try {
			$conn = mysqli_connect($this->hostname,$this->username,$this->password, $this->database);
			if (mysqli_connect_errno()) {
			    printf("Falló la conexión: %s\n", $mysqli->connect_error);
			    exit();
			}
			$result = $conn->query($strSQL);
			
		}catch (Exception $e) {
	    	//echo 'Caught exception: ',  $e->getMessage(), "-".$strSQL."\n";
		}
	}

}
?>

