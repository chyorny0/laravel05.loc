<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>21</title>
</head>
<body style="display: flex">
<div><img src="https://st2.depositphotos.com/1571134/9488/i/450/depositphotos_94889534-stock-photo-blue-deck-of-playing-cards.jpg" alt="card_deck"></div>
<div style="display: flex; justify-content: space-around; width: 500px;height: 50px">
    <button id="more">More</button>
    <button id="restart">restart</button>
</div>
<div id="divMore">
    <img id="cardImg" src="" alt="">
    <h1 id="score">0</h1>
</div>


{{--    <img src="{{ \App\Http\Controllers\DeckOfCardsController::getCard($id,1)["images"]["png"] }}" alt="some_card">--}}
<script>
    const moreBtn = document.getElementById("more")
    const restartBtn = document.getElementById("restart")
    const divMore = document.getElementById("divMore")
    const cardImg = document.getElementById("cardImg")
    const scoreP = document.getElementById("score")
    let score = 0;
    let cards = {
        "0" : 10,
        "J" : 2,
        "Q" : 3,
        "K" : 4,
        "A" : 11
    }
    moreBtn.addEventListener("click", ()=>{
        axios.get("/21/getCard/" + "{{ $id }}" + "/1").then(res=> {
            console.log(res.data.code)
            cardImg.setAttribute("src",res.data["images"]["png"]);
            let cardName = (res.data.code).split("")[0];
            if(cards.hasOwnProperty(cardName)){
                score += cards[cardName];
            } else {
                score += +cardName;
            }
            if((score) > 21){
                scoreP.innerText = "Перебор";
            } else if((score) === 21) {
                scoreP.innerText = score + "      WIN";
            } else {
                scoreP.innerText = score;
            }
        });

    })
    restartBtn.addEventListener("click", ()=>{
        score = 0;
        scoreP.innerText = score;
        cardImg.setAttribute("src","");
    })
</script>
</body>
</html>
