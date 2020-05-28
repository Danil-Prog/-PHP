<?php 

	require "libs/rb.php";
	R::setup( 'mysql:host=localhost;dbname=hellophp',
        'root', 'root' );

	session_start(); 