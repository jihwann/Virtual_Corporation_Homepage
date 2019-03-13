<?php
    if($_POST){
    require("../config/config.php");
	require("../lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
    $Qes = mysqli_real_escape_string($conn,$_POST['Qes']);
    $sql = "SELECT name FROM user WHERE name='".$name."'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows !="0"){
        echo json_encode(array('id' => 'Exist'));
    }else{
        $sql ="INSERT INTO user (name,password,Qes) VALUES('".$name."','".$password."','".$Qes."')";
        mysqli_query($conn,$sql);
        echo json_encode(array('id' => 'Success'));
    }    
    }
?>
