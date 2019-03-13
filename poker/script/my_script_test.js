$(document).ready(function(){
    var cards_num = new Array(0,0,0,0,0,0,0);
    var used_cards = new Array();
    var cards1 = new Array();
    var cards2 = new Array();
    var card_check = new Array();
    var suit_value = new Array('','','','','',"Spades",'','');
    var money = new Array(300000,300000);
    var total_money = 0;
    var spend_money = 1000;
    var enemy_random = 0;
    var first = 0;
    var check_help = 0;
    var check_ok = 0;
    var game_set = 0;
    var game_check1 = [['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0]];
    var game_check2 = [['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0]];
    var suit_number = new Array(0,0,0,0,0,0,0,0);
    var enemy_result = '';
    var result_1 = 0;
    var game_count = 0;
    function card(name,suit,value){
    this.name = name;
    this.suit = suit;
    this.value = value;
    }
    
    function result(id,id2,id3){
        var straight_add = new Array();
        var straight_flush = new Array();
        var cards_suit = new Array();
        var string ='';
        var cnt = 0;
        var result = 0;
        var flush_check = 0;
        var royal_flush = 0;
        var count_1 = 0;
        var count_2 = 0;
        var count_3 = 0;
        var straight_help = 0;
        card_check.length =0;
        cards_num = new Array(0,0,0,0,0,0,0);
        suit_value = new Array('','','','','',"Spades",'','');
        suit_number = new Array(0,0,0,0,0,0,0,0);
        for(var i =0; i<id2.length; i++){
        compare_num2(0,id2[i],1);
        suit_number[0] = 0;
        }
        // one pare , two pare , flush STRART
        for(var i=0;i<id2.length-1;i++){
            count_3 = 0;
            var suit='';
            var flush = 0;
            for(var j=i;j<id2.length-1;j++){
                if(id2[i].value==id2[j+1].value){
                    compare_num2(1,id2[i],1);
                    compare_num2(1,id2[j+1],1);
                    suit_number[1]=0;
                    if(result<=1){
                        result = 1;} //one pare
                    
                    if(count_3==0){
                    card_check[card_check.length]=id2[i];
                    card_check[card_check.length]=id2[j+1];;
                    }else if(count_3>=1){
                    card_check[card_check.length]=id2[j+1];
                    }
                 if(card_check[cnt].value==id2[j+1].value){
                    if(count_3==0){
                        cnt += 2;}else{
                        cnt += 1;}
                 if(cnt>=3){
                    if(result<=2){result =2;}} //two pare
                    }
                    count_3 += 1;
                }
               
                if(id2[i].suit==id2[j+1].suit){
                    if(suit==id2[j+1].suit || suit==''){
                    suit = id2[i].suit;
                    flush += 1;
                    }
                    if(flush>=4){if(result<=5){
                        for(var k=0;k<id2.length;k++){
                            if(id2[k].suit==id2[i].suit){
                                compare_num2(4,id2[k],1);
                                suit_number[4]=0;
                            }
                        }
                        result = 5; flush_check=1;}}//flush
                }
            }
        }
        // one pare , two pare , flush END
        
        count_3 = 0;
        
        // three card , four card , fullhouse STRART
        if(card_check.length>=2){
        for(var i=0;i<card_check.length-2;i++){
            if(card_check[i].value==card_check[i+1].value && card_check[i].value==card_check[i+2].value){
                compare_num2(2,card_check[i],1);
                compare_num2(2,card_check[i+1],1);
                if(i+2<card_check.length){
                compare_num2(2,card_check[i+2],1);
                }
                if(result<=3){result = 3;}//three card
                    for(var j=0; j<id2.length;j++){
                        if(card_check[i].value==id2[j].value){
                                count_3 +=1;
                                if(result<=7&&count_3==4){
                                    compare_num2(5,card_check[i],0);
                                    result=7;} //four card
                        }
                    }count_3 = 0;
                if(cnt>=6){if(result<=6){result=6;}}//full house
            }
            }
        }
        // three card , four card , fullhouse END
        
        // straight , straight_flush STRART
        for(var j=0; j<id2.length;j++){
        for(var i=1; i<5;i++){
            straight_add[straight_add.length]= add_straight(id2[j].value,i,id2);
            straight_flush[straight_flush.length]=flush_straight(id2[j],i,id2);
            cards_suit[cards_suit.length]=id2[j].suit;
        }}
        
        for(var i=0; i<straight_add.length;i++){
            if(straight_add[i] != 0){
                count_1+=1;
             if(count_1==4 && result<=4){
                for(var k=0; k<id2.length;k++){
                    if(straight_add[i]==id2[k].value){
                        compare_num2(3,id2[k],1);
                        }
                    }
                suit_number[3]=0;
                compare_num(3,straight_add[i]);
                result=4;} //straight
            }
            if(straight_flush[i] != 0){
                count_2+=1;

            if(count_2 ==4 && result<=8){
                        var a = compare_num(6,straight_flush[i]);
                        if(a==1){
                        suit_check(6,cards_suit[i]);
                        suit_number[6]=0;}
                        result=8;} //straight flush
            }
            
            if((i+1)%4==0 && i != 0){
                count_1=0;
                count_2=0;
            }
        }
        // straight , straight_flush END
        cards_suit.length = 0;
        // royal straight flush STRART
        count_2=0;
        straight_flush.length = 0;
        for(var i=0; i<id2.length;i++){
            if(id2[i].value==10){
                for(var j=1; j<4; j++){
                    straight_flush[straight_flush.length]=flush_straight(id2[i],j,id2);
                    cards_suit[cards_suit.length]=id2[i].suit;
                    }
            }
        }
        for(var i=0;i<straight_flush.length;i++){
            if(straight_flush[i] != 0){
                count_2+=1;
            if(count_2==3){
                for(var j=0;j<id2.length;j++){
                if(id2[j].value==1){
                if(cards_suit[i]==id2[j].suit && result<=9){
                        suit_check(7,id2[j].suit);
                        result=9;}} // royal straight
                   }}
            }if((i+1)%3==0){count_2=0;}
        }
        // royal straight END
        switch(result){
            case 0:
                string=suit_value[0]+" "+cards_num[0]+" High Card";
                insert_check(id3,0,0,0);
                break;
            case 1:
                string=suit_value[1]+" "+cards_num[1]+" One Pare";
                insert_check(id3,1,1,1);
                break;
            case 2:
                string=suit_value[1]+" "+cards_num[1]+" Two Pare";
                insert_check(id3,2,1,1);
                break;
            case 3:
                string=suit_value[2]+" "+cards_num[2]+" Three Card";
                insert_check(id3,3,2,2);
                break;
            case 4:
                string=suit_value[3]+" "+cards_num[3]+" Straight";
                insert_check(id3,4,3,3);
                break;
            case 5:
                string=suit_value[4]+" "+cards_num[4]+" Flush";
                insert_check(id3,5,4,4);
                break;
            case 6:
                string=suit_value[2]+" "+cards_num[2]+" FullHouse";
                insert_check(id3,6,2,2);
                break;
            case 7:
                string=suit_value[5]+" "+cards_num[5]+" Four Card";
                insert_check(id3,7,5,5);
                break;
            case 8:
                string=suit_value[6]+" "+cards_num[6]+" Straight Flush";
                insert_check(id3,8,6,6);
                break;
            case 9:
                string=suit_value[7]+" Royal Straight Flush";
                insert_check(id3,9,7,14);
                break;
                     }
            if(id=="#result_1"){enemy_result=string;}else{
                $(id).html(string);}
    }
    
    function deal(){
        for(var i=0;i<2;i++){
            hit("#enemy_hand",cards1);
            hit("#my_hand",cards2);
        }
    }
    function end() {
        $("#hit").hide();
        $("#Restart").show();
        $(".back").remove();
        $("#enemy_in").show();
        $("#button").hide();
    }
       function hit(id,id2){
        var good_card = true;
           if(money[0]<=0||money[1]<=0){
             $("#Call").hide();
             $("#Half").hide();
             $("#Full").hide();
             $("#Check").show();
             game_set = 1;
            }
        abc:
        while(good_card){
            if(used_cards.length>=14){
                $("#result_1").html(enemy_result);
                if(result_1!=3){result_1 = ending_check();}
                if(result_1==0){
                    $("#result").html("You are Winner");
                    money[1]+=total_money;
                }
                else if(result_1==1){
                    $("#result").html("You are Loser");
                    money[0]+=total_money;
                }
                end();
                result_1=3;
                break abc;}
            var index = getRandom(52);
            for(var i=0;i<used_cards.length;i++){if(used_cards[i]==index){i = 99;}}
            if(i==100){continue abc;}
            var c = deck[index];
            used_cards[used_cards.length] = index;
            id2[id2.length]=c;
            var $d = $('<div>');
            $("<img>").appendTo($d).attr("src","images/cards/"+c.suit+"/"+c.name+".jpg").fadeOut("slow").fadeIn("slow");
            $d.appendTo($(id));
            good_card = false;
        }
    }
    function compare_num(index1,index2){
        if(cards_num[index1]<=index2){
            cards_num[index1]=index2;
            return 1;
        }
        return 0;
    }
       function compare_num2(index1,index2,index3){
        if(cards_num[index1]<=index2.value){
            cards_num[index1]=index2.value;
            if(index3==1){
            suit_check(index1,index2.suit);}
            else if(index3==2){
            suit_check(index1,indiex2);}
        }
    }
    function getRandom(num){
            var my_num = Math.floor(Math.random()*num);
            return my_num;
        }
    function enemyresult(index){
        if(used_cards.length<=14){
        for(var i=game_check2.length-1; i>=0; i--){
        if(game_check2[i][1] != 0){
            enemy_random = 30+i*5;
            enemyRandom(enemy_random);
            if(first==1 && check_help==0 && index != 0){$("#hit").trigger('click');}
            return 0;
        }
    }}
    }
    
    
    function enemyRandom(num){
        if((check_ok != 3 && first ==0)||(first==1)){
        var my_num = Math.floor(Math.random()*101-num)+num;
        if(check_help==1){
            if(my_num>35){
                alert("EnemyChoice isn`t Check");
                $('#Check').hide();
            }
        }
        if((my_num<=35 && check_ok==1)|| (my_num<=35 && first==1 && check_ok !=3 && check_ok!=4) ){
            $("#Check").show();
            alert("Enemy의 "+game_count+"번 째 드랍 카드의 선택 : Check");
            if(check_help==1){game_count+=1}
            check_help = 2;
            check_ok = 3;
        }else if(my_num<60){
            alert("Enemy의 "+game_count+"번 째 드랍 카드의 선택 : Call");
            f_spend_money("#enemymoney",0);
            if(check_help==1){check_ok = 3;}
        }else if(my_num<=70){
            alert("Enemy의 "+game_count+"번 째 드랍 카드의 선택 : Half");
            f_Half();
            f_spend_money("#enemymoney",0);
            if(check_help==1){check_ok = 3;}
        }else{
            alert("Enemy의 "+game_count+"번 째 드랍 카드의 선택 : Full");
            f_Full();
            f_spend_money("#enemymoney",0);
            if(check_help==1){check_ok = 3;}
        }}
    }
    function add_straight(index_1,index_2,index_3){
        for(var i=0;i<index_3.length;i++){
                if((index_1+index_2)==index_3[i].value){
                    return index_1+index_2;}
        }
        return 0;
    }
    
    function flush_straight(index_1,index_2,index_3){
        for(var i=0;i<index_3.length;i++){
                if((index_1.value+index_2)==index_3[i].value){
                    if(index_1.suit==index_3[i].suit){
                        return index_1.value+index_2;    
                    }
                    }
        } 
        return 0;
    }
    
   function suit_check(index_1,index_2){
        var suit_var = [["Clubs",1],["Hearts",2],["Diamonds",3],["Spades",4]];
        var number = 0;
        if(suit_number[index_1]==0){
        for(var j=0;j<4;j++){
                if(index_2==suit_var[j][0]){suit_number[index_1] = suit_var[j][1];}
        }}else{
        for(var j=0;j<4;j++){
                if(index_2==suit_var[j][0]){number = suit_var[j][1];}
        }
        }
        if(suit_number[index_1]<number){
            suit_value[index_1]=index_2;
            suit_number[index_1] = number;
            }else if(number == 0){
            suit_value[index_1]=index_2;
            }
    }
    function insert_check(id,index1,index2,index3){
        id[index1][0] = suit_value[index2];
        id[index1][1] = cards_num[index3];
    }
    function ending_check(){
        var myhand=0;
        var enemy=0;
        var suit_var = [["Clubs",1],["Hearts",2],["Diamonds",3],["Spades",4]];
        for(var i=game_check1.length-1; i>=0; i--){
            if(game_check1[i][1] != 0){myhand=1;}
            if(game_check2[i][1] != 0){enemy=1;}
            if(myhand == 1 || enemy == 1){
                if(game_check1[i][1]>game_check2[i][1]){return 0;} // I win;
                else if(game_check1[i][1]<game_check2[i][1]){return 1;} // enemy win;
                else{
                    for(var j=0; j<suit_var.length;j++){
                        if(game_check1[i][0]==suit_var[j][0]){myhand=suit_var[j][1];}
                        if(game_check2[i][0]==suit_var[j][0]){enemy=suit_var[j][1];}
                    }
                    if(myhand>enemy){return 0;} // I win
                    if(myhand<enemy){return 1;} // enemy win
                }
            }
        }
    }
    function enemy_card(){
        var $d = $('<div>');
            $("<img>").appendTo($d).attr({src: 'images/enemy.jpg',class: 'back'}).fadeOut("slow").fadeIn("slow");
            $d.appendTo($("#enemy_hand"));
    }
    function f_Half(){
        if(total_money<=1500){spend_money = 1500;}
        else{spend_money = parseInt(total_money/2);}
    }
    function f_Full(){
        if(total_money<=2000){spend_money = 2000;}
        else{spend_money = parseInt(total_money);}
    }
    
    function f_spend_money(selector,index){
        if(used_cards.length<=14){
        if(spend_money>money[index]){spend_money=money[index];}
        total_money+= spend_money;
        money[index] -= spend_money;
        if(first==1 && used_cards.length==14){
            if(check_ok==3){
                game_count -= 1;
                check_ok = 4;
                enemyresult(0);}
            used_cards.length=15; $("#hit").trigger('click');}
        if(money[0]<=0){
            money[0]=0;
            var string1 = "Enemy Have Money : $"+money[index];
            $(selector).html(string1);
            $("#total").html("Total Money : $"+total_money);
            return 0;
        }else if(money[1]<=0){
            money[1]=0;
            var string2 = "I Have Money : $"+money[index];
            $(selector).html(string2);
            $("#total").html("Total Money : $"+total_money);
            return 0;
        }
        if(index==0){
        var string1 = "Enemy Have Money : $"+money[index];
        $(selector).html(string1);
        }else{
        var string2 = "I Have Money : $"+money[index];
        $(selector).html(string2);}
        $("#total").html("Total Money : $"+total_money);
        }
    }
    function check_game(){
        if(first==0 && check_help==0){
            $("#hit").trigger("click");}
        if(first==0){$("#Check").show();}
        if(first==1 && check_ok!=3 && game_set!=1){$("#Check").hide();}
        check_help=0;
    }
    var deck = [
		new card('Ace', 'Hearts',1),
		new card('Two', 'Hearts',2),
		new card('Three', 'Hearts',3),
		new card('Four', 'Hearts',4),
		new card('Five', 'Hearts',5),
		new card('Six', 'Hearts',6),
		new card('Seven', 'Hearts',7),
		new card('Eight', 'Hearts',8),
		new card('Nine', 'Hearts',9),
		new card('Ten', 'Hearts',10),
		new card('Jack', 'Hearts',11),
		new card('Queen', 'Hearts',12),
		new card('King', 'Hearts',13),
		new card('Ace', 'Diamonds',1),
		new card('Two', 'Diamonds',2),
		new card('Three', 'Diamonds',3),
		new card('Four', 'Diamonds',4),
		new card('Five', 'Diamonds',5),
		new card('Six', 'Diamonds',6),
		new card('Seven', 'Diamonds',7),
		new card('Eight', 'Diamonds',8),
		new card('Nine', 'Diamonds',9),
		new card('Ten', 'Diamonds',10),
		new card('Jack', 'Diamonds',11),
		new card('Queen', 'Diamonds',12),
		new card('King', 'Diamonds',13),
		new card('Ace', 'Clubs',1),
		new card('Two', 'Clubs',2),
		new card('Three', 'Clubs',3),
		new card('Four', 'Clubs',4),
		new card('Five', 'Clubs',5),
		new card('Six', 'Clubs',6),
		new card('Seven', 'Clubs',7),
		new card('Eight', 'Clubs',8),
		new card('Nine', 'Clubs',9),
		new card('Ten', 'Clubs',10),
		new card('Jack', 'Clubs',11),
		new card('Queen', 'Clubs',12),
		new card('King', 'Clubs',13),
		new card('Ace', 'Spades',1),
		new card('Two', 'Spades',2),
		new card('Three', 'Spades',3),
		new card('Four', 'Spades',4),
		new card('Five', 'Spades',5),
		new card('Six', 'Spades',6),
		new card('Seven', 'Spades',7),
		new card('Eight', 'Spades',8),
		new card('Nine', 'Spades',9),
		new card('Ten', 'Spades',10),
		new card('Jack', 'Spades',11),
		new card('Queen', 'Spades',12),
		new card('King', 'Spades',13)
	];
    $("#deal").click(function(){
        deal();
        result("#result_1",cards1,game_check2);
        result("#result_2",cards2,game_check1);
        $("#enemymoney").html("Enemy Have Money : $"+money[0]);
        $("#mymoney").html("I Have Money : $"+money[1]);
        $("#deal").hide();
        $("#hit").show();
        $("#button").show();
        $("#enemy_in").hide();
        if(first==0){$("#hit").trigger('click');}
        if(first==1){
            $("#Check").hide();
            game_count+=1;
            enemyresult();
            if(check_help != 0){
                check_help = 4;
                $("#hit").trigger('click');}
                    }
    });
    $("#hit").click(function(){
        if(check_help!=4){check_ok = 0; check_help=0;}
        else{check_help=0;}
        enemy_card();
        hit("#enemy_in",cards1);
        hit("#my_hand",cards2);
        result("#result_1",cards1,game_check2);
        result("#result_2",cards2,game_check1);
    });
    $("#Restart").click(function(){
        $("#Call").show();
        $("#Half").show();
        $("#Full").show();
        if(first==1){$("#Check").show();}
        $("#enemymoney").html("Enemy Have Money : $"+money[0]);
        $("#mymoney").html("I Have Money : $"+money[1]);
        if(money[0]==0||money[1]==0){
            if(money[0]==0){
                $("#enemymoney").html("Enemy is Loser");
                $("#mymoney").html("I Am Winner");
            }else if(money[1]==0){
                $("#enemymoney").html("Enemy is Winner");
                $("#mymoney").html("I Am Loser");
            }
            money = new Array(300000,300000);
        }
        $(this).toggle();
        $("#my_hand").empty();
        $("#enemy_hand").empty();
        $("#deal").show();
        $("#result").html('Poker Game');
        $("#result_1").html(' ');
        $("#result_2").html('');
        $("#total").html('Total Money : $0');
        cards_num = new Array(0,0,0,0,0,0,0);
        used_cards.length=0;
        cards1.length=0;
        cards2.length=0;
        card_check.length=0;
        result_1 = 0;
        enemy_random = 0;
        game_count = 0;
        total_money = 0; 
        spend_money = 1000;
        game_set = 0;
        enemy_result ='';
        first = 1-first;
        suit_value=new Array('','','','','',"Spades",'','');
        suit_number = new Array(0,0,0,0,0,0,0,0);
        game_check1 = [['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0]];
        game_check2 = [['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0],['',0]];
        var $d = $('<div>').attr("id","enemy_in");
        $d.appendTo($("#enemy_hand"));
    });
    $("#Call").click(function(){
        game_count+=1;
        f_spend_money("#mymoney",1);
        if(check_ok==3 && first==1){
            game_count= game_count-1;
            enemyresult(0);
            game_count+=1;
            enemyresult();}
        else{
        enemyresult();
        
        if(check_help==2 && first==1){
            if(used_cards.length>=14){enemyresult(0);}
            check_help = 4;
            $("#hit").trigger('click');}
        }
        check_game();
    });
    $("#Half").click(function(){
        game_count+=1;
        f_Half();
        f_spend_money("#mymoney",1);
        if(check_ok==3 && first ==1){enemyresult(0);enemyresult();}
    else{
        enemyresult();
        if(check_help==2 && first==1){
            check_help = 4;
            $("#hit").trigger('click');}
        }
        check_game();
    });
    $("#Full").click(function(){
        game_count+=1;
        f_Full();
        f_spend_money("#mymoney",1);
        if(check_ok==3 && first ==1){
            game_count -= 1;
            enemyresult(0);
            game_count += 1;
            enemyresult();}
        else{
        enemyresult();
        if(check_help==2 && first==1){
            check_help = 4;
            $("#hit").trigger('click');}
        }
        check_game();
    });
    $("#Check").click(function(){
        if(game_set==1){$("#hit").trigger("click"); return 0;}
        game_count+=1;
        if(first==0 && used_cards.length<=4){$("#hit").trigger("click");}
        if(first==0){check_help = 1; check_ok=1;}
        if(first==1){check_help=2; $("#Check").hide();}
        else{enemyresult();}
        if(check_ok==3 && first==0){game_count -= 1;}
        if(check_help!=2){check_help = 0;}
        if(first ==1 && used_cards.length<14){enemyresult(0);}
        if(check_help==2){check_help = 0; $("#hit").trigger("click");}
        
        
    });
    $(".rule button").click(function(){
       $(".rule").hide();
       $(".container").show();
    });
});