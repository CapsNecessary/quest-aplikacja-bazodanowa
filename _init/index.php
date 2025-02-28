<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php
		print( "_init" );
		$c = mysqli_connect( "localhost", "root", "" );
		if( $c -> connect_error ) print( "Błąd podczas połączenia się z serwerem\n" );
		else{
			$d = mysqli_connect( "localhost", "root", "", "database_app" );
			if( $d == false ){
				if( $c -> query( "CREATE DATABASE database_app;" ) == true ){
					print( "Baza danych została dobrze utworzona\n" );
					fillDatabase( $d );
				}
			}
			else fillDatabase( $d );
		}
		$c -> close();
				
		function fillDatabase( $c ){
			$d = queryIfTableExists( "urzadzenia" );
			$e = queryIfTableExists( "wydarzenia" );
			if( $c -> query( $d ) + $c -> query( $e ) !== 2 ){		
				if( file_exists( "../tables.sql" ) ){
					$f = file_get_contents( "../tables.sql" );
					$q = $c -> query( $f );
					if( $q -> error == "" )	print( "Baza danych została wypełniona\n" );
					else print( $q -> error );
				}
			}
			if
		}
		
		function queryIfTableExists( $t, $d ){ return "SELECT count(*) FROM information_schema.tables WHERE table_schema = '$d' AND table_name = '$t';"; }
	?>
</body>
</html>