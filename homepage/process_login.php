<?php
if($_POST){
    require("../config/config.php");
	require("../lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    
    $name = mysqli_real_escape_string($conn,$_POST['name']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "SELECT * FROM user WHERE  name='".$name."' AND password ='".$password."'"; 
    $result=mysqli_query($conn,$sql);
    
    if($result->num_rows=="0"){
        echo json_encode(array('id' => 'null'));
        exit;
    }else{
        session_start();
        $_SESSION['name'] = $name;
        echo json_encode(array('id' => $name));
        exit;
		}
}                                
?>
