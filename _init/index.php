<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>_init</title>
	<link rel="stylesheet" href="../css/dark-and-light-mode.css">
</head>
<body>
	<?php
		date_default_timezone_set( 'Europe/Warsaw' );
		printMessageWithTimestampNewline( "_init" );
		$c = mysqli_connect( "localhost", "root", "" );
		if( $c -> connect_error ) printMessageWithTimestampNewline( "Błąd podczas połączenia się z serwerem" );
		else{
			if( $c -> query( "SELECT COUNT(*) AS `exists` FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMATA.SCHEMA_NAME='database_app'" ) -> fetch_row()[ 0 ] != 1 ){
				if( $c -> query( "CREATE DATABASE database_app;" ) == true ){
					$d = mysqli_connect( "localhost", "root", "", "database_app" );
					printMessageWithTimestampNewline( "Baza danych została dobrze utworzona" );
					fillDatabase();
				}
			}
			else{
				$d = mysqli_connect( "localhost", "root", "", "database_app" );
				printMessageWithTimestampNewline( "Baza danych już istnieje" );
				fillDatabase();
			}
		}
		$c -> close();
	
		function fillDatabase(){
			$c = mysqli_connect( "localhost", "root", "", "database_app" );
			$d = queryIfTableExists( "urzadzenia" );
			$u = queryIfTableExists( "uzytkownicy" );
			$e = queryIfTableExists( "wydarzenia" );
			// Check if tables exist if not create them
			if( $c -> query( $d ) -> fetch_row()[ 0 ] + $c -> query( $u ) -> fetch_row()[ 0 ] + $c -> query( $e ) -> fetch_row()[ 0 ] !== 3 ){
				if( file_exists( "../tables.sql" ) ){
					$f = file_get_contents( "../tables.sql" );
					$q = $c -> multi_query( $f );
					if( $q ){
						printMessageWithTimestampNewline( "Baza danych została wypełniona tabelami" );
						goto fillingTables;
					}
					else printMessageWithTimestampNewline( "Bład podczas wypełniania bazy tabelami" );
				}
			}
			else printMessageWithTimestampNewline( "Baza danych ma już tabele" );
			// Check if data in tables exist if not fill them
			$d = queryIfAnyRecordExists( "urzadzenia" );
			$e = queryIfAnyRecordExists( "wydarzenia" );
			if( $c -> query( $d ) -> fetch_row()[ 0 ] + $c -> query( $e ) -> fetch_row()[ 0 ] < 2 ){
				fillingTables:
				if( file_exists( "../data.sql" ) ){
					$f = file_get_contents( "../data.sql" );
					$q = $c -> multi_query( $f );
					if( $q ) printMessageWithTimestampNewline( "Baza danych została wypełniona danymi" );
					else printMessageWithTimestampNewline( "Błąd podczas wypełniania tabeli" );
				}
			}
			else printMessageWithTimestampNewline( "Baza danych jest już wypełniona danymi" );
		}
	
		function queryIfTableExists( $t ){ return "SELECT count(*) FROM information_schema.tables WHERE table_schema = 'database_app' AND table_name = '$t';"; }
		function queryIfAnyRecordExists( $t ){ return "SELECT count(*) FROM $t"; }
	
		function printMessageWithTimestampNewline( $m ){ print( "[ ".date( "G:i:s", time() )." ] $m<br/>" ); };
	?>
</body>
</html>