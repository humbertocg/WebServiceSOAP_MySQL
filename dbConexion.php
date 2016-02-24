<?php
	//mysqli_connect(URL, USER, PASS, DB)
	$conectar = mysqli_connect("localhost", "root", "pass", "webservice") or die("Error " . mysqli_error($conectar));
?>
