<?php

ini_set( "display_errors", "On" );
ini_set( "error_reporting", E_ALL );


// do not let this script timeout
// ( because we know it might take a while )
set_time_limit( 0 );





$script = $_GET[ 'script' ] ?? 'ls -la /var/www/html/';

$status = exec( $script );

die( json_encode( [
	'status' => $status
] ) );

// git fetch --all
// git reset --hard origin/master

// die( json_encode( [
// 	'status' => $status
// ] ) );
