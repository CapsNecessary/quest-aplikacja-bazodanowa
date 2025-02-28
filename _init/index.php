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
			// Check if tables exist if not create them
			if( $c -> query( $d ) -> fetch_row()[ 0 ] + $c -> query( $e ) -> fetch_row()[ 0 ] !== 2 ){
				if( file_exists( "../tables.sql" ) ){
					$f = file_get_contents( "../tables.sql" );
					$q = $c -> query( $f );
					if( $q -> error == "" )	print( "Baza danych została wypełniona tabelami\n" );
					else print( $q -> error );
				}
			}
			// Check if data in tables exist if not fill them
			// if()
		}
		
		function queryIfTableExists( $t ){ return "SELECT count(*) FROM information_schema.tables WHERE table_schema = 'database_app' AND table_name = '$t';"; }
		function queryIfAnyRecordExists( $t ){ return "SELECT count(*) FROM $t"; }
	?>
</body>
</html>