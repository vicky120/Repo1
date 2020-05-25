<?php
include ("../config.php");
	$feed_id = $_POST['feedid'];
	$questionno = $_POST['questionno'];
	$account_id = $_POST['account_id'];
	$answers = $_POST['res'];


    $created_datetime = gmdate('Y-m-d H:i:s');
	
	
   	
	$userstatussql = "Insert into tbl_survey_question_responses_response (`survey_poll_header-refrence_no`,`account_username`,`question_refrence_no`,`responce_details`,`responce_datetime`) values ('$feed_id','$account_id','$questionno','$answers','$created_datetime')";
			
	$result = mysqli_query($conn, $userstatussql) or die(mysqli_error());

			 
		 
			 