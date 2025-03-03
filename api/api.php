<?php
	$c = mysqli_connect( "localhost", "root", "", "database_app" );
	if( $c == true ){
		header("Content-Type: application/json");
		$m = $_SERVER['REQUEST_METHOD'];
		$in = json_decode( file_get_contents('php://input'), true );
		switch ( $m ){
			case 'GET':
				switch( $_GET['table'] ) {
					case 'urzadzenia':
						printTableAsJson( 'urzadzenia' )l
						break;
					case 'uzytkownicy':
						printTableAsJson( `uzytkownicy` );
						break;
					case 'wydarzenia':
						printTableAsJson( `wydarzenia` );
						break;
					default:
						http_response_code( 418 );
						break;
				}
				break;
			case 'POST':
				
				break;
			default:
				break;
		}
	}
	$c -> close();
	
	function printTableAsJson( $t ){
		global $c;
		print( json_encode( $c -> query( "SELECT * FROM `$t`" ) -> fetch_assoc() ) );
	}
?>