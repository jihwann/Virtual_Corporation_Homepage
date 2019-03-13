<?php
    if($_GET['id']){
        session_start();
        $_SESSION['board_group']=$_GET['id'];
        echo json_encode(array('result'=>'success'));
    }
?>