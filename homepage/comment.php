<?php
if(isset($_SESSION['name'])&&isset($_GET['id'])){
?>
<form action="/homepage/process_comment.php" id="comment_form" class="hidden form_login" method="post">
    <hr>
    <textarea name="comment" cols="100" rows="3" class="comment_result comment_id"></textarea>
    <input type="submit" value="저장" height="100" id="comment_submit" class="comment_result">
    <input type="hidden" value="" id="comment_board_id" class="comment_result" name ="comment_board_id">
</form>
<?php }?>
<div id="comment_name" class="hidden">
    <?php 
    if(isset($_GET['id'])){
    $id = $_SESSION['board'];
    $sql = "SELECT name,contents,created,comment_id FROM comment WHERE id='".$id."'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows!=0){
        echo "<script> document.getElementById('comment_name').className='on';</script>";
        while($row = mysqli_fetch_assoc($result)){
        $name = mysqli_real_escape_string($conn,$row['name']);
        $contents = mysqli_real_escape_string($conn,$row['contents']);
        $created = mysqli_real_escape_string($conn,$row['created']);
        $comment_id = mysqli_real_escape_string($conn,$row['comment_id']);
        $contents = str_replace("\\r\\n","<br>",$contents);
        echo "<div class='comment_read' id='".$comment_id."'><p><strong>".$name."</strong> ".$created."</p>";
        if(isset($_SESSION['name']) && ($name==$_SESSION['name'] || "root"==$_SESSION['name'])){
        echo "<button class='hidden comment_remove ".$comment_id."'>삭제</button><button class='hidden comment_revise ".$comment_id."'>수정</button><div id='comment_".$comment_id."'>";
        echo strip_tags($contents,'<h1><h2><h3><h4><h5><br>');
        echo "</div></div>";
        }else{
        echo "<div id='comment_".$comment_id."'>";
        echo strip_tags($contents,'<h1><h2><h3><h4><h5><br>');
        echo "</div></div>";
        }
    }
    }
    }
    ?> 
    
</div>
