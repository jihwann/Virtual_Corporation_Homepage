<!DOCTYPE html>
<html>
<head>
    <script src="../scripts/jquery-3.2.1.min.js"></script>
    <script src="script/my_script_test.js"></script>
    <meta charset="utf-8">
    <link href="styles/my_style.css" rel="stylesheet">
    <title>Poker game</title>
    <style>
    header{
            cursor:pointer;
        }
    </style>
</head>
<body>  
   <header> <!-- 해당 페이지를 설명하는 대표어 라는 약속어 기능x --> 
    <?php
         require("../homepage/header.php");
    ?>	
  </header><hr>
    <div class="rule">
    <p>포커게임 규칙입니다.</p>
    <p>플레이어는 총 7장의 카드를 볼 수 있습니다.</p>
    <p>족보로는 하이카드, 원페어, 투페어, 쓰리카드, 스트레이트, 플러쉬, 풀하우스, 포카드, 스트레이트 플러쉬, 로얄 스트레이트 플러쉬가 있습니다.</p>
    <p>족보가 같을 때는 먼저 숫자를 비교하고 그 다음에 모양을 비교합니다.</p>
    <p>기본 소지 금액은 30만 달러이고 처음 콜 달러는 천달러입니다.</p>
    <p>배팅 방식으로는 Call: 상대방이 낸 금액만큼, Half: 쌓여있는 금액의 1.5배, Full: 쌓여있는 금액의 2배 Check: 추가 배팅없이 다음 카드 확인(두명 모두 Check 일시에만 적용)입니다.</p>
    <p>소지하신 돈이 0원이 된다면 진행중인 게임까지는 추가배팅없이 카드 확인 후 0원의 플레이어가 있다면 해당 게임의 승자가 결정됩니다.</p>
    <p>선공은 플레이어며 그 후 번갈아가면서 게임을 합니다.</p>
    <p>이전 페이지로 돌아가시려면 상단 왼쪽의 로고를 클릭해주세요.</p>
    <p>이해하셨다면 Game Start를 눌러주세요.</p>
    <button>Game Start</button>
    <hr>
    </div>
   <div class="container">
    <h1 id="result">Poker Game</h1>
    <h3 id="result_1"></h3>
    <div id="enemy_hand">    
    <div id="enemy_in"></div>
    </div>
    <h3 class="money" id="enemymoney">Enemy Have Money : $300000</h3>
    <div id="controls">
    <h1 id="total">Total Money : $0</h1>
    <div id="deal">
        <img src="images/deck_small.jpg" alt="dealer">
    </div>
    <div id="Restart">
        <img src="images/stick_small.jpg" alt="restartGame">
    </div>
    <div id="hit">
        <img src="images/hit_small.jpg" alt="hit!">
    </div>
    </div>
    <h3 id="result_2"></h3>
    <div id="my_hand">
    </div>
    <h3 class="money" id="mymoney">I Have Money : $300000</h3>
    <div id="button">
    <button id="Call" class="operationMoney">Call</button>
    <button id="Half" class="operationMoney">Half</button>
    <button id="Full" class="operationMoney">Full</button>
    <button id="Check" class="operationMoney">Check</button>
    </div>
    </div>
      <script>
    $("#hd_user").click(function(){
        location.replace("/index.php");
    });
    </script>
</body>
</html>