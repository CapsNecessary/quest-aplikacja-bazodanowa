<?php
	$c = mysqli_connect( "localhost", "root", "" );
	if( $c -> connect_error ) print( "Błąd podczas połączenia się z serwerem" );
	else{
		if( $c -> query( "CREATE DATABASE database_app;" ) == true ){
			print( "Baza danych została dobrze utworzona" )
			// $d = mysqli_connect( "localhost" )
			// require( "../.sql" )
		}
	}
	$c -> close();
?>