<?php
    session_start();
	require_once("./config/config.php");
	require_once("./lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
	$result=mysqli_query($conn,"SELECT * FROM topic");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>MinSeok</title>
	<link rel="stylesheet" type="text/css" href="/homepage/style.css">
	<!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container">
  <header id="header"> <!-- 해당 페이지를 설명하는 대표어 라는 약속어 기능x --> 
    <?php
         require("./homepage/header.php");
    ?>	
  </header>
  <hr>
	<div class="row">
  <nav class="col-md-3">  <!-- col-md는 12칸중 칸을 나눈것  -->
  <?php
         require("./homepage/nav.php");
     ?>	
  </nav>
	<div class="col-md-9">
     <article id="sentense">
	 <?php
         require("./homepage/article_read.php");
         require("./homepage/article.php");
    ?>	
	 </article>
	 <hr>
	 <div id="control">
        <?php
         require("./homepage/button.php");
        ?>	
	 </div>
	</div>

 </div>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    <script src="/homepage/style.js"></script>
    <script src="/homepage/js/login.js"></script>
    <script src="/scripts/jquery-3.2.1.min.js"></script>
</div>
</body>
</html>

