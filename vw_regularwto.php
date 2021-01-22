<?php include('head.html'); ?>	

<body>
<?php include('sidebar.php');?>

<?php 
$spsid = $_REQUEST['SPSID'];
$tab_a = "";
$tab_b = "";

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

$emquery_emergency = $dbConn->query("SELECT * FROM emergency_notif_tab WHERE SPSID= '$spsid' AND INFO_USER ='$userid'");
$emresult_emergency = mysqli_fetch_assoc($emquery_emergency);

$emquery_country = $dbConn->query("SELECT * FROM tbl_em_country_code WHERE SPSID= '$spsid'");

$regupload = $dbConn->query("SELECT* FROM tbl_regular_upload WHERE SPSID = '$spsid'");
$emupload = $dbConn->query("SELECT* FROM tbl_em_upload WHERE SPSID = '$spsid'");


// if (isset($_GET['SPSID'])) {
//     $id = $_GET['SPSID'];

//     // fetch file to download from database
//     $sql = "SELECT * FROM tbl_em_upload WHERE `SPSID`=$id";
//     $result = mysqli_query($dbConn, $sql);

//     $file = mysqli_fetch_assoc($result);
//     $filepath = 'uploadsemergency/' . $file['name'];

//     if (file_exists($filepath)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; filename=' . basename($filepath));
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length: ' . filesize('uploadsemergency/' . $file['name']));
//         readfile('uploadsemergency/' . $file['name']);

//         // Now update downloads count
//         // $newCount = $file['downloads'] + 1;
//         // $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
//         // mysqli_query($conn, $updateQuery);
//         // exit;
//     }

// }
?>
<div class="container-fluid px-3 py-5">
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
          <a class="nav-link <?php echo $tab_b ?>" id="home-tab" data-toggle="tab" href="#home<?php echo $emresult_emergency['SPSID'];?>" role="tab" aria-controls="home" aria-selected="false">Emergency Measures</a>
        </li>
	</ul>

<div class="tab-content">
<div class="tab-pane fade <?php echo $tab_a ?> bg-white p-3 border border-top-0" id="regular<?php echo $result_regular['SPSID'];?>" role="tabpanel" aria-labelledby="fileLeave-tab">
		<form method="post">
			<div class="form-row">
		        <div class="col-lg-3 p-2">
		           <label> Notification Code <font color="#FF0000">*</font></label>
		        </div>

		        <div class="col-lg-8 p-2">
					<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $result_regular['notif_code'];?></div>
		        </div>

		        <div class="col-lg-3">
		           <label> Tag/s <font color="#FF0000">*</font> </label>
		        </div>
		        <div class="col-lg-9 p-2">
		    	    <?php 
				    	 $code_tag= $result_regular["reg_tag_code"];
		    	   		 $getTag = $dbConn->query("SELECT * FROM ref_tags WHERE tag_code ='$code_tag'");
		    	   		 $result_tag = mysqli_fetch_assoc($getTag);?>

					<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $result_tag['tag_desc'];?></div>
		        </div> 


		        <div class="col-lg-3">
		            <label>Document Type</label>
		        </div>
		        <div class="col-lg-9 p-2">
		    	    <?php
		    	     $code_doc = $result_regular["reg_doc_code"];
		    	     $getDoc = $dbConn->query("SELECT * FROM ref_doc WHERE doc_code = '$code_doc' ");
		    	     $result_doccode = mysqli_fetch_assoc($getDoc);?>
						<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $result_doccode['doc_desc'];?></div>
		        </div>

		        <div class="col-lg-3">
		           <label>Document No./Year</label>
		        </div>
				<div class="col-lg-3 p-2">
						<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $result_regular['reg_doc_no'];?></div>
		        </div>	 

		        <div class="col-lg-3 p-3">
		           <label> Series of</label>
		        </div>
				<div class="col-lg-3 p-2">
						<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $result_regular['reg_doc_year'];?></div>
		        </div>	    

		        <div class="col-lg-3">
		        	<label>Title of the Measure <font color="#FF0000">*</font> </label>
		        </div>
		        <div class="col-lg-8 ml-1">
		        	 	<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"> <?php echo $result_regular['reg_measure_title'];?></div>
		        </div> 
			   <div class="col-lg-3">
		             <label>Country/ies</label>
		        </div>
		        <div class="col-lg-9 p-2">
		        	   <?php while($result_country = mysqli_fetch_assoc($query_country)){
                    // if($result_country['reg_country_code']=='OTHERS'){ echo '<div class="col-lg-3">'.$row_comm['comm_info'] . '-' .$row_comm['info_other']. '</div>';}
                    //  else{ 
		        	   	echo '	<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;">'.$result_country['reg_country_code']. '</div>'; 
		        	   // }
                       }?><!-- 
	                  <div id="file_div">
					<select name="country[]" class="form-control col-sm-9 float-left" disabled="">
                        <?php //while($result_country = mysqli_fetch_assoc($query_country)){ ?>
                        <option value=""><?php //echo $result_country['reg_country_code'];?></option>
                        <?php //} ?>                              
                    </select> 
       				<button style="" type="button" class="btn btn-outline-primary col-sm-2 float-left ml-3" onclick="add_file();">ADD</button> -->
				</div>
	            </div> 
	            <div class="form-row">
		           	<div class="col-lg-3">
		            	<label>Date of the Measure <font color="#FF0000">*</font></label>
		            </div>
		            <div class="col-lg-3 p-2">
		        	 	<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"> <?php echo $result_regular['reg_date_measure'];?></div>
		            </div>
		        </div>
	            <div class="form-row">
			      	 <div class="col-lg-3">
		            	<label>Draft Version Date of Notification to WTO</label>
		            </div>
		            <div class="col-lg-3 p-2">
	            		<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"> <?php echo $result_regular['reg_draft_wto_date'];?></div>
		            </div>
			    </div>

		    <div class="form-row">
		    	 <div class="col-lg-3 p-2">
	            	<label>Adopted Version Date of Notification to WTO <font color="#FF0000">*</font></label>
	            </div>
	            <div class="col-lg-3 p-2">
            		<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"> <?php echo $result_regular['reg_adopted_wto_date'];?></div>
	            </div>
		    </div>

		    <div class="form-row">
		    	<div class="col-lg-3">
		    		<label>Uploaded file: </label>
		    	</div>
		    	<div class="col-lg-4 p-2">
		    		<?php while($row_reg = mysqli_fetch_assoc($regupload)){ ?>
		    		 <!-- <a href="uploads/<?php //echo $row_reg['reg_notif_doc_link'];?>" target="_blank"><?php //echo $row_reg['reg_notif_doc_link'].'<br/>';?></a> -->
	    		 		 <a href="#" class="btn btn-sm btn-secondary mb-1" disabled><?php echo $row_reg['reg_notif_doc_link'].'<br/>';?></a>
		    		<?php }?>
		    	</div>
		    </div>

		   <a href="frm_new_notif.php?tp=1" onclick="return confirm('Do you want to add New Regular WTO Measures?')" class="btn btn-sm btn-success mt-3">
		   <i class="fas fa-plus fa-xs"></i> ADD NEW </a>

	   <!--     <button name="submitrm" type="submit" onclick="return confirm('Are you sure you want to submit?')" class="btn btn-sm btn-primary mt-3">
		   <i class="fas fa-save fa-xs"></i> SAVE </button>		  -->
		</form>
	</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------- -->


<div class="tab-pane fade bg-white p-3 border border-top-0 <?php echo $tab_b ?>" id="home<?php echo $emresult_emergency['SPSID'];?>" role="tabpanel" aria-labelledby="home-tab">
	<form method="post">
	<div class="form-row">
	    <div class="col-lg-3 p-2">
           <label> Notification Code <font color="#FF0000">*</font></label>
        </div>

        <div class="col-lg-8 p-2">
			<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo  $emresult_emergency['notif_code'];?></div>
        </div>
	    <div class="col-lg-3">
	       <label> Tag/s <font color="#FF0000">*</font></label>
	    </div>
	    <div class="col-lg-9 p-2">
		    <?php 
	    	 $emcode_tag= $emresult_emergency['em_tag_code'];
	   		 $emgetTag = $dbConn->query("SELECT * FROM ref_tags WHERE tag_code ='$emcode_tag'");
	   		 $emresult_tag = mysqli_fetch_assoc($emgetTag);?>
		<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $emresult_tag['tag_desc'];?></div>
	    </div> 

	    <div class="col-lg-3">
	        <label>Document Type </label>
	    </div>
	    <div class="col-lg-9 p-2">
		     <?php
	    	     $emcode_doc = $emresult_emergency["em_doc_type"];
	    	     $emgetDoc = $dbConn->query("SELECT * FROM ref_doc WHERE doc_code = '$emcode_doc' ");
	    	     $emresult_doccode = mysqli_fetch_assoc($emgetDoc);?>
			<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $emresult_doccode['doc_desc'];?></div>
	    </div>

	    <div class="col-lg-3">
	       <label>Document No./Year</label>
	    </div>
		<div class="col-lg-3 p-2">
			<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $emresult_emergency['em_doc_no'];?></div>

	    </div>	 

	    <div class="col-lg-3 p-3">
	       <label> Series of</label>
	    </div>
		<div class="col-lg-3 p-2">
			<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $emresult_emergency['em_doc_year'];?></div>
	    </div>	    

	    <div class="col-lg-3">
	    	<label>Title of the Measure <font color="#FF0000">*</font></label>
	    </div>
	    <div class="col-lg-9">
			<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $emresult_emergency['em_measure_title'];?></div>
	    </div>  

	    <div class="col-lg-3">
	         <label>Country/ies</label>
	    </div>
	    <div class="col-lg-9 p-2">
	         <?php while($emresult_country = mysqli_fetch_assoc($emquery_country)){
                    // if($result_country['reg_country_code']=='OTHERS'){ echo '<div class="col-lg-3">'.$row_comm['comm_info'] . '-' .$row_comm['info_other']. '</div>';}
                    //  else{ 
        	   	echo '	<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;">'.$emresult_country['em_country_name']. '</div>'; 
        	   // }
               }?>
	    </div>

	    <div class="col-lg-3">
	    	<label>Date of the Measure <font color="#FF0000">*</font></label>
	    </div>
	    <div class="col-lg-3 p-2">
			<div class="form-control form-control-sm mt-1" style="background-color: lightgray;color:black;"><?php echo $emresult_emergency['em_date_measure'];?></div>
	    </div>
	</div>


	  <div class="form-row">
	    	<div class="col-lg-3">
	    		<label>Uploaded file: </label>
	    	</div>
	    	<div class="col-lg-4 p-2">
				<?php while($row_em = mysqli_fetch_assoc($emupload)){ ?>
	    		<!--  <a href="uploadsemergency/<?php// echo $row_em['reg_notif_doc_link'];?>" class="btn btn-sm btn-secondary mb-1" target="_blank" disabled><?php //echo $row_em['reg_notif_doc_link'].'<br/>';?></a> -->
	    		  <a href="#" class="btn btn-sm btn-secondary mb-1" disabled><?php echo $row_em['reg_notif_doc_link'].'<br/>';?></a>
	    		<?php }?>
	    	</div>
	    </div>

	   <a href="frm_new_notif.php?tp=2" onclick="return confirm('Do you want to add New Emergency WTO Measures?')" class="btn btn-sm btn-success mt-3">
	   <i class="fas fa-plus fa-xs"></i> ADD NEW</a>

	</form>
</div>
</div>  

<?php include('footer.html'); ?>
</body>
