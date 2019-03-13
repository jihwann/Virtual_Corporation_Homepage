<?php
    session_start();
    require("../config/config.php");
	require("../lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    $id = $_SESSION['board'];
    $name = mysqli_real_escape_string($conn,$_SESSION['name']);
    $contents = mysqli_real_escape_string($conn,$_POST['comment']);
    $query = "SELECT name FROM user WHERE name='".$name."'";
    $result = mysqli_query($conn,$query);
    if($result->num_rows=="0"){
        echo json_encode(array('result' => 'False'));
    }
    else{
    $query = "INSERT INTO comment (id,name,contents,created) VALUES('".$id."','".$name."','".$contents."',now())";
    mysqli_query($conn,$query);
    echo json_encode(array('result' => 'Success'));
    }
?>