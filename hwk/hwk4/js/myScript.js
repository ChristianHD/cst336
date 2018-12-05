
$(".submitBtn").on("click", function(){
    displayRecommendation();
});

function displayRecommendation(){
    if(!empty($_GET['firstname'])){
        document.getElementById("firstTimeBuyer").innerHTML =
        "Hi" + $_GET['firstname'] + "here is our advise:"'    
    }
    

}