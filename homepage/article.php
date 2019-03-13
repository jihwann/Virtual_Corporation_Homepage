     <ol class="list-group hidden board_css" id="menu3_group">
	        <h3>공지사항 목록</h3>
	        <hr>
			<?php
            $result=mysqli_query($conn,"SELECT * FROM topic WHERE author = 15");
			while($row = mysqli_fetch_assoc($result)){
            echo "<li class='list-group-item board board_click' id=".$row['id'].">".htmlspecialchars($row['title'])."</li>\n";
			}
			?>
     </ol>
     <ol class="list-group hidden board_css" id="menu1_group">
	        <h3>자유 게시글 목록</h3>
	        <hr>
			<?php
            $result=mysqli_query($conn,"SELECT * FROM topic WHERE author not in(15)");
			while($row = mysqli_fetch_assoc($result)){
            echo "<li class='list-group-item board board_click' id=".$row['id'].">".htmlspecialchars($row['title'])."</li>\n";
			}
			?>
     </ol>
    
    	