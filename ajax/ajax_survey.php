<?php
include ("../config.php");
 
$feed_id=$_POST['feedid'];
$account_id=$_POST['account_id'];

$surveyname ="Survey";
 
    $surveynnamesql = "SELECT * from tbl_feed where `feed_id` =".$feed_id;
	$surresult = mysqli_query($conn,$surveynnamesql) or die(mysqli_error($conn));
	$count=mysqli_num_rows($surresult);
	if($count>0)
		{
			$surrow= mysqli_fetch_array($surresult);
			
			$surveyname = $surrow['feed_title'];
		}
		
	
      $start_datetime = gmdate('Y-m-d H:i:s');
   	
	$userstatusgetsql = "select * from tbl_survey_poll_completed where survey_header_refrence_no='$feed_id' and account_id='$account_id'";
	 
    $result = mysqli_query($conn,$userstatusgetsql) or die(mysqli_error($conn));
	$count=mysqli_num_rows($result);
	
	if($count == 0)
		{
			
		$useranswerssql = "Insert into tbl_survey_poll_completed (`survey_header_refrence_no`,`account_id`,`survey_status`,`survey_start_date`) values ('$feed_id','$account_id','inprogress','$start_datetime')";			
		$result = mysqli_query($conn, $useranswerssql) or die(mysqli_error());
		}	
		
		echo $useranswerssql;
		
 ?>
 <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $surveyname; ?></h4>
              </div>
			  <div class="modal-body" >
			  
			  <div id="survey_content_div">  
 <?php
		$questionsql = "SELECT * from tbl_survey_poll_question where survey_header_refrence_no =".$feed_id;
		$qtnresult = mysqli_query($conn,$questionsql) or die(mysqli_error($conn));
		$count=mysqli_num_rows($qtnresult);
		$qtncount = 1;
		if($count>0)
		{
			while($row = mysqli_fetch_array($qtnresult)) {
            ?>
			
			  <div style="padding:10px 20px;" id="qtn_<?php echo $qtncount; ?>" data-type="<?php echo $row['quetion_type']; ?>" data="<?php echo $row['survey_poll_question_id']; ?>">
			    <div><?php echo $row['question_details'];  ?></div>
				
			
			<div class="form-group" id='options_<?php echo $qtncount; ?>'>
			<div class="form-group">
				<?php 
				 $optionsql = "SELECT * from tbl_survey_poll_options where survey_poll_question_id =". $row['survey_poll_question_id'];
				$optresult = mysqli_query($conn,$optionsql) or die(mysqli_error($conn));
				$count=mysqli_num_rows($optresult);
				$optioncount = 1;
				if($count>0)
				{
					while($optrow = mysqli_fetch_array($optresult)) {
						//id="opttxt_<?php echo $row['survey_poll_question_id']; // _ //echo $optioncount; 
				
				if ($row['quetion_type'] == 'single') { ?>
					 <div class="radio">
						<label>
						  <input type="radio" name="optionsradio_<?php echo $row['survey_poll_question_id']; ?>" id="optionsradio_<?php echo $qtncount; ?>_<?php echo $optioncount; ?>" >
						  <?php echo $optrow['option_text'];  ?>
						</label>
					  </div>
					 
				 
				 <?php	} else{ ?>
				 <div class="checkbox">
                    <label>
                      <input type="checkbox" name="optionsradio_<?php echo $row['survey_poll_question_id']; ?>" id="optionsradio_<?php echo $qtncount; ?>_<?php echo $optioncount; ?>">
                      <?php echo $optrow['option_text'];  ?>
                    </label>
                  </div>
						 
				<?php
				}
				 
					$optioncount +=1;
				}
				}
				 
			   ?>
		   </div>
			 
				
			  </div>
			</div>
			<?php
			$qtncount +=1;
			}
		}
	?>
	<input type='hidden' id='totalqtn' value='<?php echo $qtncount - 1; ?>' />
	</div>
	<div id='survey_success_msg' style="display:none;" >
			<div>Your survey submitted successfully...	</div>
	</div>
	<div id='survey_err_message' style='display:none;'>Please fill all the questions before submiting survey</div>
	
	</div>
	
	
	<div>
		<div class="modal-footer">
                <button type="button" id='btn_survey_submit' class="btn btn-primary  pull-left" onclick='getQuestionsData(<?php echo $qtncount - 1; ?>,<?php echo $feed_id; ?>)'>Submit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
	
	</div>
			