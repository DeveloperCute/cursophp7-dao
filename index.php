<?php 
	
	require_once("config.php");

	$root = new usuario();

	$root->loadById(3);

	echo $root;





 ?>	