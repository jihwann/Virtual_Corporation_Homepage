$(document).ready(function(){
    var local_h,result,name,comment_result;
    function nohidden(){
        local_h=location.href;
        result = local_h.indexOf("remove.php");
        if(result == -1){}else{$("#menu1_group").show();}
        $.ajax({
            url : '/homepage/process_id.php' ,
            dataType:'json',
            success:function(json){
                if(json.result=='comment'){
                    $("#btnr_revise").show();
                    $("#comment_form").show();
                    $(".board_list").show();
                }else if(json.result=='nologin_comment'){
                    $("#btnr_revise").hide();
                    $(".board_list").show();
                }else{
                    $("#btnr_revise").hide();
                }
            }
        });
    }
    function tag_add(comment_result,comment_id){
        var form= document.createElement('form');
        $(form).attr({
            action : "/homepage/process_comment_revise.php",
            method : "post"
        });
        var textarea = document.createElement('textarea');
        $(textarea).attr({
            name : "contents",
            id : "revise_"+comment_result,
            cols : "100",
            rows : "3",
            class : "comment_id"
        });
        var hidden = document.createElement('input');
        $(hidden).attr({
            type : "hidden",
            value : comment_result,
            name : "comment_id"
        });
        var submit = document.createElement("input");
        $(submit).attr({
            type : "submit",
            value : "수정",
            height : "100",
            id : "revise_comment_submit"
        });
        form.appendChild(textarea);
        form.appendChild(hidden);
        form.appendChild(submit);
        $(comment_id).html(form);
    }
//    if(name==-1){
//        $(".hidden").hide();
//    }else{
//        $(".board_post").hide();
//    }
    $("#list_menu_1").click(function(){
        $(".board_list").toggle();
    });
    $("#list_menu_2").click(function(){
        $("#menu2_group").toggle();
    });
    $("#public_board").click(function(){
        $("#menu3_group").hide();
        $("#menu1_group").toggle();
    });
    $("#admin_board").click(function(){
        $("#menu1_group").hide();
        $("#menu3_group").toggle();
    });
    $("#btnr_write").click(function(){
        location.replace("/homepage/write.php");   
    });
    $("#btnr_revise").click(function(){
        location.replace("/homepage/revise.php");   
    });
    $("#btnr_remove").click(function(){
        location.replace("/homepage/remove.php");   
    });
    $("#btnr_logout").click(function(){
        location.replace("/homepage/process_logout.php");   
    });
    $("#btn_login").click(function(){
        location.replace("/homepage/login.php");   
    });
    $("#hd_user").click(function(){
         $.ajax({
            url : '/homepage/process_logout.php' ,
            data :{result:"result"},
            type:'POST',
            dataType:'json',
            success:function(json){
                if(json.result=='success'){
                    location.replace('/index.php');
                }
            }
        });
    });
    $(".board").click(function(){
        var id =  $(this).attr('id');
        $.ajax({
            url : '/homepage/process_id.php' ,
            data:{id:id},
            dataType:'json',
            type:'GET',
            success:function(json){
                if(json.result=='success'){
                    location.replace("/index.php?id="+id);
                }else{
                    location.replace("/index.php");
                }
            }
        });
//        location.replace("/index.php?id="+id);   
    });
    $(".comment_read").hover(
        function(){
        comment_result = $(this).attr('id');
        var comment_id = "."+comment_result;
        $(comment_id).show();
    },function(){
        var comment_id = "."+comment_result;
        $(comment_id).hide();
    });
    $(".comment_revise").click(function(){
        var comment_id = "#comment_"+comment_result;
        var contents = $(comment_id).html();
        comment_id = "#"+comment_result;
//        $(comment_id).hide();
        tag_add(comment_result,comment_id);
        comment_id = '#revise_'+comment_result;
        $(comment_id).text(contents);
    });
    $(".comment_remove").click(function(){
        var data = {"comment_id":comment_result};
         $.post("/homepage/process_comment_remove.php",data,function(json){
             if(json.result=="False"){
                 alert("삭제하는데 실패하였습니다.");
             }else{
                 window.location.reload(true);
             }
         });
    });
    
    $("#uploadBtn").change(function(){
        var filename = $(this).val().split('/').pop().split('\\').pop();
        $(this).siblings("#fileName").val(filename);
    });
    
    $(".file_down").click(function(){
        var id = $(this).attr('id');
        window.open('/homepage/process_down.php?id='+id)
        
    });
    
    $(".hidden").hide();
    nohidden();
});