<?php
	date_default_timezone_set( 'Europe/Warsaw' );
	printMessageWithTimestampNewline( "_init" );
	$c = mysqli_connect( "localhost", "root", "" );
	if( $c -> connect_error ) printMessageWithTimestampNewline( "Błąd podczas połączenia się z serwerem" );
	else{
		$d = mysqli_connect( "localhost", "root", "", "database_app" );
		if( $d == false ){
			if( $c -> query( "CREATE DATABASE database_app;" ) == true ){
				printMessageWithTimestampNewline( "Baza danych została dobrze utworzona" );
				fillDatabase( $d );
			}
		}
		else{
			printMessageWithTimestampNewline( "Baza danych już istnieje" );
			fillDatabase( $d );
		}
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
				if( $q -> error == "" ){
					printMessageWithTimestampNewline( "Baza danych została wypełniona tabelami" );
					goto fillingTables;
				}
				else printMessageWithTimestampNewline( $q -> error );
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
				$q = $c -> query( $f );
				if( $q -> error == "" ) printMessageWithTimestampNewline( "Baza danych została wypełniona danymi" );
				else printMessageWithTimestampNewline( $q -> error );
			}
		}
		else printMessageWithTimestampNewline( "Baza danych jest już wypełniona danymi" );
	}

	function queryIfTableExists( $t ){ return "SELECT count(*) FROM information_schema.tables WHERE table_schema = 'database_app' AND table_name = '$t';"; }
	function queryIfAnyRecordExists( $t ){ return "SELECT count(*) FROM $t"; }

	function printMessageWithTimestampNewline( $m ){ print( "[ ".date( "G:i:s", time() )." ] $m<br/>" ); };
?>