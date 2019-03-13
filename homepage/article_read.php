<?php
			if(isset($_GET['id'])){
            $id =$_GET['id'];
			$sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author=user.id WHERE topic.id=".$id."";
			$result=mysqli_query($conn,$sql);
            if($result->num_rows!=0){
			$row=mysqli_fetch_assoc($result);
			echo '<h1>'.htmlspecialchars($row['title']).'</h1><br><br>';
			echo '<h4><p>'.'저자:'.htmlspecialchars($row['name']).'</p></h4><br>';
            $description = str_replace("\n","<br>",$row['description']);
			echo $description;
            $sql = "SELECT * FROM fileinformation WHERE id='".$id."'";
            $result = mysqli_query($conn,$sql);
            if($result->num_rows==1){
            $row = mysqli_fetch_assoc($result);
            $c_name = "/homepage/uploads/".$row['change_name'];
            $o_name = $row['originall_name'];
            $file_id = $row['file_id'];
            $allow_ext = array('jpg','jpeg','png','gif');
            $ext = strtolower(array_pop(explode('.',$o_name)));
            if(in_array($ext,$allow_ext)){
            ?>
            <br>
            <br>
            <img src="<?php echo $c_name ?>" id="file_img">
            <?php
            }        
            ?>
            <br>
            <br>
            <li id="<?php echo $file_id ?>" class="file_down"><strong><?php echo $o_name?></strong></li>
            <?php
            }
		}
    }
	 ?>
    <?php
        require("comment.php");
    ?>