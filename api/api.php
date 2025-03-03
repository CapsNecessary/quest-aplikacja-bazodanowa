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
				$uwiw = $in[ 'uwiw' ];
				$kat = $in[ 'kat' ];
				$sala = $in[ 'sala' ];
				$lpWSali = $in[ 'lpWSali' ];
				$model = $in[ 'model' ];
				$wyglad = $in[ 'wyglad' ];
				$processor = $in[ 'processor' ];
				$ram = $in[ 'ram' ];
				$plyta = $in[ 'plyta' ];
				$dysk = $in[ 'dysk' ];
				$przkatna = $in[ 'przkatna' ];
				$mac = $in[ 'mac' ];
				$linecje = $in[ 'linecje' ];
				$inne = $in[ 'inne' ];
				// INSERT INTO `urzadzenia`( `uwiw`, `kategoria`, `sala`, `lpwsali`, `model`, `wyglad`, `procesor`, `ram`, `plyta`, `dysk`, `przekatna`, `mac`, `licencje`, `inne`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]')
				break;
			case 'PUT':
			case `DELETE`:
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