<?php
    require("../config/config.php");
	require("../lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    $id = $_GET['id'];
    $sql = "SELECT * FROM fileinformation WHERE file_id=".$id."";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $c_name = "./uploads/".$row['change_name'];
    $o_name = $row['originall_name'];
    $fsize = filesize($c_name);
    
    header("Content-Type: image/jpg"); // 헤더 파일의 타입을 정한다.
    header("Cache-Control: no-cache, must-revalidate"); // 캐싱을 비활성화한다.
    header("Content-Disposition: attachment; filename=\"".$o_name."\";" ); // 다운로드 시 다운로드 상자가 무조건 나오게 해준다. filename 은 다운로드 할 파일 이름을 설정해준다.
    header("Content-Transfer-Encoding: binary"); // 파일 전송시 바이너리 방식으로 전송한다.
    header("Content-Length: ".$fsize);  //파일 크기를 지정해준다.
    ob_clean(); // 출력버퍼에 있는 모든 내용을 버린다. header 앞에는 출력 과관련된 내용이나 공백이 있으면 안되기 때문에 없애준다.
    readfile($c_name); // 해당파일 읽어와라
    

//      
//    header("Pragma: public"); // required 
//    header("Expires: 0"); 
//    header("Cache-Control: must-revalidate), post-check=0, pre-check=0"); 
//    header("Cache-Control: private",false); // required for certain browsers 
//    header("Content-Type: image/jpg"); 
//    header("Content-Disposition: attachment; filename=\"".$o_name."\";" ); 
//    header("Content-Transfer-Encoding: binary"); 
//    header("Content-Length: ".$fsize); 
//    ob_clean(); 
//    readfile($c_name);
?>