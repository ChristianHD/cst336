// Variables
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{ word: "snake", hint: "It's a reptile"},
             { word: "monkey", hint: "It's a mammal"},
             { word: "bettle", hint: "It's an insect"}];
             
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


// Listeners
window.onload = startGame();

$(".replayBtn").on("click", function(){
    location.reload();
});

$(".letter").click(function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".hintBtn").on("click", function(){
   showHint($(this)); 
});


// Functions
function startGame(){
    pickWord();
    initBoard();
    updateBoard();
    createLetters();

}

function pickWord(){
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function initBoard(){
    for(var letter in selectedWord){
        board.push("_");
    }
}

function showHint(){
    $("#hint").empty();
    $("#hint").append("<span class='hintText'>Hint: " + selectedHint + "</span>");
    remainingGuesses -= 1;
    updateMan();
}


function createLetters(){
    for(var letter of alphabet){
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
    }
}

function updateBoard(){
    $("#word").empty();
    
    for(var i=0; i < board.length; i++){
        $("#word").append(board[i] + " ");
    }    
    
}


function checkLetter(letter){
    var positions = new Array();
    
    for (var i = 0; i < selectedWord.length; i++){
        if(letter == selectedWord[i]){
            positions.push(i);
        }
    }
    
    if (positions.length > 0){
        updateWord(positions, letter)
        
        if(!board.includes('_')){
            endGame(true);
        }
    } else {
        remainingGuesses -= 1;
        updateMan();
    }
    
    if (remainingGuesses <=0){
        endGame(false);
    }
}

function updateWord(positions, letter){
    for (var pos of positions){
        board[pos] = letter;
    }
    updateBoard();
}

function updateMan(){
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win){
    $("#letters").hide();
    
    if (win){
        $('#won').show();
    } else {
        $('#lost').show();
    }
}

function disableButton(btn){
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger")
}

