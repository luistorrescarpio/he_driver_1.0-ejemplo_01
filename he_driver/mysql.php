<?php 
/*
	Autor del Script: Luis Torres Carpio
	Versión: 1.1.0
	Correo: luis.torres.carpio1@gmail.com
	Descripción: 
		Script para facilitar las consultas en Mysql desde PHP
		Pensado para el desarrollo agil.
	Caracteristicas:
		- Simplicidad
		- Escalabilidad
		- Productividad
		- Usabilidad
*/
class conexion{	
	private $server;
	private $user;
	private $clave;
	private $db;
	
	public $conex;
	
	function __construct()
	{	
		$this->server="127.0.0.1";
		$this->user="root";
		$this->clave="";
		$this->db="ejemplo_01";
	}
	public function conectar()
	{
		$this->conex=new mysqli($this->server,$this->user,$this->clave,$this->db);
		$this->conex->set_charset("utf8");//save accent db
	}
	public function cerrar()
	{
		$this->conex->close();
	}
}
function query_exec($query){
	$mc=new conexion();
	$mc->conectar();
	$mc->conex->multi_query($query);
	while ($mc->conex->next_result()) {;} // flush multi_queries
	$mc->cerrar();
	return 1;
}
function query($query){
	$type = array(
		"INSERT INTO", 
		"INSERT", 
		"UPDATE",
		"SELECT * FROM",
		"SELECT",
		"DELETE FROM",
		);
	for($i=0;$i<count($type);$i++){

		if (strpos($query, $type[$i]) !== false){
			$mc=new conexion();
			$mc->conectar();
			switch ($type[$i]) {
				case 'INSERT INTO':
					$mc->conex->query($query);
					$id=$mc->conex->insert_id;
					return $id;
					break;
				
				case 'UPDATE':
					if(!$mc->conex->query($query))
						return 0;
					return 1;
					break;	

				case 'SELECT * FROM':
					$results = $mc->conex->query($query);
					if($results->num_rows>0){
						while( $rr = mysqli_fetch_assoc($results) ) $rows[] = (object)$rr;
					
						return $rows;
					}else
						return [];
					break;

				case 'SELECT':
					$results = $mc->conex->query($query);
					if($results->num_rows>0){
						while( $rr = mysqli_fetch_assoc($results) ) $rows[] = (object)$rr;
					
						return $rows;
					}else
						return [];
					break;
					
				case 'DELETE FROM':
					if(!$mc->conex->query($query))
						return 0;
					return 1;
					break;
			}
		$mc->cerrar();
		}
	}
}

?>