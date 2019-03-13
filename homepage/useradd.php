<!DOCTYPE html>
<html>
<head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   <style>
      body{
      padding:50px;
      }</style>
    <title>회원가입</title>
  </head>
<body>
<header > <!-- 해당 페이지를 설명하는 대표어 라는 약속어 기능x --> 
    <?php
         require("header.php");
    ?>	
    <hr>
  </header>
<article>
<form action="process_useradd.php" method="post" class="form_login">
<div class="form-group">
   	 <p class="font-weight-bold">아이디</p>
   	 <input type="text" class="form-control" name="name" id="form-name" placeholder="만드실 아이디를 입력하시오.">
   	</div>
<div class="form-group">
   	  <p class="font-weight-bold">비밀번호</p>
   	 <input type="password" class="form-control" name="password" id="form-password" placeholder="사용하실 비밀번호를 입력하시오.">
   	</div>
<div class="form-group">
   	  <p class="font-weight-bold">패스워드 복구에 사용하실 값</p>
   	 <input type="text" class="form-control" name="Qes" id="form-Qes" placeholder="복구에 사용하실 값을 입력하시오.">
   	</div>
<input type="submit" value="가입" class="btn btn-info" id="submit_add">
</form>
</article>
 <!-- jQuery (necessary for Bootstrap's Javacript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    <script src="/homepage/style.js"></script>
 <script src="/homepage/js/login.js"></script>
  </body>
</html>
