<?php
	$c = mysqli_connect( "localhost", "root", "" );
	if( $c -> connect_error ) print( "Błąd podczas połączenia się z serwerem" );
	else{
		if( $c -> query( "CREATE DATABASE database_app;" ) == true ){
			print( "Baza danych została dobrze utworzona" )
			$d = mysqli_connect( "localhost", "root", "", "database_app" );
			if( file_exists( "../.sql" ) ){
				$f = file_get_contents( "../.sql" );
				$q = $d -> query( $f );
				if( $q -> error !== "" ) print( $q -> error );
			}
		}
	}
	$c -> close();
?>