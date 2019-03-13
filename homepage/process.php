<?php
    session_start();
	require("../config/config.php");
	require("../lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    $author = $_SESSION['name'];
    $sql="SELECT * FROM user WHERE name ='".$author."'";
    $title = mysqli_real_escape_string($conn,$_POST['title']);  
    $des = $_POST['description'];
    $result = mysqli_query($conn, $sql);
    if($result->num_rows==1){
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
    }else{
        echo json_encode(array('result' => 'Error'));
        header("Location:/index.php");
        exit;
    }
    $sql = "SELECT now()";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $time = $row['now()'];

    $sql ="INSERT INTO topic (title,description,author,created)
    VALUES('".$title."','".$des."','".$user_id."','".$time."')";
    $result=mysqli_query($conn,$sql);

    $sql ="SELECT id FROM topic WHERE title ='".$title."' and created='".$time."'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows==1){
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
    }
    $uploads_dir='./uploads';

    $error = $_FILES['myfile']['error'];
    $name = $_FILES['myfile']['name'];

    $ext = strtolower(array_pop(explode('.',$name)));
    $cname=date("YmdHis").".".$ext;
   
    if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_NO_FILE:
            echo json_encode(array('result' => 'nofile'));
            exit;
		default:
			echo json_encode(array('result' => 'Error'));
            exit;
	}
    }
    
    $sql = "INSERT INTO fileinformation (id,change_name,originall_name) VALUES('".$id."','".$cname."','".$name."')";
    $result = mysqli_query($conn,$sql);
    if($result==TRUE){
        move_uploaded_file($_FILES['myfile']['tmp_name'], "$uploads_dir/$cname");
        echo json_encode(array('result'=>'Success'));
        exit;
    }else{
        echo json_encode(array('result'=>'False'));
        exit;
    }
 ?>