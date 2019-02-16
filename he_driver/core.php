<?php 
	require("route.php");
	$sess = (object)$_SESSION;
	if(isset($client)):
		include("script_client.php");
	else:
		$obj = (object)$_REQUEST;
		if(count((array)$obj)>0)
			foreach ($obj as $i => $val) 
				if(gettype($obj->$i) == "array")
					$obj->$i = (object)$obj->$i;

		function res($dt){
			if( gettype($dt) == "string" )
					echo $dt;
				else
					echo json_encode($dt);
				exit();
		}

		require("mysql.php") ;
	endif;
 ?>