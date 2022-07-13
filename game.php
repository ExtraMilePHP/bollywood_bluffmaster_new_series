<?php
ob_start();
session_start();
error_reporting(0);
include_once 'dao/config.php';
include_once '../check-rating.php';
$isRated=check_rating();
$userId=$_SESSION['userId'];
$organizationId=$_SESSION['organizationId'];
$sessionId=$_SESSION['sessionId'];
$email=$_SESSION["email"];
if(empty($_SESSION["userId"])){
  header("Location:index.php");
}
if($_SESSION['firstName']=="demo"){
  $demoprint="var isdemo=true;";
}else{
  $demoprint="var isdemo=false;";
}



$query_checks="select * from stat where userid='$userId' and organizationId='$organizationId' and sessionId='$sessionId'";
$query_checks=mysqli_query($con,$query_checks);
$query_checks=mysqli_num_rows($query_checks);
$currentpos=0;
if($query_checks==0){
  if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
   $timestamp = date('Y-m-d H:i:s');
   $insert_pos="INSERT INTO `stat`(`userid`, `organizationId`, `sessionId`,`email`,`points`, `pos`, `time`, `timestamp`) VALUES ('$userId','$organizationId','$sessionId','$email','0','0','00:00:00','$timestamp')";
   mysqli_query($con,$insert_pos);
}else{
    $getpos="select * from stat where userid='$userId' and organizationId='$organizationId' and sessionId='$sessionId'";
    $getpos=mysqli_query($con,$getpos);
    $getpos=mysqli_fetch_object($getpos);
    $currentpos=$getpos->pos;
  }

 
if($currentpos==0){
    $questions=array("a/1.png","a/2.png","a/3.png","a/4.png","a/5.png","a/6.png","a/7.png","a/8.png");
    $option1=array("Chand Chhupa Badal Mein","Main Ladki tu Ladka","Disco Deewane","Sunn Raha hai na Tu Ro Raha hu Main","Rang Barse","Baby Doll Mein Sone Di","Naina da kya kasoor","Dil Diya hai Jaan bhi Denge");
    $option2=array("Chand Jane Kahan kho Gaya","Woh Ladki hai Kahan","1234 Get on the Dance Floor","Sun Zara","Apne rang mein rang de Mujhko","Yahan ke hum Sikander","Blue Eyes Hypnotize teri Kardi hai","Dil Diyan Lagiyan");
    $option3=array("Ye Chand sa Roshan Chehra","Ek Ladki ko Dekha Toh","Aaja piya aaye Bahaar","Rona Chahe Rona Paaye","Main Rang Shabaton Ka","Dil ye ziddi hai","Ye kali kali Aankehin","Dil Diyan Gallan");
    $answers=array("Chand Chhupa Badal Mein","Ek Ladki ko Dekha Toh","1234 Get on the Dance Floor","Sunn Raha hai na Tu Ro Raha hu Main","Main Rang Shabaton Ka","Baby Doll Mein Sone Di","Blue Eyes Hypnotize teri Kardi hai","Dil Diyan Gallan");
    $subject="Guess the songs from the emojis";
	$title_img="title1.png";


}
if($currentpos==1){
    $questions=array("Line","Dot","New","Meditation","Necklace","Brotherly love","Without sin","Eye liner","Deepak ki low");
    $answers=array("Rekha","Bindu","Nutan","Sadhana","Mala Sinha","Rakhi","Asin","Kajol","Deepika Paadukone");
    $subject="Name the Bollywood Actor / Actress from the Word";
$title_img="title2.png";

}
if($currentpos==2){
    $questions=array("Upbringing","Man","Drunkard","Say that there is love","Enemy","Bargainer","Kidnap","Noise","Injured");
    $answers=array("Parvarish","Adami","Sharabi","Kaho Na Pyaar Hai","Dushman","Saudagar","Apaharan","Shor","Ghayal");
    $subject="Guess the Movie Names from Literal Translations";
$title_img="title3.png";

}

if($currentpos==3){
    $questions=array("b/1.png",
    "b/2.png",
    "b/3.png",
    "b/4.png");
    $answers=array("Kabir Khan","Shantipriya","Amar","Babu Rao");
    $subject="Guess the Iconic Character from the Dialogues";
$title_img="title4.png";

}
if($currentpos==4){
    $questions=array("c/1.jpg",
    "c/2.jpg",
    "c/3.jpg",
    "c/4.jpg",
"c/5.jpg");
	$title=array("Mannat","Jalsa","Galaxy","Freeda Apartment","Krishna Raj Bungalow");
    $answers=array("Shah Rukh Khan","Amitabh Bachhan","Salman Khan","Amir Khan","Ranbir Kapoor");
    $subject="Name Celebrities from the Houses";
$title_img="title5.png";

}
if($currentpos==5){
    $questions=array("d/1.gif",
    "d/2.gif",
    "d/3.gif",
    "d/4.gif",
"d/5.gif");
    $answers=array("Lagaan","Sarfarosh","Rang de basanti","Border","Kabhi khushi kabhie gham");
    $subject="Guess the Movie Names from GIFs";
$title_img="title6.png";

}

if($currentpos==6){
    $_SESSION['uniqueMsg']="You have already played this game.";
    header("Location:../thankyou.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bollywood Bluffmaster New Series</title> 
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="css/style-one.css" type="text/css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
.title-text {
    font-size: 25px;
    text-align: center;
    margin: 20px 0px 0px;
}
.title-text2 {
    font-size: 25px;
    text-align: center;
    margin: 20px 0px 0px;
}

.radio-inline{
    font-size:16px;
}

</style>

          
    </head>
    <body>
<?php include("../actions-default.php");  back("index.php?save");?>
<div class="container-fluid">
    <div class="row">
        <div class="page-title" style="display:none;"><?php echo $subject;?></div>
       <div class="col-md-6 col-md-offset-3">
<img src="images/pages/<?php echo $title_img;?>" style="width:100%;"/>
</div>
        <div class="col-md-6 col-md-offset-3 control-one">
                 <?php 
                      for($i=0; $i<sizeOf($questions); $i++){
                         // echo '<li><div class="list-number">'.($i+1).'</div>'.$questions[$i].' <input type="text" class="get-answer unscramble-input" pos="'.$i.'"/></li>';
                          echo '<div class="col-md-6 text-center control-two">
                          <img src="images/pages/'.$questions[$i].'" class="user-image"/>
			                <h2 class="title-text">'.$questions[$i].'</h2>
			                <h2 class="title-text2">'.$title[$i].'</h2>
                            <div class="col-md-12 radio-container" style="margin-top:10px;margin-bottom:10px;text-align: left;">
                             <label class="radio-inline">
                                <input type="radio" name="q-answer'.$i.'" class="q-answer" pos="'.$i.'" value="'.$option1[$i].'">'.$option1[$i].'
                                </label><br>
                                <label class="radio-inline">
                                <input type="radio" name="q-answer'.$i.'" class="q-answer" pos="'.$i.'" value="'.$option2[$i].'">'.$option2[$i].'
                                </label><br>
                                <label class="radio-inline">
                                <input type="radio" name="q-answer'.$i.'" class="q-answer" pos="'.$i.'" value="'.$option3[$i].'">'.$option3[$i].'
                                </label><br>
                           </div>
                          <input type="text" class="get-answer unscramble-input" pos="'.$i.'"/>
                          </div>';
                      }
                      ?>
         
            
        </div>
        <div class="col-md-12 text-center">
                      <input type="submit" value="Submit" name="submit" class="button-submit button-submit2" style="margin-bottom:10px;"> 
 <input type="submit" value="Skip" name="submit" class="button-skip button-submit " style="margin-bottom:10px;"> 


                      </div>
    </div>
</div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>

            
var currentData=<?php echo $currentpos;?>;


<?php echo $demoprint;?>
$(".get-answer").val("");
$(".title-text2").hide();
if(currentData==0){
 	$(".user-image").css("height","75px");
 	$(".unscramble-input").css("width","99%");
	$(".title-text").hide();
	$(".get-answer").hide();
}

if(currentData==1){
                $(".radio-container").hide();
                $(".user-image").hide();
                $(".title-text").show();
                $(".control-one").removeClass("col-md-6");
                $(".control-one").removeClass("col-md-offset-3");
                $(".control-one").addClass("col-md-8");
                $(".control-one").addClass("col-md-offset-2");
                $(".control-two").removeClass("col-md-6");
                $(".control-two").addClass("col-md-4");
}
if(currentData==2){
                $(".radio-container").hide();
   		        $(".user-image").hide();
		        $(".title-text").show();
                $(".control-one").removeClass("col-md-6");
                $(".control-one").removeClass("col-md-offset-3");
                $(".control-one").addClass("col-md-8");
                $(".control-one").addClass("col-md-offset-2");
                $(".control-two").removeClass("col-md-6");
                $(".control-two").addClass("col-md-4");
}

if(currentData==3){
                $(".radio-container").hide();
                $(".user-image").show();
                $(".title-text").hide();
}
if(currentData==4){
                $(".radio-container").hide();
                $(".title-text").hide();
                $(".title-text2").show();
                $(".title-text2").css("margin-top","10px");
                $(".user-image").css("margin-top","20px");
                $(".control-one").removeClass("col-md-6");
                $(".control-one").removeClass("col-md-offset-3");
                $(".control-one").addClass("col-md-8");
                $(".control-one").addClass("col-md-offset-2");
                $(".control-two").removeClass("col-md-6");
                $(".control-two").addClass("col-md-4");
}
if(currentData==5){
                $(".radio-container").hide();
		        $(".title-text").hide();
		        $(".control-one").removeClass("col-md-6");
                $(".control-one").removeClass("col-md-offset-3");
                $(".control-one").addClass("col-md-8");
                $(".control-one").addClass("col-md-offset-2");
                $(".control-two").removeClass("col-md-6");
                $(".control-two").addClass("col-md-4");

}

var target,
   seconds =0, minutes =0, hours =0; var t;

function add() {
      seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
  

    
    target= (hours ? (hours > 3 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
    $("#timer").html("Time : "+ target);
    $(".timer").val(target);

    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}
timer();
  
    
   /* 
    setTimeout(() => {
        var modal1 = $('#closeGame', window.parent.document);
            modal1.click();
        }, 5000);
        */
        var correct=<?php echo json_encode($answers)?>;
        var collectAnswers=[];
        var userAnswers=[];
        var points=0;
        var questionLength=<?php echo sizeOf($questions);?>;
        var isSend=false;
        var flipimage=["Sidharth Malhotra and Akshay Kumar","Nargis Fakhri and Shraddha Kapoor","Mahesh babu and Allu Arjun"];

        function prepareArray(){
            collectAnswers=[];
            for(var i=0; i<questionLength; i++){
                if(currentData==0){
                        if(!$("input[class='q-answer']:checked").eq(i).val()){ 
                                swal("Please select your answer", "", "");
                        }else{
                            var value=$("input[class='q-answer']:checked").eq(i).val();
                        }
                    
                }else{
                    if($(".get-answer").eq(i).val()==""){ 
                                swal("Please enter your answer", "", "");
                        }else{
                            var value=$(".get-answer").eq(i).val();
                        }
                    
                }
                value=value.trim();
                value=value.toLowerCase();
                //console.log(value);
                collectAnswers.push(value);
                if(correct[i].toLowerCase()==value){
                    userAnswers.push(correct[i]);
                    points=points+1;
                    console.log("correct");
                }else{
                    console.log("incorrect");
                    //if(currentData==1){
                        //if(flipimage[i].toLowerCase()==value){
                          // userAnswers.push(correct[i]);
                          // points=points+1;
                           //console.log("correct");
                        //}
                    //}
                }
            }
            send();
        }


function send(){
    isSend=true;
                      $.ajax({ 
                                type: "POST", 
                                url: "submit.php?game=<?php echo $currentpos;?>", 
                                data: "time="+target+"&points="+points+"&answers="+collectAnswers.toString(), 
                                success: function(data){ 
                                    console.log(data);
                                    var data = JSON.parse(data);
                                    if(data.success){
                                        if(isdemo){
                                            swal("Subscribe to any PLAN to play with your peers.", "", "success").then(() => {
                                                  window.location="../thankyou.php";
                                                });
                                        }else{
                                            if(data.final){
                                               location.href="../thankyou.php";
                                                 }else{
                                               location.reload();
                                            }
                                        }
                                    }
                                } 
                            });   
}

$(".get-answer").on("keyup", function(e){
          var getcurrent=$(this).attr("pos");
          var value=$(this).val();
                value=value.toLowerCase();
                if(value==correct[getcurrent].toLowerCase()){
                  $(this).css("background","#c6ffc6");
                }else{
                    $(this).css("background","#ffdada");
                    if(currentData==1){
                        $(this).css("background","#ffdada");
                        if(flipimage[getcurrent].toLowerCase()==value){
                            $(this).css("background","#c6ffc6");
                        }else{
                            $(this).css("background","#ffdada");
                        }
                    }
                }
        });


 
$(".button-submit2").click(function(){
 if(!isSend){
    prepareArray();     
         }else{
            window.parent.closeGame();
         }

  

});

$(".button-skip").click(function(){
     $.ajax({ 
                                type: "POST", 
                                url: "skip.php?game=<?php echo $currentpos;?>", 
                                data: "time="+target+"&points="+points+"&answers=NULL", 
                                success: function(data){ 
                                    console.log(data);
                                    var data = JSON.parse(data);
                                    if(data.success){
                                        if(isdemo){
                                            swal("Subscribe to any PLAN to play with your peers.", "", "success").then(() => {
                                                  window.location="../thankyou.php";
                                                });
                                        }else{
                                            if(data.final){
                                               location.href="../thankyou.php";
                                                 }else{
                                               location.reload();
                                            }
                                        }
                                    }
                                } 
                            });
});

        </script>

    </body>
</html>
