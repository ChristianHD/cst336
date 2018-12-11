$(document).ready(function(){
    
    $("#logoutBtn").click( function() {
        window.location.href="logout.php";
        }
    );
    
    var score = 0;
    $("form").submit(function(event) {
        
        event.preventDefault();
        
        //Get answers
        var answer1 = $("input[name='question1']").val().trim();
        var answer2 = $("input[name='question2']:checked").val();
        
        console.log(answer1);
        console.log(answer2);
        
        //Checks if answers are correct
        // Question 1

        // Question 2


        //Displays quiz score


        //Submits and stores score, retrieves average score
        $.ajax({
            type : "",
            url  : "",            
            dataType : "",
            data : {"" : },            
            success : function(data){
                console.log(data);
                
            },
            complete: function(data,status) { //optional, used for debugging purposes
               // alert(status);
            }

        });//AJAX
        
    }); //formSubmit
    
    //Styles a question as answered correctly
    function correctAnswer(questionFeedback){
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
        score++;
    }

    //Styles a question as answered incorrectly
    function incorrectAnswer(questionFeedback){
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
    }
    
}); //documentReady       