<?php
    session_start();
	require("../config/config.php");
	require("../lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $author = $_SESSION['name'];
    $sql="SELECT id FROM user WHERE name='".$author."'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows==1){
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
        }
    if($user_id=='15'){
        $sql="SELECT id FROM topic WHERE title='".$title."'";
        $result = mysqli_query($conn, $sql);
         if($result->num_rows!=0){
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            if($result->num_rows>1){
                $overlap=$result->num_rows;
            }
        }
    }else{
        $sql="SELECT id FROM topic WHERE author ='".$user_id."' AND title='".$title."'";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows!=0){
            if($result->num_rows>1){
                echo 1;
                $overlap=$result->num_rows;
            }
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
        }else{
            header('Location:/index.php');
        }
    }
    echo $overlap;
    $sql ="DELETE FROM topic where id='".$id."'";
    $result1=mysqli_query($conn,$sql);
    if($overlap > 1){
    for($i=1;$i<$overlap;$i++){
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    echo 1;
    $sql ="DELETE FROM topic where id='".$id."'";
    $result1=mysqli_query($conn,$sql);
    }
    }
    

    $sql ="DELETE FROM comment where id='".$id."'";
    $result=mysqli_query($conn,$sql);

    $sql ="SELECT * FROM fileinformation where id='".$id."'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows==1){
        $row = mysqli_fetch_assoc($result);
        unlink("./uploads/".$row['change_name']);
    }
    $sql ="DELETE FROM fileinformation where id='".$id."'";
    $result=mysqli_query($conn,$sql);
    header('Location:/index.php');
 ?>
