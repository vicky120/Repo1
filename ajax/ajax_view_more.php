<?php
include ("../config.php");
$type=$_POST['type'];
$account=$_POST['account_id'];
$feed_id=$_POST['feed_id'];
 
 $sqlstr8 = "INSERT INTO `tbl_feed_account_activities` ( `account_id`, `feed_sequence_no`, `activity_type`, `activity_datetime`, `webcast_membership_activity`) VALUES ( '$account', '$feed_id', '$type', now(), '0')";
            $result8 = mysqli_query($conn, $sqlstr8) or die(mysqli_error());
?>
