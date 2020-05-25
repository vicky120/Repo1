<?php include ("../config.php");
$feed_id=$_POST['feedid'];

 ?>   

   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> <?php
		  $sqlstr2 = "SELECT * FROM  tbl_feed where feed_id='$feed_id'";
            $result2 = mysqli_query($conn, $sqlstr2) or die(mysqli_error());
            mysqli_num_rows($result2);
			$row2 = mysqli_fetch_array($result2)
		  
		  ?><?php echo $row2['feed_title']; ?></h4>
        </div>
        <div class="modal-body">
		<img class="" style="width:100%;height:200px" src="upload/<?php echo $row2['feed_display_image_url']; ?>" alt=""/>
          <p style="margin-top:40px">	<?php
	
			echo $row2['feed_short_desriptoin'];
			
					  $sqlstr4 = "SELECT * FROM tbl_feed_attachment where feed_sequence_no=$feed_id";
            $result4 = mysqli_query($conn, $sqlstr4) or die(mysqli_error());
            mysqli_num_rows($result4);
            if (mysqli_num_rows($result4) > 0) {
			while($row4= mysqli_fetch_array($result4))
			{
				$file = $row4['attachment_url'];
$ext = pathinfo($file, PATHINFO_EXTENSION);
echo "</p>";
if($ext==jpg)
{
?>
<img class="" style="width:30%;height:200px" src="upload/<?php echo $row4['attachment_url']; ?>" alt=""/>
<?php	
}
else if($ext==pdf)
{
	?>
	
	<a target="_blank" href="upload/<?php echo $row4['attachment_url']; ?>"><img class="" style="width:120px;height:150px" src="dist/img/pdf.png" alt=""/></a>
	<?php
}
	
			}
			}
				?>
				
				
				
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>