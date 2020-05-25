<?php 
include "../config.php";

$id=$_POST['feedid'];
 
	 $edit= "<span class='text text-success'>You have successfully Deleted</span>";


$sql="delete from tbl_feed_account_activities where feed_sequence_no=$id";
 $userEdit=mysqli_query($conn,$sql);



$sql="DELETE FROM `tbl_feed_tag_groups` WHERE `feed_sequence_no`='$id'";
 $userEdit=mysqli_query($conn,$sql);


$sql="DELETE FROM `tbl_feed` WHERE `feed_id`='$id'";
 $userEdit=mysqli_query($conn,$sql);
 

		
		if($userEdit){
		   echo "<span class='text text-successfully'>Deleted Successfully</span>";
		}
		else{
		 echo "<span class='text text-warning'>Deletion not Successfull</span>";
		}
 ?>