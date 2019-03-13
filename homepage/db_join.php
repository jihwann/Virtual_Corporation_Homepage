<?php
	require_once("../config/config.php");
	require_once("../lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
	$result=mysqli_query($conn,"SELECT * FROM topic");
 ?>