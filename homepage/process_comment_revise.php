<?php
    session_start();
    require("../config/config.php");
    require("../lib/db.php");
    $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    $contents = mysqli_real_escape_string($conn,$_POST['contents']);
    $comment_id = mysqli_real_escape_string($conn,$_POST['comment_id']);
    $query = "UPDATE comment SET contents ='".$contents."',created=now() WHERE comment_id='".$comment_id."'"."AND name='".$_SESSION['name']."'";
    mysqli_query($conn,$query);
    header('Location:/index.php');
?>
