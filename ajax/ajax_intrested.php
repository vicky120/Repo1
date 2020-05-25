<?php
include ("../config.php");
$type=$_POST['type'];
$account_id=$_POST['account_id'];
$feed_id=$_POST['feedid'];
$created_datetime = gmdate('Y-m-d H:i:s');
		
		
		
			$sqlstr4 = "SELECT activity_id FROM  tbl_feed_account_activities where feed_sequence_no='$feed_id' and account_id='$account_id' and activity_type=2";
            $result4 = mysqli_query($conn, $sqlstr4) or die(mysqli_error());
            mysqli_num_rows($result4);
			$count=mysqli_num_rows($result4);
           if($count==0)
		   {
 $sqlstr4 = "INSERT INTO `tbl_feed_account_activities` (`account_id`, `feed_sequence_no`, `activity_type`, `activity_datetime`) VALUES ('$account_id', '$feed_id', '2', '$created_datetime');";
            $result4 = mysqli_query($conn, $sqlstr4) or die(mysqli_error());
            mysqli_num_rows($result4);
		   }			
			?>
			<span  class="plike" style="float:right;margin-right:40px">			
				<span style="color:rgb(25,168,234)" onclick=""><i class="fa fa-fw fa-heart"></i>Intrested</span>
				</span>
				
			