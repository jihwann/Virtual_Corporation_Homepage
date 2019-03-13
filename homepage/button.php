<?php
if(!isset($_SESSION['name'])){ ?>
<div id="btn_login" class='btn btn-info btn-sm btn_cursor'>로그인</div>
<?php
}else{
?>
<div class="btn-group btn_cursor" role="group" aria-label="button_1">
<div id="btnr_write" class='btn btn-primary btn-sm'>쓰기</div>
<div id="btnr_revise" class='btn btn-success btn-sm'>수정</div>
<div id="btnr_remove" class='btn btn-danger btn-sm'>삭제</div>
<div id="btnr_logout" class='btn btn-info btn-sm'>로그아웃</div>
</div>
<?php
    }?>