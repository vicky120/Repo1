<?php
include ("../config.php");
$type=$_POST['type'];
$account_id=$_POST['account_id'];
$feed_id=$_POST['feedid'];
if($type==0)
{
 $sqlstr4 = "delete from `tbl_feed_account_activities` where feed_sequence_no=$feed_id and account_id=$account_id and activity_type=1";
            $result4 = mysqli_query($conn, $sqlstr4) or die(mysqli_error());
            mysqli_num_rows($result4);
}
else
{
$created_datetime = gmdate('Y-m-d H:i:s');
 $sqlstr4 = "INSERT INTO `tbl_feed_account_activities` (`account_id`, `feed_sequence_no`, `activity_type`, `activity_datetime`) VALUES ('$account_id', '$feed_id', '1', '$created_datetime');";
            $result4 = mysqli_query($conn, $sqlstr4) or die(mysqli_error());
            mysqli_num_rows($result4);	
}
?>
			<span  class="plike" style="float:right">
			<?php

$sqlstr4 = "SELECT activity_id FROM  tbl_feed_account_activities where feed_sequence_no='$feed_id' and account_id='$account_id' and activity_type=1";
            $result4 = mysqli_query($conn, $sqlstr4) or die(mysqli_error());
            mysqli_num_rows($result4);
            if (mysqli_num_rows($result4) > 0) {
				?>
				<span style="color:rgb(25,168,234)" onclick="fun_favorite(<?php echo $feed_id ?>,0,<?php echo $account_id ?>)"><i class="fa fa-fw fa-star"></i>Bookmarked</span>
				<?php
			}
			else
			{
			?>
			<span onclick="fun_favorite(<?php echo $feed_id ?>,1,<?php echo $account_id ?>)"><i class="fa fa-fw fa-star"></i> Bookmark </span><?php } ?></span>