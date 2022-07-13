<?php

error_reporting(E_ALL);
define(PER_PAGE, '50');

  $dbhost = 'extramileplay-php-db.czyfwf6hejqk.ap-south-1.rds.amazonaws.com';
  $dbuser = 'root';
  $dbpass = 'milesplay';
  $dbname = 'extramileplay_bollywood_bluffmaster_season2';
  $base_url = "";
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');




  $sql='SELECT email,points,pos,time,timestamp,timestamp_end,organizationId,sessionId FROM `stat` WHERE organizationId="44de7108-9747-49d8-8492-4cec21bab111"';

  $qur = mysqli_query($conn,$sql);

  $filename = "extramileplay_bollywood_bluffmaster_new_series.csv";
 
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: text/csv");
 
  $display = fopen("php://output", 'w');
 
  $flag = false;
  while($row = mysqli_fetch_assoc($qur)) {
    if(!$flag) {
      // display field/column names as first row
      fputcsv($display, array_keys($row), ",", '"');
      $flag = true;
    }
    fputcsv($display, array_values($row), ",", '"');
  }
  fclose($display);