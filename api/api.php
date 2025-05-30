<?php
	$c = mysqli_connect( "localhost", "root", "", "database_app" );
	if( $c == true ){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: *");
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
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
						printTableAsJson( 'uzytkownicy' );
						break;
					case 'wydarzenia':
						printTableAsJson( 'wydarzenia' );
						break;
					default:
						http_response_code( 404 );
						break;
				}
				break;
			case 'POST':
				$uwiw			= $in[ 'uwiw' ]			?? "''";		$kat	 = $in[ 'kat' ]		?? "''";
				$sala			= $in[ 'sala' ]			?? "''";		$lpWSali = $in[ 'lpWSali' ]	?? "''";
				$model			= $in[ 'model' ]		?? "''";		$wyglad	 = $in[ 'wyglad' ]	?? "''";
				$processor		= $in[ 'processor' ]	?? "''";		$ram	 = $in[ 'ram' ]		?? "''";
				$plyta			= $in[ 'plyta' ]		?? "''";		$dysk	 = $in[ 'dysk' ]	?? "''";
				$przekatna		= $in[ 'przekatna' ]	?? "''";		$mac	 = $in[ 'mac' ]		?? "''";
				$licencje		= $in[ 'licencje' ]		?? "''";		$inne	 = $in[ 'inne' ]	?? "''";
				$data_zakupu	= $in[ 'data_zakupu' ]	?? "''";		$status	 = $in[ 'status' ]	?? "''";
				$q = $c -> prepare( "INSERT INTO `urzadzenia`( `uwiw`, `kategoria`, `sala`, `lpwsali`, `model`, `wyglad`, `procesor`, `ram`, `plyta`, `dysk`, `przekatna`, `mac`, `licencje`, `inne`, `data_zakupu`, `status`)
					VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )" );
				$q -> bind_param( 'ssssssssssssssds', $uwiw, $kat, $sala, $lpWSali, $model, $wyglad, $processor, $ram, $plyta, $dysk, $przekatna, $mac, $licencje, $inne, $data_zakupu, $status );
				$q -> execute();
				break;
			case 'PUT':
				$id = $in[ 'id' ];
				if( isSet( $id ) ){
					$uwiw			= $in[ 'uwiw' ]			?? "''";		$kat	 = $in[ 'kat' ]		?? "''";
					$sala			= $in[ 'sala' ]			?? "''";		$lpWSali = $in[ 'lpWSali' ]	?? "''";
					$model			= $in[ 'model' ]		?? "''";		$wyglad	 = $in[ 'wyglad' ]	?? "''";
					$processor		= $in[ 'processor' ]	?? "''";		$ram	 = $in[ 'ram' ]		?? "''";
					$plyta			= $in[ 'plyta' ]		?? "''";		$dysk	 = $in[ 'dysk' ]	?? "''";
					$przekatna		= $in[ 'przekatna' ]	?? "''";		$mac	 = $in[ 'mac' ]		?? "''";
					$licencje		= $in[ 'licencje' ]		?? "''";		$inne	 = $in[ 'inne' ]	?? "''";
					$data_zakupu	= $in[ 'data_zakupu' ]	?? "''";		$status	 = $in[ 'status' ]	?? "''";
					$q = $c -> prepare( "UPDATE `urzadzenia` SET `uwiw` = ?,`kategoria` = ?,`sala` = ?,`lpwsali` = ?,`model` = ?,`wyglad` = ?,`procesor` = ?,`ram` = ?,`plyta` = ?,
						`dysk` = ?, `przekatna` = ?,`mac` = ?,`licencje` = ?,`inne` = ?, `data_zakupu` = ?, `status` = ? where id=?" );
					$q -> bind_param( 'ssssssssssssssbsi', $uwiw, $kat, $sala, $lpWSali, $model, $wyglad, $processor, $ram, $plyta, $dysk, $przekatna, $mac, $licencje, $inne, $data_zakupu, $status, $id );
					$q -> execute();
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
		$q = $c -> query( "SELECT * FROM `$t`" );
		print( json_encode( $q -> fetch_all() ) );
	}
?>