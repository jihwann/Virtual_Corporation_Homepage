<?php
    session_start();
    require("../config/config.php");
    require("../lib/db.php");
    $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    $comment_id = mysqli_real_escape_string($conn,$_POST['comment_id']);
    if(in_array($comment_id,$_SESSION['comment'])==1){
        $query = "DELETE FROM comment WHERE comment_id='".$comment_id."'";
        $result = mysqli_query($conn,$query);
        if($result!=true){
            echo json_encode(array('result' => 'False'));
            exit;
        }else{
            echo json_encode(array('result' => 'Success'));
            exit;
        }
    }else{
        echo json_encode(array('result' => 'attack'));
    }
?>