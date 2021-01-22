<?php include('head.html'); ?>	
<?php include('session.php');?>

<body>	
<?php include('sidebar.php');?>
<?php include('menu.php'); ?>

<?php 
error_reporting(0);
$spsid = $_GET['SPSID'];
$tab_a = "";
$tab_b = "";
$cntReg = 0;
$cntEm =0;

if(isset($_GET['tp'])){
	$tp = $_GET['tp'];
	if($tp==1){
		$tab_a = "show active";
	}else{
		$tab_b = "show active";
	}
}else{
	$tp = "";
	$tab_a = "show active";	
}

$query_regular = $dbConn->query("SELECT * FROM regular_notif_tab WHERE SPSID= '$spsid' AND INFO_USER ='$userid'");
$result_regular = mysqli_fetch_assoc($query_regular);

$query_country = $dbConn->query("SELECT * FROM tbl_reg_country_code WHERE SPSID= '$spsid'");

$emquery_emergency = $dbConn->query("SELECT * FROM emergency_notif_tab WHERE SPSID= '$spsid' AND INFO_USER ='$userid' ");
$emresult_emergency = mysqli_fetch_assoc($emquery_emergency);

$emquery_country = $dbConn->query("SELECT * FROM tbl_em_country_code WHERE SPSID= '$spsid'");

?>


<div class="container-fluid px-3 py-0">
	<div class="col-lg-12 bg-white border p-3">
        <div class="form-row">
                <div class="col-lg-12">
                    <!-- Page Heading -->
                    <h5 class="mb-2 text-gray-800 text-center">Philippine SPS Notifications<br/>to the World Trade Organization(WTO)</h5>
                </div>

<div class="container">
  <br>
  <!-- Nav pills -->
   <ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
          <a class="nav-link <?php echo $tab_a ?>" id="fileLeave-tab" data-toggle="tab" href="#regular<?php echo $result_regular['SPSID'];?>" role="tab" aria-controls="fileLeave" aria-selected="true">Regular Measures</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $tab_b ?>" id="home-tab" data-toggle="tab" href="#emergency<?php echo $emresult_emergency['SPSID'];?>" role="tab" aria-controls="home" aria-selected="false">Emergency Measures</a>
        </li>
	</ul>

<div class="tab-content">
	<div class="tab-pane fade <?php echo $tab_a ?> bg-white p-3 border border-top-0" id="regular<?php echo $result_regular['SPSID'];?>" role="tabpanel" aria-labelledby="fileLeave-tab">
		<form class="form-inline" method="POST">
			<div class="input-group col-lg-12">
				<input type="text" class="form-control" placeholder="Search Notification Code..." name="searchReg" required="required"/>
				<span class="input-group-btn">
					<button class="btn btn-primary ml-2" name="btnsearch"> <i class="fas fa-search"></i> </button>
				</span>
			</div>
		</form>	

			<?php
				if(ISSET($_POST['btnsearch'])){
					$notif_code = $_POST['searchReg'];
						$query = $dbConn->query("SELECT * FROM `regular_notif_tab` WHERE `notif_code` LIKE '%$notif_code%'");
						$fetch = mysqli_fetch_assoc($query);
						$cntReg = mysqli_num_rows($query);
						$spsid =$fetch['SPSID'];

						$regupload = $dbConn->query("SELECT* FROM tbl_regular_upload WHERE SPSID = '$spsid'");
					  	 // echo "<script>window.location.href='upt_frm_wto.php?SPSID=$spsid&tp=1';</script>";
					}
			?>
				<div>
					<div class="form-row">
				        <div class="col-lg-3 p-2">
				           <label> Notification Code <font color="#FF0000">*</font></label>
				        </div>
				        <div class="col-lg-9 p-2">
							<input value="<?php echo $fetch['notif_code'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div>
				  
					    <div class="col-lg-3">
					       <label> Tag/s <font color="#FF0000">*</font> </label>
					    </div>
				        <div class="col-lg-9 p-2">
				    	    <?php 
					    	 $code_tag= $fetch["reg_tag_code"];
					   		 $getTag = $dbConn->query("SELECT * FROM ref_tags WHERE tag_code ='$code_tag'");
					   		 $result_tag = mysqli_fetch_assoc($getTag);
				    	   	?>
						
							<input value="<?php echo $result_tag['tag_desc'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
						</div> 

				        <div class="col-lg-3">
				            <label>Document Type</label>
				        </div>
				        <div class="col-lg-9 p-2">
				    	    <?php
				    	     $code_doc = $fetch["reg_doc_code"];
				    	     $getDoc = $dbConn->query("SELECT * FROM ref_doc WHERE doc_code = '$code_doc' ");
				    	     $result_doccode = mysqli_fetch_assoc($getDoc);?>
								
						  <input value="<?php echo $result_doccode['doc_desc'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div>

				        <div class="col-lg-3">
				           <label>Document No./Year</label>
				        </div>
						<div class="col-lg-3 p-2">
							<input value="<?php echo $fetch['reg_doc_no'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div>	 

				        <div class="col-lg-3 p-3">
				           <label> Series of</label>
				        </div>
						<div class="col-lg-3 p-2">
							<input value="<?php echo $fetch['reg_doc_year'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div>	    

				        <div class="col-lg-3">
				        	<label>Title of the Measure <font color="#FF0000">*</font> </label>
				        </div>
				        <div class="col-lg-8 ml-1">
							<input value="<?php echo $fetch['reg_measure_title'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div> 

				        <div class="col-lg-3">
				             <label>Country/ies</label>
				        </div>
				        <div class="col-lg-9 p-2">
				        	   <?php 
				        	   		$SPSID = $fetch['SPSID'];
				        	   	    $query_country = $dbConn->query("SELECT * FROM tbl_reg_country_code WHERE SPSID ='$SPSID' ");
				        	   	    while($result_country = mysqli_fetch_assoc($query_country)){
				                  
						        	   	echo '	<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;">'.$result_country['reg_country_code']. '</div>'; 
				                   }

				                ?>
				        </div>

				         <div class="col-lg-3">
				        	<label>Date of the Measure <font color="#FF0000">*</font> </label>
				        </div>
				        <div class="col-lg-8 ml-1">
							<input value="<?php echo $fetch['reg_date_measure'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div> 

				        <div class="col-lg-3">
				        	<label>Draft Version Date of Notification to WTO</label>
				        </div>
				        <div class="col-lg-8 ml-1">
							<input value="<?php echo $fetch['reg_draft_wto_date'];?>" class=" form-control-sm form-control mt-1" style="background-color: lightgray;color:black;" disabled>
				        </div> 

				         <div class="col-lg-3">
				        	<label>Adopted Version Date of Notification to WTO <font color="#FF0000">*</font> </label>
				        </div>
				        <div class="col-lg-8 ml-1">
							<input value="<?php echo $fetch['reg_adopted_wto_date'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div>

				         <div class="col-lg-3">
				        	<label>Uploaded Files <font color="#FF0000">*</font> </label>
				        </div>
				        <div class="col-lg-8 ml-1">
				        	<?php while($row_reg = mysqli_fetch_assoc($regupload)){ ?>
				    		  <a href="#" class="btn btn-sm btn-secondary mb-1" disabled><?php echo $row_reg['reg_notif_doc_link'].'<br/>';?></a>
				    		<?php }?>
				        </div>
				    </div>
			</div>
		<?php //} ?>

		<?php 
		   if(isset($_POST['submitupt'])){

			    $newnotifknown = $_POST['regknown'];
			    $newnotifcode = $_POST['regnotifcode'];
			    $newnotifdate = $_POST['regnotifdate'];
			    // echo "<script>alert('$newnotifknown''$newnotifcode''$newnotifdate')</script>";
			  	   $getSPSID = $dbConn->query("SELECT * from regular_notif_tab");
			  	   $rowSPSID = mysqli_fetch_assoc($getSPSID);

			  	   $SPSID = $_POST['SPSID'];

			  	   $dbConn->query('UPDATE regular_notif_tab SET reg_notif_known="'.$newnotifknown.'", 
			  	   												reg_new_notif_code="'.$newnotifcode.'", 
			  	   												reg_new_notif_date="'.$newnotifdate.'" 
			  	   											    WHERE SPSID = "'.$SPSID.'"');

	        $uploadsDir = "uploadUpdate/";
	        $allowedFileType = array('jpg','png','jpeg','pdf');
        
	        // Velidate if files exist
            $total = count($_FILES['upload']['name']);

			// Loop through each file
            
            for( $i=0 ; $i < $total ; $i++ ) {
            
                // Get files upload path
                $fileName        = $_FILES['upload']['name'][$i];
                $tempLocation    = $_FILES['upload']['tmp_name'][$i];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;
                

                if(in_array($fileType, $allowedFileType)){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                          $sqlVal = $fileName;
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
             
                    $insert = $dbConn->query('INSERT INTO update_regular_uploads (SPSID, upt_reg_doc_link, INFO_USER, INFO_ACCESSLEVEL) VALUES ("' . $SPSID . '", "' . $sqlVal . '", "' . $userid . '", "' . $accesslvl . '")');      
           
            }
			  	// $SPSID='';
		  	 // echo "<script>window.location.href='upt_frm_wto.php?SPSID=$spsid&tp=1';</script>";
		  	}
		?>
		<hr 999/>

		<?php if($cntReg!=0){ ?>
			<div class="container-fluid px-3 py-0">
			<div class="col-lg-12 bg-white border p-3">
				<form method="post" enctype='multipart/form-data'>
		        <div class="form-row">
		            <div class="col-lg-12">
		            	<h3>UPDATES</h3>
		            </div>
		            <div class="col-lg-4 bg-label">
		            	<label>Is the publication and entry into force known?</label>
		            </div>
		            <?php 
		            $getSPSID = $dbConn->query("SELECT * from regular_notif_tab WHERE SPSID ='$SPSID'");
     		  	    $rowSPSID = mysqli_fetch_assoc($getSPSID);
		            ?>
		            <div class="col-lg-8">

		            	<input type="radio" value="Still not known" <?php if($rowSPSID['reg_notif_known']=="Still not known"){ echo "checked";} else{}?> name="regknown"> Still not known

		            	<input type="radio" class="ml-3" value="Known" <?php if($rowSPSID['reg_notif_known']=="Known"){ echo "checked";} else{}?> name="regknown"> Known
		            </div>
		            <input type="hidden" name="SPSID" value="<?php echo $SPSID;?>">
		            <div class="col-lg-4 bg-label">
		            	<label>New Notification Code of the Publication and Entry into Force</label>
		            </div>

		            <div class="col-lg-8">
		            	<input type="text" name="regnotifcode" value="<?php if($rowSPSID['reg_new_notif_code']!=NULL){ echo $rowSPSID['reg_new_notif_code']; } else{}?>" placeholder="G/SPS/N/PHL" class="form-control-sm form-control">
		            </div>

		            <div class="col-lg-4 bg-label">
		            	<label>Date of Notification to WTO of the Publication and Entry</label>
		            </div>

		            <div class="col-lg-4">
		            	<input type="date" name="regnotifdate" value="<?php if($rowSPSID['reg_new_notif_date']!=NULL){ echo $rowSPSID['reg_new_notif_date']; } else{}?>" class="form-control-sm form-control">
		            </div>
		            
		            <div class="col-lg-4"></div>

	
		            <div class="col-lg-4 bg-label">
		                <label for="chooseFile">Select files to Upload</label> 
		            </div>
	   	            <div class="col-lg-8">
		                <input type="file" name="upload[]" id="chooseFile" multiple>
		            </div>

		        </div>
		          <button name="submitupt" type="submit" onclick="return confirm('Are you sure you want to submit?')" class="btn btn-sm btn-primary float-right mb-3">
				   <i class="fas fa-save fa-xs"></i> SAVE </button>	
			    </form>
		    </div>
		</div>
	<?php } ?>
	</div>
	<!-- ------------------------------------------------------------------------------------------------------------------------------------- -->

<div class="tab-pane fade bg-white p-3 border border-top-0 <?php echo $tab_b ?>" id="emergency<?php echo $emresult_emergency['SPSID'];?>" role="tabpanel" aria-labelledby="home-tab">
<form class="form-inline" method="POST" action="upt_frm_wto.php">
			<div class="input-group col-lg-12">
				<input type="text" class="form-control" placeholder="Search Notification Code..." name="searchEm" required="required"/>
				<span class="input-group-btn">
					<button class="btn btn-primary ml-2" name="btnsearchEm"> <i class="fas fa-search"></i> </button>
				</span>
			</div>
		</form>	

			<?php
			if(ISSET($_POST['btnsearchEm'])){
					$notif_codeem = $_POST['searchEm'];
						
					$getEm = $dbConn->query("SELECT * FROM `emergency_notif_tab` WHERE `notif_code` LIKE '%$notif_codeem%'");
					$rowEm = mysqli_fetch_assoc($getEm);
					$spsid_em = $rowEm['SPSID'];
					$cntEm = mysqli_num_rows($getEm);

					$emupload = $dbConn->query("SELECT* FROM tbl_em_upload WHERE SPSID = '$spsid'");

					 // echo "<script>window.location.href='upt_frm_wto.php?SPSID=$spsid_em&NC=$notif_codeem&tp=2';</script>";
					}

			  	
			?>
				<div>
					<?php
					
					?>
					<div class="form-row">
				        <div class="col-lg-3 p-2">
				           <label> Notification Code <font color="#FF0000">*</font></label>
				        </div>
				        <div class="col-lg-9 p-2">
							<input value="<?php echo $rowEm['notif_code'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div>
				  
					    <div class="col-lg-3">
					       <label> Tag/s <font color="#FF0000">*</font> </label>
					    </div>
				        <div class="col-lg-9 p-2">
				    	    <?php 
					    	 $code_tagem= $rowEm['em_tag_code'];
					   		 $getTagem = $dbConn->query("SELECT * FROM ref_tags WHERE tag_code ='$code_tagem'");
					   		 $result_tagem = mysqli_fetch_assoc($getTagem);
				    	   	?>
						
							<input value="<?php echo $result_tagem['tag_desc'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
						</div> 

				        <div class="col-lg-3">
				            <label>Document Type</label>
				        </div>
				        <div class="col-lg-9 p-2">
				    	    <?php
				    	     $code_docem = $rowEm['em_doc_type'];
				    	     $getDocem = $dbConn->query("SELECT * FROM ref_doc WHERE doc_code = '$code_docem' ");
				    	     $result_doccodeem = mysqli_fetch_assoc($getDocem);?>
								
						  <input value="<?php echo $result_doccodeem['doc_desc'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div>

				        <div class="col-lg-3">
				           <label>Document No./Year</label>
				        </div>
						<div class="col-lg-3 p-2">
							<input value="<?php echo $rowEm['em_doc_no'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div>	 

				        <div class="col-lg-3 p-3">
				           <label> Series of</label>
				        </div>
						<div class="col-lg-3 p-2">
							<input value="<?php echo $rowEm['em_doc_year'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div>	    

				        <div class="col-lg-3">
				        	<label>Title of the Measure <font color="#FF0000">*</font> </label>
				        </div>
				        <div class="col-lg-8 ml-1">
							<input value="<?php echo $rowEm['em_measure_title'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div> 

				        <div class="col-lg-3">
				             <label>Country/ies</label>
				        </div>
				        <div class="col-lg-9 p-2">
				        	   <?php 
				        	   		$SPSID_country = $rowEm['SPSID'];
				        	   	    $query_countryem = $dbConn->query("SELECT * FROM tbl_em_country_code WHERE SPSID ='$SPSID_country'");
				        	   	    while($result_countryem = mysqli_fetch_assoc($query_countryem)){
				                  
						        	   	echo '	<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;">'.$result_countryem['em_country_name']. '</div>'; 

				                   }

				                ?>
				        </div>

				         <div class="col-lg-3">
				        	<label>Date of the Measure <font color="#FF0000">*</font> </label>
				        </div>
				        <div class="col-lg-8 ml-1">
							<input value="<?php echo $rowEm['em_date_measure'];?>" class=" form-control-sm form-control" style="background-color: lightgray;color:black;" disabled>
				        </div> 

				        <div class="col-lg-3">
				        	<label>Date of Notification to WTO</label>
				        </div>
				        <div class="col-lg-8 ml-1">
							<input value="<?php echo $rowEm['em_wto_date'];?>" class=" form-control-sm form-control mt-1" style="background-color: lightgray;color:black;" disabled>
				        </div> 
				    </div>
			   
			</div>

		<?php 
		   if(isset($_POST['submituptem'])){

			    $newnotifknownem = $_POST['emknown'];
			    $newnotifcodeem = $_POST['emnotifcode'];
			    $newnotifdateem = $_POST['emnotifdate'];
			    $newtype =$_POST['emnewtype'];
			    $newdocno = $_POST['emnewdocno'];
			    $newyear = $_POST['emnewyear'];
			    $newupttitle = $_POST['emnewuptitle'];
			    $newdatenotif = $_POST['emnewdatenotif'];

			    // echo "<script>alert('$newnotifknownem''$newnotifcodeem''$newnotifdateem')</script>";
			  	   $getSPSIDemergency = $dbConn->query("SELECT * from emergency_notif_tab");
			  	   $rowSPSIDemergency = mysqli_fetch_assoc($getSPSIDemergency);

			  	   $SPSIDemergency = $_POST['SPSID'];

			  	   $dbConn->query('UPDATE emergency_notif_tab SET em_notif_known   ="'.$newnotifknownem.'", 
			  	   												em_new_notif_code  ="'.$newnotifcodeem.'", 
			  	   												em_new_notif_date  ="'.$newnotifdateem.'",
			  	   												em_new_title       ="'.$newtype.'",
			  	   												em_new_doc_no      ="'.$newdocno.'",
			  	   												em_new_year        ="'.$newyear.'" ,
			  	   												em_new_upt_title   ="'.$newupttitle.'" 

			  	   											    WHERE SPSID = "'.$SPSIDemergency.'"');
		   $uploadsDir = "uploadUpdateEm/";
	        $allowedFileType = array('jpg','png','jpeg','pdf');
        
	        // Velidate if files exist
            $total = count($_FILES['upload']['name']);

			// Loop through each file
            
            for( $i=0 ; $i < $total ; $i++ ) {
            
                // Get files upload path
                $fileName        = $_FILES['upload']['name'][$i];
                $tempLocation    = $_FILES['upload']['tmp_name'][$i];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;
                

                if(in_array($fileType, $allowedFileType)){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                          $sqlVal = $fileName;
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
             
                    $insert = $dbConn->query('INSERT INTO update_em_uploads (SPSID, upt_em_doc_link, INFO_USER, INFO_ACCESSLEVEL) VALUES ("' . $SPSIDemergency . '", "' . $sqlVal . '", "' . $userid . '", "' . $accesslvl . '")');      
           
            }	   
			  	// $SPSIDemergency='';
			  	 // echo "<script>window.location.href='upt_frm_wto.php?SPSID=$SPSIDemergency&tp=2';</script>";
		  	}
		?>
		<hr 999/>
		<?php if($cntEm!=0){ ?>
			<div class="container-fluid px-3 py-0">
			<div class="col-lg-12 bg-white border p-3">
				<form method="post" enctype='multipart/form-data'>
		        <div class="form-row">
		            <div class="col-lg-12">
		            	<h3>UPDATES</h3>
		            </div>
		            <div class="col-lg-4 bg-label">
		            	<label>Is the publication and entry into force known?</label>
		            </div>
		            <?php 

     		  	    $cntupload=0;
		            $getSPSIDemer = $dbConn->query('SELECT * FROM emergency_notif_tab WHERE SPSID ="'.$rowEm['SPSID'].'"');
     		  	    $rowSPSIDemer = mysqli_fetch_assoc($getSPSIDemer);
     		  	    $cntupload = mysqli_num_rows($getSPSIDemer);

					$emupload = $dbConn->query('SELECT* FROM update_em_uploads WHERE SPSID = "'.$rowEm['SPSID'].'"');
		            ?>

		            <input type="hidden" name="SPSID" value="<?php if($rowEm['SPSID']!=NULL){ echo $rowEm['SPSID'];};?>">
		            <div class="col-lg-8">

		            	<input type="radio" value="Updated" <?php if($rowSPSIDemer['em_notif_known']=="Updated"){ echo "checked";} else{}?> name="emknown"> Updated

		            	<input type="radio" value="Withdrawn" <?php if($rowSPSIDemer['em_notif_known']=="Withdrawn"){ echo "checked";} else{}?> name="emknown"> Withdrawn
		            </div>
		            <div class="col-lg-4 bg-label py-2">
		            	<label>New Notification Code</label>
		            </div>

		            <div class="col-lg-8">
		            	<input type="text" name="emnotifcode" value="<?php if($rowSPSIDemer['em_new_notif_code']!=NULL){ echo $rowSPSIDemer['em_new_notif_code']; } else{}?>" class="form-control-sm form-control">
		            </div>

		            <div class="col-lg-4 bg-label py-2">
		            	<label>Date of Updated Notification to WTO</label>
		            </div>

		            <div class="col-lg-8">
		            	<input type="date" name="emnotifdate" value="<?php if($rowSPSIDemer['em_new_notif_date']!=NULL){ echo $rowSPSIDemer['em_new_notif_date']; } else{}?>" class="form-control-sm form-control">
		            </div>

		            <div class="col-lg-4 bg-label py-2">
		            	<label>Updated Title of the Measure</label>
		            </div>

		            <div class="col-lg-8">		
		            	 <?php
		            	 	$type = $rowSPSIDemer['em_new_title'];
		            	 	if($rowSPSIDemer['em_new_title']==NULL){
		    	   		    $getDoc = $dbConn->query("SELECT * FROM ref_doc");}
		    	   		    else{
		    	   		    	$getType = $dbConn->query("SELECT * FROM ref_doc WHERE doc_code ='$type' ");
		    	   		    	$rowType =mysqli_fetch_assoc($getType);
 		    	   		    }
		    	   		    ?>
	             	    <select name="emnewtype" placeholder="Document Type" class="form-control text-xs" required>
             	    	<option value="<?php if($rowSPSIDemer['em_new_title']!=NULL){ echo $rowSPSIDemer['em_new_title']; } else{}?>"><?php if($rowType['doc_desc']!=NULL){ echo $rowType['doc_desc']; } else{}?></option>
	                    <option value="" disabled>SELECT DOCUMENT TYPE</option>
	                    	<?php while($rowDoc = mysqli_fetch_assoc($getDoc)) { ?>
	                    <option value="<?php echo $rowDoc['doc_code']; ?>">
	                    <?php echo $rowDoc['doc_desc']; ?>
	                    </option>
	                    <?php } ?>
	                </select>
		            </div>

		            <div class="col-lg-4 bg-label py-2">
		            	<label>Document No. / Year</label>
		            </div>

		            <div class="col-lg-3">
		            	<input type="text" name="emnewdocno" value="<?php if($rowSPSIDemer['em_new_doc_no']!=NULL){ echo $rowSPSIDemer['em_new_doc_no']; } else{}?>" class="form-control-sm form-control">
		            </div>

		             <div class="col-lg-2 bg-label py-2">
		            	<label>Series of</label>
		            </div>

		            <div class="col-lg-3">
		            		<select name="emnewyear" class="form-control">
		            				<option value="<?php if($rowSPSIDemer['em_new_year']!=NULL){ echo $rowSPSIDemer['em_new_year']; } else{}?>"><?php if($rowSPSIDemer['em_new_year']!=NULL){ echo $rowSPSIDemer['em_new_year']; } else{}?></option>
							   	    <option value="" disabled>SELECT YEAR</option>
			                        <option value="2017">2017</option>
			                        <option value="2018">2018</option>
			                        <option value="2019">2019</option>
			                        <option value="2020">2020</option>
			                        <option value="2021">2021</option>
			                        <option value="2022">2022</option>
			                        <option value="2023">2023</option>
			                        <option value="2024">2024</option>
			                        <option value="2025">2025</option>
			                        <option value="2026">2026</option>
			                        <option value="2027">2027</option>
			                        <option value="2028">2028</option>
			                        <option value="2029">2029</option>
			                        <option value="2030">2030</option>
							</select>
		            </div>

		          <div class="col-lg-4 bg-label py-2">
		            	<label>Title of the Updated Measure</label>
		            </div>

		            <div class="col-lg-8 py-2">
		            	<textarea row="2" type="text" name="emnewuptitle" value="<?php if($rowSPSIDemer['em_new_upt_title']!=NULL){ echo $rowSPSIDemer['em_new_upt_title']; } else{}?>" class="form-control-sm form-control"><?php if($rowSPSIDemer['em_new_upt_title']!=NULL){ echo $rowSPSIDemer['em_new_upt_title']; } else{}?></textarea>
		            </div> 
		              
		            <div class="col-lg-12"></div>

			    	 <div class="col-lg-4 bg-label">
		                <label for="chooseFile">Select files to Upload</label> 
		            </div>

				 	<?php if($cntupload==0){ ?>
	   	            <div class="col-lg-8">
		                <input type="file" name="upload[]" multiple>
		            </div>
				 	<?php } ?>
				 	<?php if($cntupload!=0){ ?>
	   	            <div class="col-lg-8">
		       			<?php } while($row_em = mysqli_fetch_assoc($emupload)){ ?>
		    		 <!-- <a href="uploads/<?php //echo $row_reg['reg_notif_doc_link'];?>" target="_blank"><?php //echo $row_reg['reg_notif_doc_link'].'<br/>';?></a> -->
	    		 		 <a href="#" class="btn btn-sm btn-secondary mb-1" disabled><?php echo $row_em['upt_em_doc_link'].'<br/>';?></a>
			    		<?php }?>
		            </div>
		        </div>
		          <button name="submituptem" type="submit" onclick="return confirm('Are you sure you want to submit?')" class="btn btn-sm btn-primary float-right mb-3">
				   <i class="fas fa-save fa-xs"></i> SAVE </button>	
			    </form>
		    </div>
		</div>
	<?php } ?>
	</div>
</div>
<?php include('footer.html'); ?>
</body>
