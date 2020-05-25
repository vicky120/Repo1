<?php
include ("../config.php");
$account=$_POST['account'];
$feed_id=$_POST['feedid'];
 
echo $sqlstr8 = "INSERT INTO `tbl_feed_account_activities` ( `account_id`, `feed_sequence_no`, `activity_type`, `activity_datetime`, `webcast_membership_activity`) VALUES ( '$account', '$feed_id', '6', now(), '0')";
            $result8 = mysqli_query($conn, $sqlstr8) or die(mysqli_error());
?>
