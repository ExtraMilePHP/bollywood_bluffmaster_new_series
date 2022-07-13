<?php 
session_start();
include_once 'dao/config.php';
include_once '../add_report.php';

$userId=$_SESSION['userId'];
$organizationId=$_SESSION['organizationId'];
$sessionId=$_SESSION['sessionId'];

$game=$_GET["game"];

$time=$_POST["time"];
$points=$_POST["points"];
$answers=$_POST["answers"];

$getpos="select * from stat where userid='$userId' and organizationId='$organizationId' and sessionId='$sessionId'";
$getpos=mysqli_query($con,$getpos);
$getpos=mysqli_fetch_object($getpos);
$currentpos=$getpos->pos;
$getPoints=$getpos->points;
$starttime=$getpos->timestamp;

$newPoints=$points+$getPoints;
$newPos=$currentpos+1;

                


if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
$timestamp = date('Y-m-d H:i:s');


$start_time = new DateTime($starttime);
$end_time = new DateTime($timestamp);
$diff = $end_time->diff($start_time);
//echo $diff->format('%H:%I:%S');
$count_time=$diff->format('%H:%I:%S');
$time=$count_time;

$update="UPDATE `stat` SET `points`='$newPoints',`pos`='$newPos', `time`='$time',`timestamp_end`='$timestamp' where userid='$userId' and organizationId='$organizationId' and sessionId='$sessionId'";
if(mysqli_query($con,$update)){
    if($newPos==6){
        function successResponse($tools){
            $_SESSION['userPlayedCount']=1;
            $_SESSION['score']=$tools["points"];
            if($tools["isdemo"]){
                $_SESSION['uniqueMsg']="Your score is ".$tools["points"]." out of 40.";
            }else{
                $_SESSION['uniqueMsg']="Your score is ".$tools["points"]." out of 40.";
            }
            echo json_encode(array("success"=>true,"isdemo"=>$tools["isdemo"],"final"=>true));
        }
        $data=["points"=>$newPoints,"time"=>$time];
        addReport($data);
    }else{
        if($_SESSION['firstName']=="demo"){
            $_SESSION['uniqueMsg']="Your score is ".$newPoints;
        }        
        echo json_encode(array("success"=>true,"final"=>false));
    }

}


?>