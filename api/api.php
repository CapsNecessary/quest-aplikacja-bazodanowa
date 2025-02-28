<?php
	$c = mysqli_connect( "localhost", "root", "", "database_app" );
	if( $c == true ){
		header("Content-Type: application/json");
		$m = $_SERVER['REQUEST_METHOD'];
		$in = json_decode( file_get_contents('php://input'), true );
		switch ( $m ){
			case 'GET':
				
				break;
			default:
				break;
		}
	}
	$c -> close();
?>