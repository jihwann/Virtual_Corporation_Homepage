<?php
    session_start();
    require("../config/config.php");
	require("../lib/db.php");
    $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);

    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $author = $_SESSION['name'];
    $description = $_POST['description'];
    
    $nofile = 0;
    $file = 0 ;
    $uploads_dir='./uploads';
    $allow_ext = array('jpg','jpeg','png','gif');

    $error = $_FILES['myfile']['error'];
    $name = $_FILES['myfile']['name'];

    $ext = strtolower(array_pop(explode('.',$name)));
    $cname=date("YmdHis").".".$ext;
    
    if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
        case UPLOAD_ERR_NO_FILE:
            $nofile = 1;
            break;
		default:
			echo json_encode(array('result' => 'Error'));
            exit;
	}
    }
#    if(!in_array($ext,$allow_ext) && $nofile==0){
#        echo json_encode(array('result' => 'ext'));
#        exit;
 #   }
    
    $sql = "SELECT * FROM fileinformation WHERE id ='".$id."'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows==1 && $nofile==0){
            $row = mysqli_fetch_assoc($result);
            $change_name = $row['change_name'];
            $file = 1;
            unlink("./uploads/$change_name");
    }
    // 위에서 uploads 파일의 기존 사진 삭제
    
    if($file==1 && $nofile==0){
        $sql = "UPDATE fileinformation SET change_name='".$cname."', originall_name='".$name."' WHERE id='".$id."'";
        $result = mysqli_query($conn,$sql);
    }else if($file==0 && $nofile==0){
        $sql = "INSERT INTO fileinformation (id,change_name,originall_name) VALUES('".$id."','".$cname."','".$name."')";
        $result = mysqli_query($conn,$sql);
    }
    if($result!=TRUE && $nofile==0){
        echo json_encode(array('result'=>'Upload is False'));
        exit;
    }else{
        $sql = "UPDATE topic SET title='".$title."', description='".$description."', created=now() WHERE id ='".$id."'";
        $result = mysqli_query($conn,$sql);    
    }
    if($result==TRUE && $nofile==0){
        move_uploaded_file($_FILES['myfile']['tmp_name'], "$uploads_dir/$cname");
        echo json_encode(array('result'=>'Success'));
        exit;
    }else if($result!=TRUE && $nofile==0){
        echo json_encode(array('result'=>'revise is False'));
        exit;
    }else if($result==TRUE){
        echo json_encode(array('result'=>'Success'));
        exit;
    }else{
        echo json_encode(array('result'=>'revise is False'));
        exit;
    }
?>
