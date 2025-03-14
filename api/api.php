<?php
	$c = mysqli_connect( "localhost", "root", "", "database_app" );
	if( $c == true ){
		header("Content-Type: application/json");
		$m = $_SERVER['REQUEST_METHOD'];
		$in = json_decode( file_get_contents('php://input'), true );
		// print( json_encode( $in ) );
		switch ( $m ){
			case 'GET':
				// Exit if no table is selected
				if( !isSet( $_GET[ 'table' ] ) ) break;
				switch( $_GET[ 'table' ] ) {
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
				$uwiw		= $in[ 'uwiw' ]		 ?? null;		$kat	 = $in[ 'kat' ]		?? null;
				$sala		= $in[ 'sala' ]		 ?? null;		$lpWSali = $in[ 'lpWSali' ]	?? null;
				$model		= $in[ 'model' ]	 ?? null;		$wyglad	 = $in[ 'wyglad' ]	?? null;
				$processor	= $in[ 'processor' ] ?? null;		$ram	 = $in[ 'ram' ]		?? null;
				$plyta		= $in[ 'plyta' ]	 ?? null;		$dysk	 = $in[ 'dysk' ]	?? null;
				$przekatna	= $in[ 'przekatna' ] ?? null;		$mac	 = $in[ 'mac' ]		?? null;
				$licencje	= $in[ 'licencje' ]	 ?? null;		$inne	 = $in[ 'inne' ]	?? null;
				$q = $c -> prepare( "INSERT INTO `urzadzenia`( `uwiw`, `kategoria`, `sala`, `lpwsali`, `model`, `wyglad`, `procesor`, `ram`, `plyta`, `dysk`, `przekatna`, `mac`, `licencje`, `inne`)
					VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )" );
				$q -> bind_param( 'ssssssssssssss', $uwiw, $kat, $sala, $lpWSali, $model, $wyglad, $processor, $ram, $plyta, $dysk, $przekatna, $mac, $licencje, $inne );
				$q -> execute();
				break;
			case 'PUT':
				$id = $in[ 'id' ];
				if( isSet( $id ) ){
					$uwiw		= $in[ 'uwiw' ]		 ?? null;		$kat	 = $in[ 'kat' ]		?? null;
					$sala		= $in[ 'sala' ]		 ?? null;		$lpWSali = $in[ 'lpWSali' ]	?? null;
					$model		= $in[ 'model' ]	 ?? null;		$wyglad	 = $in[ 'wyglad' ]	?? null;
					$processor	= $in[ 'processor' ] ?? null;		$ram	 = $in[ 'ram' ]		?? null;
					$plyta		= $in[ 'plyta' ]	 ?? null;		$dysk	 = $in[ 'dysk' ]	?? null;
					$przekatna	= $in[ 'przekatna' ] ?? null;		$mac	 = $in[ 'mac' ]		?? null;
					$licencje	= $in[ 'licencje' ]	 ?? null;		$inne	 = $in[ 'inne' ]	?? null;
					$q = $c -> prepare( "UPDATE `urzadzenia` SET `uwiw` = ?,`kategoria` = ?,`sala` = ?,`lpwsali` = ?,`model` = ?,`wyglad` = ?,`procesor` = ?,`ram` = ?,`plyta` = ?
						`dysk` = ?, `przekatna` = ?,`mac` = ?,`licencje` = ?,`inne` = ? where id=?" );
					$q -> bind_param( 'ssssssssssssssi', $uwiw, $kat, $sala, $lpWSali, $model, $wyglad, $processor, $ram, $plyta, $dysk, $przekatna, $mac, $licencje, $inne, $id );
					$q -> execute();
					print( json_encode( "{`id`:$id }" ) );
				}
				else http_response_code( 418 );
				break;
			case 'DELETE':
				$id = $in[ 'id' ];
				if( isSet( $id ) ){
					$q = $c -> prepare( "DELETE FROM `urzadzenia` WHERE id = ?" );
					$q -> bind_param( "i", $id );
					$q -> execute();
					print( json_encode( "{`id`:$id }" ) );
				}
				else http_response_code( 418 );
				break;
			default:
				print( json_encode( "{ 'method': '$m' }" ) );
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