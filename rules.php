<?php
ob_start();
error_reporting(0);
session_start();
if($_SESSION['token'] == ""){
   header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live to fit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <style rel="stylesheet" type="text/css">
  body{
    width:100%;
    background-color: white;
    background-image: url(images/background-web.png);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
    overflow:unset;
}
.rules-text{
  width: 150px;
  margin-top: 25px;
  margin-bottom:20px;
}
.container-control{
    margin-top: -18px;
}
.next{
    width:130px;
    font-size: 18px;
    background: #e9695e;
}

@media (min-width:100px) and (max-width:500px){
    body{
        overflow: scroll;
        background-image: url(images/rules-mob.png);
        background-attachment: fixed;
    }
    .desk{
        display: none;
    }
    .mob{
        display: block;
    }
    .container-control{
        margin-top: -10px;
    }
    .welcome-logo{
        width: 100% !important;
    }
   }
   .welcome-logo{
       width: 560px;
   }
  </style>
</head>
<body>
<div class="container-fluid container-control">
<div class="row ">
<div class="col-md-3 auto "></div>
<div class="col-md-6 auto"><img src="images/welcome-logo.png" class="welcome-logo"/></div>
<div class="col-md-3 auto"></div>
</div>
<div class="row">
<div class="col-md-12 text-center">
<img class="rules-text" src="images/rules-text.png"/>
</div>
<div class="col-md-6 col-md-offset-3">
<ul>
<li>There are 3 challenges, each of which is timed</li>
<li>Solve all 3 challenges to reach closer to your goal</li>
<li>Participate as a team and be inclusive</li>
</ul>
</div>
<div class="col-md-12 text-center">
<a href="welcome.php"><div class="btn btn-info next">Next</div></a>
</div>
</div>
</div>

</body>
</html>
