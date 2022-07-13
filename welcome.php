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
if(empty($_SESSION["userId"])){
  header("Location:index.php");
}
if($_SESSION['firstName']=="demo"){
  $demoprint="var isdemo=true;";
}else{
  $demoprint="var isdemo=false;";
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
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="js/popImg.js"></script>

          
    </head>
    <body>
<?php include("../actions-default.php");  back("index.php?save");?>
    <div class="container-fluid" style="background:white;">
            <div class="row">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row ">
              <div class="col-md-6 col-md-offset-3" >


              <div class="col-md-12 col-xs-12 text-center">
              <img src="images/welcome-logo.png" class="" style="width:80%; margin:0 auto;"/>
              </div>

              <div class="col-md-12 text-center first-quote">
              ACTION. FLEX. UPLOAD
              </div>

              <div class="col-md-12 text-center first-title">
              

You are one step closer to getting fitter in body. mind and soul. Join us in this fun, light-hearted yet competitive fitness experience to push yourself closer to your goal.<br><br>
              Share photos/videos of how you are spending time on fitness and having fun!
              </div>
         <!--     <div class="col-md-8 col-md-offset-2 text-center contest">
              Top picks will be featured on our social media!</span>
              </div> -->
              <div class="col-md-12" style="margin-top:15px;">
              <div class="col-md-10 col-md-offset-1">
           <!--   <div class="form-title form-container">
              Upload below by filling in your details
              </div> -->
              <form class="form-horizontal" id="myform" style="">
  <div class="form-group">
    <label class="control-label col-sm-5" for="email">Your Name</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="name" placeholder="your name" value='<?php echo $_SESSION["firstName"]." ".$_SESSION["lastName"];?>' required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="email">Your Location</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="location" value="" placeholder="Your Location" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="email">Select a Category</label>
    <div class="col-sm-7">
    <select id="category" name="unit" class="text-nav form-control text-center" required>
                                                   <option value="burpe" selected>Max Burpees in 60seconds</optioin>
                                                   <option value="plank">Max Skips in 60seconds</optioin>
                                                   <option value="skip">Max Squats in 60 seconds</optioin>
                                                   <option value="squat">Max duration you can hold a Plank</optioin>
                                                   <option value="others">Create your own challenge</optioin>
    </select>	
    </div>
  </div>
  <div class="form-group your_challenge" style="display:none;">
    <label class="control-label col-sm-5" for="email">Title your challenge</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="add_cat" placeholder="Title your challenge">
    </div>
  </div>
  <div class="form-group" style="display:none;">
    <label class="control-label col-sm-5" for="email">Tag your Colleague name (Optional)</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="c_name" value="null" placeholder="your Colleague name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="email">Tag your Colleague (Optional)</label>
    <div class="col-sm-7">
      <input type="email" class="form-control" id="c_email"  placeholder="Insert your colleague's email id">
    </div>
  </div>
  <div class="form-group" style="display:none;">
    <label class="control-label col-sm-5" for="email">Title</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="business" value="null" placeholder="Title" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="email">Upload Video</label>
    <div class="col-sm-7">
      <input type="file" class="form-control" id="file" placeholder="Your Location" accept="video/*" required>
    </div>
    <label class="control-label col-md-12" for="email" style="font-size:14px; text-align:right;">Allowed Video Formats - MOV,MP4,AVI,3GP<br>
    VIDEO Max File Size ( 10 MB Only )<br>To compress large size videos, <a href="https://www.onlineconverter.com/compress-video" target="_blank" style="color:#e86362; font-weight:bold; text-decoration:underline;">use this link.</a></label>
  </div>
  <div class="progress" style="display:none;">
	  <div class="progress-bar" role="progressbar" aria-valuenow="70"
	  aria-valuemin="0" aria-valuemax="100" style="width:70%">
		70%
	  </div>
	</div>
  <div class="form-group">
    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-lg btn-default video-upload"  style="margin:0 auto; margin-top:5px; background-image: linear-gradient(to right, #E25569 , #FB9946); color:white;">Upload</button>
      <label class="control-label col-md-12" for="email" style="font-size:14px; text-align:center;">You can LIKE any post only once</label>
  
    </div>
  </div>
</form>
              </div>
              </div>
</div>
            </div>
        </div>

        <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="col-md-3 col-xs-6 text-center">
          <a href="welcome.php?find=ALL">
        <div class="cat_container">
        <div class="img-container"><img src="img/0.png"/></div><div class="title-container">All</div>
        </div>
          </a>
        </div>

        <div class="col-md-3 col-xs-6 text-center">
          <a href="welcome.php?find=plank">
        <div class="cat_container">
        <div class="img-container"><img src="img/2.png"/></div><div class="title-container">Burpees</div>
        </div>
          </a>
        </div>

        <div class="col-md-3 col-xs-6 text-center">
          <a href="welcome.php?find=skip">
        <div class="cat_container">
        <div class="img-container"><img src="img/3.png"/></div><div class="title-container">Skips</div>
        </div>
          </a>
        </div>

        <div class="col-md-3 col-xs-6 text-center">
          <a href="welcome.php?find=squat">
        <div class="cat_container">
        <div class="img-container"><img src="img/4.png"/></div><div class="title-container">Squats</div>
        </div>
          </a>
        </div>
        </div>
        </div>
        </div>

        <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="col-md-4 col-xs-6 text-center">
          <a href="welcome.php?find=burpe">
        <div class="cat_container">
        <div class="img-container"><img src="img/6.png"/></div><div class="title-container">Plank</div>
        </div>
          </a>
        </div>

        <div class="col-md-4 col-xs-6 text-center">
          <a href="welcome.php?find=others">
        <div class="cat_container">
        <div class="img-container"><img src="img/7.png"/></div><div class="title-container">Others</div>
        </div>
          </a>
        </div>

        <div class="col-md-4 col-xs-6 text-center" style="display:none;">
          <a href="welcome.php?find=DANCING">
        <div class="cat_container">
        <div class="img-container"><img src="img/dance_test.png"/></div><div class="title-container">DANCING</div>
        </div>
          </a>
        </div>
        </div>
        </div>
        </div>

        <div class="container-fluid">
         <div class="row" style="margin-top:0px;">
         <?php 
$q=$_GET["q"];

$limit=8; //////////// pagination limit //////////////////////
$pagefeed=$q*$limit;
if(empty($q)){
    $pagefeed=0;
}
$runpos=0;

    if($_GET["find"]=="plank"){
      $find="where category='plank'";
      $findParam="&find=plank";
      $eq=1;
    }else if($_GET["find"]=="skip"){
      $find="where category='skip'";
      $findParam="&find=skip";
      $eq=2;
    }else if($_GET["find"]=="squat"){
      $find="where category='squat'";
      $findParam="&find=squat";
      $eq=3;
    }else if($_GET["find"]=="burpe"){
      $find="where category='burpe'";
      $findParam="&find=burpe";
      $eq=4;
    }else if($_GET["find"]=="burpe"){
      $find="where category='burpe'";
      $findParam="&find=burpe";
      $eq=4;
    }else if($_GET["find"]=="others"){
      $find="where category='others'";
      $findParam="&find=others";
      $eq=5;
    }else if($_GET["find"]=="DANCING"){
      $find="where category='DANCING'";
      $findParam="&find=DANCING";
      $eq=5;
    }else if($_GET["find"]=="ALL"){
      $find="";
      $findParam="&find=ALL";
      $eq=0;
    }else{
      $findParam="";
    }

    if($find==""){
      $org="where organizationId='$organizationId' and sessionId='$sessionId'";
    }else{
      $org=" and organizationId='$organizationId' and sessionId='$sessionId'";
    }

$query="select * from uploads $find $org order by id desc limit $pagefeed,$limit";
$query=mysqli_query($con,$query);
$check_data=mysqli_num_rows($query);

while($get=mysqli_fetch_array($query)){
  $post_id=$get["id"];
                   $likes="select * from likes where post='$post_id' and user='$userId'"; 
                   $likes=mysqli_query($con,$likes);
                   $likes=mysqli_num_rows($likes);
                    if($likes>0){
                        $likes="true";
                    }else{
                        $likes="false";
                    }

                    $check_user="select * from uploads where id='$post_id' and userid='$userId' and organizationId='$organizationId' and sessionId='$sessionId' limit 1";
                    $check_user=mysqli_query($con,$check_user);
                    $check_user=mysqli_num_rows($check_user);
                    if($check_user==1){
                      $deleteAccess='<a href="delete.php?id='.$post_id.'&table=uploads&fallback=welcome.php"><img src="img/remove.png" style="cursor:pointer;width:30px; height:30px; position:absolute; right:16px; top:0px; background:black; border-radius:50%;" class="delete" post_id='.$post_id.'/></a>';
                    }else{
                      $deleteAccess='';
                    }

                    if($get["type"]=="video"){
                        echo '<div class="col-md-3 video-container" style="position:relative;">
                        <video controls controlsList="nodownload">
                      <source src="uploads/'.$get["video"].'" type="video/mp4">
                      Your browser does not support the video tag.
                      </video>
                      <div class="col-md-12 operation">
                      <div class="row">
                      <div class="col-md-4 col-xs-3" style="padding: 5px 7px;"><img src="img/like_new.png" class="vote like-image" post_id="'.$get["id"].'" report_id="'.$get["likesid"].'" status="'.$likes.'" /><span style="display:inline-block;">&nbsp;'.$get["likes"].'</span> </div>
                      <div class="col-md-8 col-xs-9"  style="text-align:right; padding: 5px 7px;">'.$get["name"].'</div>
                      </div>
                      </div>
                      '.$deleteAccess.'
                        </div>';
                    }
                    if($get["type"]=="image"){
                       echo '              <div class="col-md-3 video-container">
                       <img src="uploads/'.$get["video"].'" class="image-fix"/>
                     <div class="col-md-12 operation">
                     <div class="row">
                     <div class="col-md-4 col-xs-3" style="padding: 5px 7px;"><img src="img/like_new.png" class="vote like-image" post_id="'.$get["id"].'" report_id="'.$get["likesid"].'" status="'.$likes.'" /><span style="display:inline-block;">&nbsp;'.$get["likes"].'</span> </div>
                     <div class="col-md-8 col-xs-9"  style="text-align:right; padding: 5px 7px;">'.$get["name"].'</div>
                     <div class="col-md-12" style="text-align:right; padding-bottom:3px;">'.$get["business"].'</div>
                     </div>
                     </div>  </div>';
                    }

}

if($check_data==0){
     echo '<div class="well text-center" style="margin-top:15px; margin-bottom:20px;"> There is no post in this Category</div>';
}
?>
           
          
              
         </div>
        </div>
        <div class="pagination-container text-center">
  <ul class="pagination">
<?php 
$page=mysqli_query($con,"select * from uploads $find $org");
$page=mysqli_num_rows($page);
$pageCount=$page/$limit;
echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>';
for($i=0; $i<$pageCount; $i++){
    if($q==$i){
        echo '<li class="page-item active"><a class="page-link" href="welcome.php?'.$findParam.'&q='.$i.'">'.$i.'</a></li>';
    }else{
        echo '<li class="page-item"><a class="page-link" href="welcome.php?'.$findParam.'&q='.$i.'">'.$i.'</a></li>';
    }    
}
    echo '<li class="page-item disabled"><a class="page-link" href="">Next</a></li>';
?>
  </ul>
</div>
<div class="container-fluid">
<?php 
if($_SESSION["sessionId"] != "demobypass"){
  if(!$isRated){
    echo '<div class="col-md-12 text-center"><button class="btn next" style="text-align: center; width: 187px;"onclick="rate()">RATE THIS ACTIVITY</button></div>';
  }
}
?>
</div>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hii <?php echo $firstname;?></h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>

$(document).ready(function(){
    $("#category").change(function(){
        var selectedValue = $(this).children("option:selected").val();
        if(selectedValue=='others'){
          $(".your_challenge").show();
        }else{
          $(".your_challenge").hide();
        }
    });
});

<?php echo $demoprint;?>
$(".cat_container").eq(<?php echo $eq;?>).css("background","#2364ae");
$(".cat_container").eq(<?php echo $eq;?>).css("color","white");
$(".cat_container").eq(<?php echo $eq;?>).css("box-shadow","0px 0px 0px #00000082");

$(".image-fix").popImg();

function getFileType(file) {

if(file.type.match('image.*'))
  return 'image';

if(file.type.match('video.*'))
  return 'video';

return 'other';
}
          var myform = document.querySelector('#myform');
var inputfile = document.querySelector('#file');
var bar = document.getElementsByClassName("progress-bar")[0];
var progress=document.getElementsByClassName("progress")[0];
var userid="<?php echo $_SESSION["userId"];?>";
var organizationId="<?php echo $_SESSION["organizationId"];?>";
var token = "<?php echo $_SESSION['token']; ?>"
var request = new XMLHttpRequest();


request.upload.addEventListener('progress',function(e){
  bar.style.width=Math.round(e.loaded/e.total * 100)+'%';
  bar.innerHTML=Math.round(e.loaded/e.total * 100)+'% please wait..';
  $(".video-upload").hide();
},false);

myform.addEventListener('submit',function(e){
  e.preventDefault();
var name=$("#name").val();
var business=$("#business").val();
var location_user=$("#location").val();
var category=$("#category").val();
var add_cat=$("#add_cat").val();
var c_name=$("#c_name").val();
var c_email=$("#c_email").val();
  console.log(business);
    progress.style.display="block";
	e.preventDefault();
	var formData = new FormData();
    var checkUrl=getFileType(inputfile.files[0]);
    if(checkUrl=="video"){
        var appSend="upload-video.php";
  formData.append('file',inputfile.files[0]);
	formData.append("name",name);
	formData.append("business",business);
	formData.append("location",location_user);
  formData.append("category",category);
  formData.append("add_cat",add_cat);
  formData.append("c_name",c_name);
  formData.append("c_email",c_email);
  formData.append("userid",userid);
  formData.append("organizationId",organizationId);
  request.open('post',appSend,true);

	request.onreadystatechange=function(){
		if(request.readyState == 4 && request.status == 200){
      progress.style.display="none";
      var data = JSON.parse(request.responseText);
                    if(data.success){
                           if(data.isdemo){
                                 swal("Subscribe to any PLAN to play with your peers.", "", "success").then(() => {
                                  location.reload();
                              });
                       }else{
                                  updatePostUserid(data.reportId);
                                  swal("Thank you for Participating!", "", "success").then(() => {
                                                    location.reload();
                                              });
                         }
                }else{
                   alert(data);
                    }
		}

	}
	request.send(formData);
    }else if(checkUrl=="image"){
        swal("", "Only video files are allowed", "error");
    }
},false);


function updatePostUserid(report_id){
  $.ajax({ 
       type: "POST", 
       url: "likes_update.php", 
       data: "report_id="+report_id, 
       success: function(result){ 
          if(result=="true"){
            console.log("report id updated");
          }
        } 
});
}


$("body").on("click",".vote",function(){
    var post_id=$(this).attr("post_id");
    var status=$(this).attr("status");
    var report_id=$(this).attr("report_id");
    console.log(userid);
    if(isdemo){
      swal("", "Subscribe to any plan to LIKE posts.", "error");
    }else{
      if(status=="true"){
         swal("", "you have already liked the post!", "error");
    }else{
        $.ajax({ 
       type: "POST", 
       url: "likes.php", 
       data: "post_id="+post_id+"&user="+userid+"&organizationId="+organizationId+"&report_id="+report_id, 
       success: function(result){ 
         console.log(result);
           if(result=="blocked"){
                 swal("", "you have already liked this post!", "error");
           }else{
                 swal("", "Thank you for liking!", "success");
                 setTimeout(function(){
                  location.reload();
                },1500);    
             }
          } 
       });   
    } 
    }
});




function rate(){
 location.href="../rate-default.php";
}



function ratePop() {
        swal("Thank you For Participating!", "", {buttons: {catch: {text: "Rate this game",value: "Yes",},cancel: "Close"},})
            .then((value) => {
                switch (value) {
                    case "no":
                       location.reload();
                        break;

                    case "Yes":
                         rate();
                        break;

                    default:
                    location.reload();
                }
            });
    }

            <?php
            if(isset($error_auth)){
                echo  'swal("Invalid OTP", "Please Check Your OTP", "error");';
            }
            ?>
        </script>
    </body>
</html>
