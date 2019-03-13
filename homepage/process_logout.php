<?php
    if($_POST){
        session_start();
        unset($_SESSION['board']);
        echo json_encode(array('result'=>'success'));
        exit;
    }else{
        session_start();
        session_destroy();
        header('Location:/index.php');
    }
?>
