<?php
    session_start();
    if($_GET){
    require("../config/config.php");
    require("../lib/db.php");
    $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author=user.id WHERE topic.id='".$id."'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows!=0){
        $_SESSION['board'] = $id;
        echo json_encode(array('result' => 'success'));
        exit;
    }else{
        echo json_encode(array('result' => 'false'));
        exit;
    }
    }

    if(isset($_SESSION['name'])&&isset($_SESSION['board'])){
        echo json_encode(array('result' => 'comment'));
        exit;
    }else if(isset($_SESSION['board'])){
        echo json_encode(array('result' => 'nologin_comment'));
        exit;
    }else{
        echo json_encode(array('result' => 'nocomment'));
        exit;
    }
?>