<?php

// $deploy = empty( $_GET[ 'deploy' ] ) ? false : true;
// $deploy_script_given = empty( $_GET[ 'deploy_script' ] ) ? false : true;

// if ( $deploy_script_given ) {
// 	$deploy_script = $_GET[ 'deploy_script' ];
// } else {

// 	// $deploy_script = 'rm -rf /var/www/html; cd /var/www; git clone https://github.com/MarioWindsor/LivingWalls-Test.git html';
// 	$deploy_script = 'ls -la /var/www/html/';
// }

// if ( $deploy ) {
// 	$deployment_status = exec( $deploy_script );
// }

// require 'deploy.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>title</title>
</head>
<body>

	<h1>Deploy</h1>

	<h2>code</h2>

	<form class="js_script_form">
		<input type="text" name="" id="script">
		<!-- <a href="/?deploy=true">Deploy</a> -->
		<button class="js_deploy" type="submit">Deploy</button>
	</form>

	<br>
	<code>:: script ::</code>
	<br>
	<code class="js_script_content"><?php // echo $script; ?></code>

	<br>
	<code>:: status ::</code>
	<br>
	<code class="js_script_status"><?php // echo $status; ?></code>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">

		$( ".js_script_form" ).on( "submit", function ( event ) {

			event.preventDefault();

			var script = $( "#script" ).val();
			$( '.js_script_content' ).text( script )

			$.ajax( {
				url: "/deploy.php",
				data: {
					script
				}
			} )
				.done( function ( r, e ) {
					var response;
					try {
						response = JSON.parse( r );
					} catch ( e ) {}
					console.log( response.status )
					$( '.js_script_status' ).text( response.status )
				} )

		} );

	</script>

</body>
</html>
