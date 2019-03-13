<?php
    require("../config/config.php");
	require("../lib/db.php");
    $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);

    $id = mysqli_real_escape_string($conn,$_POST['name']);
    $passwd = mysqli_real_escape_string($conn,$_POST['password']);
    $Qes = mysqli_real_escape_string($conn,$_POST['Qes']);
    
    $sql = "SELECT * FROM user WHERE name ='".$id."' And Qes='".$Qes."'";
    $result = mysqli_query($conn,$sql);
    
   if($result->num_rows =="0"){
        echo json_encode(array('result' => 'No'));
    }else{
        $sql = "UPDATE user SET password='".$passwd."' WHERE name ='".$id."' And Qes='".$Qes."'";
        mysqli_query($conn,$sql);
        echo json_encode(array('result' => 'Success'));
    }
?>