<?php
	require("../config/config.php");
	require("../lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
	$result=mysqli_query($conn,"SELECT * FROM topic");
    session_start();
    unset($_SESSION['board']);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>minseok</title>
	<link rel="stylesheet" type="text/css" href="/homepage/style.css">
	<!-- Bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 
</head>
<body>
	<div class="container">
  <header id="header"> <!-- 해당 페이지를 설명하는 대표어 라는 약속어 기능x --> 
    <?php
         require("header.php");
    ?>	
  </header>
  <hr>
	<div class="row">
  <nav class="col-md-3">  <!-- col-md는 12칸중 칸을 나눈것  -->
    <?php
        include("nav.php");
    ?>
  </nav>
    <div class="col-md-9">
	    <form action="process.php" method="post" class="form_login">
        <div class="form-group">
        <label for="form-title">제목</label>
        <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 입력하시오.">
    </div>
	<div class="form-group">
	    <label for="form-author">작성자</label>
	    <input type="text" class="form-control" name="author" id="form-author" value="<?php echo $_SESSION['name'];?>" readonly="readonly">
    </div>
    <div class="form-group">
	    <label for="form-description">본문</label>
	    <textarea class="form-control" rows="10" name="description" id="form-description" placeholder="내용을 입력하시오."></textarea>
    </div>
    <div class="form-group" id="form-file">
        <input type="text" id="fileName" readonly="readonly">
        <label for="uploadBtn" id="fileBtn">파일 선택</label>
        <input type="file" name='myfile' id="uploadBtn" class="hidden">
    </div>
    
 		<input type="submit" name="name" value="저장" class='btn btn btn-dark' id="submit_write">
 	</form>
	 <article id="sentense">
	 <?php
         include("article.php");
     ?>	
	 </article>
	  <hr>
	 <div id="control">
        <?php
         require("button.php");
        ?>	
	 </div>
	</div>

 </div>
</div>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    <script src="/homepage/style.js"></script>
    <script src="/homepage/js/login.js"></script>
</body>
</html>
