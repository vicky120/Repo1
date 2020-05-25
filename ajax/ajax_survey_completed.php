<?php
include ("../config.php");
	$feed_id = $_POST['feedid'];
	$account_id = $_POST['account_id'];
 

    $completed_datetime = gmdate('Y-m-d H:i:s');
   	
	$userstatusgetsql = "select * from tbl_survey_poll_completed where survey_header_refrence_no='$feed_id' and account_id='$account_id'";
    $result = mysqli_query($conn,$userstatusgetsql) or die(mysqli_error($conn));
	$count=mysqli_num_rows($result);
	
	if($count>0)
		{
			 
			$sqlstr2 = "UPDATE tbl_survey_poll_completed SET `survey_completed_date` = '$completed_datetime', `survey_status` = 'completed' where survey_header_refrence_no='$feed_id' and account_id='$account_id'";
            $result2 = mysqli_query($conn, $sqlstr2) or die(mysqli_error()); 
			 
			 
		}else{
	
		$useranswerssql = "Insert into tbl_survey_poll_completed (`survey_header_refrence_no`,`account_id`,`survey_completed_date`,`survey_status`,`survey_start_date`) values ('$feed_id','$account_id','$completed_datetime','completed','$completed_datetime')";			
		$result = mysqli_query($conn, $useranswerssql) or die(mysqli_error());
		}

			 
		 
			 