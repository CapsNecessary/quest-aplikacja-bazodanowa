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
						printTableAsJson( 'urzadzenia' );
						break;
					case 'uzytkownicy':
						printTableAsJson( `uzytkownicy` );
						break;
					case 'wydarzenia':
						printTableAsJson( `wydarzenia` );
						break;
					default:
						http_response_code( 404 );
						break;
				}
				break;
			case 'POST':
				$uwiw		= $in[ 'uwiw' ];			$kat		= $in[ 'kat' ];
				$sala		= $in[ 'sala' ];			$lpWSali	= $in[ 'lpWSali' ];
				$model		= $in[ 'model' ];			$wyglad		= $in[ 'wyglad' ];
				$processor	= $in[ 'processor' ];		$ram		= $in[ 'ram' ];
				$plyta		= $in[ 'plyta' ];			$dysk		= $in[ 'dysk' ];
				$przekatna	= $in[ 'przekatna' ];		$mac		= $in[ 'mac' ];
				$licencje	= $in[ 'licencje' ];		$inne		= $in[ 'inne' ];
				$q = $c -> prepare( "INSERT INTO `urzadzenia`( `uwiw`, `kategoria`, `sala`, `lpwsali`, `model`, `wyglad`, `procesor`, `ram`, `plyta`, `dysk`, `przekatna`, `mac`, `licencje`, `inne`)
					VALUES ( '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?' )" );
				$q -> bind_param( 'ssssssssssssss', $uwiw, $kat, $sala, $lpWSali, $model, $wyglad, $processor, $ram, $plyta, $dysk, $przekatna, $mac, $licencje, $inne );
				$q -> execute();
				break;
			case 'PUT':
				$id = $in[ 'id' ];
				if( isSet( $id ) ){
					$uwiw		= $in[ 'uwiw' ];			$kat	 = $in[ 'kat' ];
					$sala		= $in[ 'sala' ];			$lpWSali = $in[ 'lpWSali' ];
					$model		= $in[ 'model' ];			$wyglad	 = $in[ 'wyglad' ];
					$processor	= $in[ 'processor' ];		$ram	 = $in[ 'ram' ];
					$plyta		= $in[ 'plyta' ];			$dysk	 = $in[ 'dysk' ];
					$przekatna	= $in[ 'przekatna' ];		$mac	 = $in[ 'mac' ];
					$licencje	= $in[ 'licencje' ];		$inne	 = $in[ 'inne' ];
					$q = $c -> prepare( "UPDATE `urzadzenia` SET `uwiw` = '?',`kategoria` = '?',`sala` = '?',`lpwsali` = '?',`model` = '?',`wyglad` = '?',`procesor` = '?',`ram` = '?',`plyta` = '?'
						`dysk` = '?', `przekatna` = '?',`mac` = '?',`licencje` = '?',`inne` = '?' where id=?" );
					$q -> bind_param( 'ssssssssssssssi', $uwiw, $kat, $sala, $lpWSali, $model, $wyglad, $processor, $ram, $plyta, $dysk, $przekatna, $mac, $licencje, $inne, $id );
					$q -> execute();
				}
				else http_response_code( 418 );
				break;
			case `DELETE`:
				$id = $in[ 'id' ];
				if( isSet( $id ) ){
					$q = $c -> prepare( "DELETE FROM `urzadzenia` WHERE id = '?'" );
					$q -> bind_param( "i", $id );
					$q -> execute();
				}
				else http_response_code( 418 );
				break;
			default:
				http_response_code( 200 );
				break;
		}
	}
	$c -> close();
	
	function printTableAsJson( $t ){
		global $c;
		print( json_encode( $c -> query( "SELECT * FROM `$t`" ) -> fetch_assoc() ) );
	}
?>