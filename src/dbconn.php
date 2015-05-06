<?php
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'harit-db';
	$dbuser = 'harit-db';
	$dbpass = 'Z40YK7UbNXNGDFMx';
	$pdo = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf-8',$dbuser,$dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //$sql = "SELECT * FROM p";
?>