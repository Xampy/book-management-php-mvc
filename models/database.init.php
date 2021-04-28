<?php

	$database = null;

	try {
		
		$database = new PDO('mysql:host=localhost;dbname=boobook;charset=utf8', 'root', '');


	} catch (Exception $e) {
		
	}