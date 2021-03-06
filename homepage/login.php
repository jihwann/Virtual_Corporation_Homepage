<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>로그인</title>
      <link href="/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
      body{
      padding:50px;
      }</style>
      <link rel="stylesheet" href="style.css">
      <script src="../scripts/jquery-3.2.1.min.js"></script>
  </head>
  <body>
  <div class="container">
   <header > <!-- 해당 페이지를 설명하는 대표어 라는 약속어 기능x --> 
    <?php
         require("header.php");
    ?>	
    <hr>
  </header>
    <article>
    <form action="/homepage/process_login.php" method="post" class="form_login"> <!-- 해당 form안에 input type submit 를 action
      장소를 이동하도록 약속 되어있다. -->
    <div class="form-group">
   	 <label for="form-name">아이디</label>
   	 <input type="text" class="form-control" name="name" id="form-name" placeholder="아이디를 입력하시오.">
   	</div>

    <div class="form-group">
   	 <label for="form-password">비밀번호(6자리)</label>
   	 <input type="password" class="form-control" name="password" id="form-password" placeholder="비밀번호를 입력하시오.">
   	</div>
   	<input type="submit" value="로그인"  class='btn btn-default' id="submit_login">
    <a href="/homepage/useradd.php" class='btn btn-info'>회원가입</a>
    <a href="/homepage/restore.php" class='btn btn-info'>비밀번호 복구</a>
    </form>
    </article>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
     <script src="/homepage/js/login.js"></script>
     <script src="/homepage/style.js"></script>
      </div>
    </body>
  </html>
