$(document).ready(function(){
    var local_h,result;
    
    $(".form_login").submit(function(){
       return false;
    }); 
    $("#submit_login").click(function(){
        var data = $(".form_login :input").serializeArray();
        $.post($(".form_login").attr("action"),data,function(json){
            if(json.id=="null"){
                alert("아이디와 비밀번호를 확인하세요.");
            }else{
                location.replace("/index.php");   
            }
        },"json");
    });
     $("#submit_add").click(function(){
        var data = $(".form_login :input").serializeArray();
        $.post($(".form_login").attr("action"),data,function(json){
            if(json.id=="Exist"){
                alert("이미 존재하는 아이디입니다.");
            }else{
                location.replace("/index.php");   
            }
        },"json");
    });
    
      $("#submit_restore").click(function(){
        var data = $(".form_login :input").serializeArray();
        $.post($(".form_login").attr("action"),data,function(json){
            if(json.result=="No"){
                alert("잘못된 아이디 또는 복구 값 입니다.");
            }else{
                alert("비밀번호가 변경되었습니다.")
                location.replace("/index.php");   
            }
        },"json");
    });
    
    $("#comment_submit").click(function(){
        var data = $(".comment_result").serializeArray();
        $.post($("#comment_form").attr("action"),data,function(json){
            if(json.result=="False"){
                alert("댓글을 등록하는데 실패하였습니다.")
            }else{
                window.location.reload(true);
            }
        },"json");
    });
    
    $("#submit_write").click(function(){
        var form = $('.form_login')[0];
         var formData = new FormData(form);
             $.ajax({
                url: '/homepage/process.php',
                processData: false,
                contentType: false,
                data: formData,
                dataType : 'json',
                type: 'POST',
                success: function(json){
                    if(json.result=='Success' || json.result=='nofile'){
                        alert("게시글 작성을 완료하였습니다.");
                        location.replace("/index.php");
                    }else if(json.result="False"){
                        alert("게시글은 작성했지만 파일을 업로드하는데는 실패하였습니다.");
                        location.replace("/index.php");
                    }
                    else{
                        alert("게시글 작성을 실패하였습니다.");    
                    }
                },error: function(json){
                    alert("게시글 작성을 실패하였습니다.");
                    location.replace("/index.php");
             }
            });
         });
    
        $("#submit_revise").click(function(){
            var form = $('.form_login')[0];
            var formData = new FormData(form);
            $.ajax({
                url : '/homepage/process_revise.php' ,
                processData: false,
                contentType : false,
                data : formData,
                dataType : 'json',
                type : 'POST',
                success: function(json){
                    if(json.result=="Success"){
                        alert("게시글을 수정하였습니다.");
                        location.replace("/index.php");
                    }else if(json.result=="ext"){
                        alert("파일의 확장자를 확인해주세요.");
                    }else{
                        alert("게시글을 수정하는데 실패하였습니다.");
                    }
                },error: function(json){
                        alert("게시글을 수정하는데 실패하였습니다.");
                }
                
            });
        });
    });
