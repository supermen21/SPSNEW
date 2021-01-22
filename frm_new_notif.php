<?php include('head.html'); ?>  
<?php include('session.php');?>

<body>  
<?php include('sidebar.php');?>
<?php include('menu.php'); ?>
<?php $countryArr = null; ?>

<!-- REGULAR TAB -->
<?php 

   if(isset($_POST['submitrm'])){

   // $notif   = $_POST['notif_code'];
   $tagcode = $_POST['tag_code'];
   $doccode = $_POST['doc_type'];
   $docno   = $_POST['doc_no'];
   $docyear = $_POST['doc_year'];
   $title   = $_POST['txtTitle'];
   $dateMeasure    = $_POST['txtDateMeasure'];
   $draftdate  = $_POST['draft_date'];
   $adopted_date = $_POST['adopted_date'];
   // $notiflink = $_POST['notif_link'];

   $spsidquery= $dbConn->query('SELECT * FROM regular_notif_tab order by ID DESC LIMIT 1');
   $row_spsid = mysqli_fetch_array($spsidquery);
   $monthsps = date('m');
   $month = date('m');
   $day =date('d');
   $year = date('Y');

   $getsps = $row_spsid['ID'] + 2;
   $spsid = '10'. $month. $day. $year. $getsps;
   $notifcode = 'G/PSPS/N/PHL/'.$monthsps. rand(1,1000);

     $dbConn->query("INSERT INTO regular_notif_tab (SPSID, notif_code, reg_tag_code, reg_doc_code, reg_doc_no, reg_doc_year, reg_measure_title, reg_date_measure, reg_draft_wto_date, reg_adopted_wto_date, INFO_USER, INFO_OFFICE, INFO_ACCESSLEVEL) 
                  VALUES ('$spsid', '$notifcode','$tagcode','$doccode','$docno','$docyear','$title','$dateMeasure', '$draftdate', '$adopted_date','$userid', '$office', '$accesslvl')");

     $countryArr = $_POST['country'];
    if(!empty($countryArr)){
        for($i = 0; $i < count($countryArr); $i++){
            if(!empty($countryArr[$i])){
                $country    = $countryArr[$i];
                $dbConn->query('INSERT INTO tbl_reg_country_code (SPSID, reg_country_code) VALUES ("' . $spsid . '", "' . $country . '")');
            }
        }
    }


        $uploadsDir = "uploads/";
        $allowedFileType = array('jpg','png','jpeg','pdf');
        
        // Velidate if files exist
            $total = count($_FILES['upload']['name']);

// Loop through each file
            
            for( $i=0 ; $i < $total ; $i++ ) {
            // Loop through file items

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
             
                    $insert = $dbConn->query('INSERT INTO tbl_regular_upload (SPSID, reg_notif_doc_link) VALUES ("' . $spsid . '", "' . $sqlVal . '")');
                    if($insert) {
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
       
           

            }

        

  echo '<script language="javascript">alert("Regular Measures saved successfully!")</script>';
    echo "<script>window.location.href='vw_regularwto.php?SPSID=$spsid&tp=1';</script>";
}


$query_country = $dbConn->query("SELECT * FROM country_tab");
while($rowresultCountry = $query_country->fetch_assoc()) { 
           $ref_country_info[] = $rowresultCountry['country_name'];
        } 

?>
<!-- END REGULAR TAB -->
<!-- EMERGENCY TAB -->
<?php 

   if(isset($_POST['saveemergency'])){

   $emtag = $_POST['emtagcode'];
   $emtype =$_POST['emdoctype'];
   $emdocno =$_POST['emdocno'];
   $emdocyear = $_POST['emdocyear'];
   $emtitle =$_POST['emtitle'];
   $emdate =$_POST['emdate'];

   $emspsidquery= $dbConn->query('SELECT * FROM emergency_notif_tab order by ID DESC LIMIT 1');
   $emrow_spsid = mysqli_fetch_array($emspsidquery);
   $emmonthsps = date('m');
   $emmonth = date('m');
   $emday =date('d');
   $emyear = date('Y');

   $emgetsps = $emrow_spsid['ID'] + 2;
   $emspsid = '10'. $emmonth. $emday. $emyear. $emgetsps;
   $emnotifcode = 'G/PSPS/N/PHL/'.rand(1,1000);


     $dbConn->query("INSERT INTO emergency_notif_tab (SPSID, notif_code, em_tag_code, em_doc_type, em_doc_no, em_doc_year, em_measure_title, em_date_measure, INFO_USER) 
          VALUES ('$emspsid', '$emnotifcode','$emtag', '$emtype','$emdocno','$emdocyear','$emtitle','$emdate','$userid')");

     $emcountryArr = $_POST['country'];
    if(!empty($emcountryArr)){
        for($i = 0; $i < count($emcountryArr); $i++){
            if(!empty($emcountryArr[$i])){
                $emcountry    = $emcountryArr[$i];
                $dbConn->query('INSERT INTO tbl_em_country_code (SPSID, em_country_name) VALUES ("' . $emspsid . '", "' . $emcountry . '")');
            }
        }
    }

       $uploadsDirem = "uploadsemergency/";
        $allowedFileTypeem = array('jpg','png','jpeg','pdf');
        
        // Velidate if files exist
            $totalem = count($_FILES['fileUpload']['name']);

// Loop through each file
            
            for( $j=0 ; $j < $totalem ; $j++ ) {
            // Loop through file items

                // Get files upload path
                $fileNameem        = $_FILES['fileUpload']['name'][$j];
                $tempLocationem    = $_FILES['fileUpload']['tmp_name'][$j];
                $targetFilePathem  = $uploadsDirem . $fileNameem;
                $fileTypeem        = strtolower(pathinfo($targetFilePathem, PATHINFO_EXTENSION));
                $uploadDateem      = date('Y-m-d H:i:s');
                $uploadOkem = 1;
                

                if(in_array($fileTypeem, $allowedFileTypeem)){
                        if(move_uploaded_file($tempLocationem, $targetFilePathem)){
                            $sqlValem = $fileNameem;
                        } else {
                            $responseem = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $responseem = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
             
                    $insertem = $dbConn->query('INSERT INTO tbl_em_upload (SPSID, reg_notif_doc_link) VALUES ("' . $emspsid . '", "' . $sqlValem . '")');
                    if($insertem) {
                        $responseem = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                    } else {
                        $responseem = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
       
           

            }

  echo '<script language="javascript">alert("Emergency Measures saved successfully!")</script>';
    echo "<script>window.location.href='vw_regularwto.php?SPSID=$emspsid&tp=2';</script>";
}


$emquery_country = $dbConn->query("SELECT * FROM country_tab");
while($emrowresultCountry = $emquery_country->fetch_assoc()) { 
           $emref_country_info[] = $emrowresultCountry['country_name'];
        } 

?>
<!-- END EMERGECNY TAB -->

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
          <a class="nav-link active" id="fileLeave-tab" data-toggle="tab" href="#fileLeave" role="tab" aria-controls="fileLeave" aria-selected="true">Regular Measures</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Emergency Measures</a>
        </li>
  </ul>

<div class="tab-content">
<div class="tab-pane fade show active bg-white p-3 border border-top-0" id="fileLeave" role="tabpanel" aria-labelledby="fileLeave-tab">
    <form method="post" enctype='multipart/form-data'>
      <div class="form-row">
            <!-- div class="col-lg-3 bg-label p-2">
               <label> Notification Code *</label>
            </div>

            <div class="col-lg-8 p-2">
                <input type="text" class="form-control text-xs" name="notif_code" placeholder="G/SPS/N/PHL" onkeyup="this.value = this.value.toUpperCase();" required>
            </div>
 -->
            <div class="col-lg-3 bg-label">
               <label> Tag/s <font color="#FF0000">*</font> </label>
            </div>
            <div class="col-lg-9 p-2">
              <?php $getTag = $dbConn->query("SELECT * FROM ref_tags");?>
                  <select name="tag_code" placeholder="Tag/s" class="form-control text-xs" required>
                      <option value="">SELECT TAG</option>
                      <?php while($rowTag = mysqli_fetch_assoc($getTag)) { ?>
                      <option value="<?php echo $rowTag['tag_code']; ?>">
                      <?php echo $rowTag['tag_desc']; ?>
                      </option>
                      <?php } ?>
                  </select>
            </div> 


            <div class="col-lg-3 bg-label">
                <label>Document Type </label>
            </div>
            <div class="col-lg-9 p-2">
              <?php
               $getDoc = $dbConn->query("SELECT * FROM ref_doc ");?>
                  <select name="doc_type" placeholder="Document Type" class="form-control text-xs" required>
                      <option value="">SELECT DOCUMENT TYPE</option>
                      <?php while($rowDoc = mysqli_fetch_assoc($getDoc)) { ?>
                      <option value="<?php echo $rowDoc['doc_code']; ?>">
                      <?php echo $rowDoc['doc_desc']; ?>
                      </option>
                      <?php } ?>
                  </select>
            </div>

            <div class="col-lg-3 bg-label">
               <label>Document No./Year</label>
            </div>
        <div class="col-lg-3 p-2">
          <input type="text" class="form-control text-xs" name="doc_no" required>
            </div>   

            <div class="col-lg-3 bg-label">
               <label> Series of</label>
            </div>
        <div class="col-lg-3 p-2">
          <select name="doc_year" class="form-control">
               <option value="" selected disabled>SELECT YEAR</option>
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

            <div class="col-lg-3 bg-label">
              <label>Title of the Measure <font color="#FF0000">*</font> </label>
            </div>
            <div class="col-lg-9">
               <textarea type="text" class="form-control text-xs" name="txtTitle" rows="3" placeholder="TITLE OF THE MEASURE" onkeyup="this.value = this.value.toUpperCase();"></textarea>
            </div> 
         <div class="col-lg-3 bg-label">
                 <label>Country/ies</label>
            </div>
            <div class="col-lg-9 p-2">
                    <div id="file_div">
          <select name="country[]" class="form-control col-sm-9 float-left" required>
                        <option value="" selected disabled>SELECT COUNTRY</option>
                        <?php foreach($ref_country_info as $country_info) { ?>
                        <option value="<?php echo $country_info; ?>"><?php echo $country_info;?></option>
                        <?php } ?>                              
                    </select> 
              <button style="" type="button" class="btn btn-outline-primary col-sm-2 float-left ml-3" onclick="add_file();">ADD</button>
        </div>
              </div> 

              <div class="col-lg-3 bg-label">
                <label>Date of the Measure <font color="#FF0000">*</font></label>
              </div>
              <div class="col-lg-3 p-2">
                <input type="date" name="txtDateMeasure" placeholder="Date of the Measure" class="form-control form-control-sm">
              </div>
          </div>
             <div class="form-row">
           <div class="col-lg-3 bg-label">
                <label>Draft Version Date of Notification to WTO</label>
              </div>
              <div class="col-lg-3 p-2">
                <input type="date" name="draft_date" placeholder="" class="form-control form-control-sm">
              </div>
        </div>

        <div class="form-row">
           <div class="col-lg-3 p-2 bg-label">
                <label>Adopted Version Date of Notification to WTO <font color="#FF0000">*</font></label>
              </div>
              <div class="col-lg-3 p-2">
                <input type="date" name="adopted_date" placeholder="" class="form-control form-control-sm">
              </div>
        </div>

        <div class="form-row">
              <div class="col-lg-3 bg-label">
                    <label for="chooseFile">Select file</label> 
                </div>
           <div class="col-lg-9">
                  <input type="file" name="upload[]" id="chooseFile" multiple>
                </div>
        </div>

         <button name="submitrm" type="submit" onclick="return confirm('Are you sure you want to submit?')" class="btn btn-sm btn-primary float-right mb-2">
       <i class="fas fa-save fa-xs"></i> SAVE </button>    
    </form>
  </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------- -->


<div class="tab-pane fade bg-white p-3 border border-top-0" id="home" role="tabpanel" aria-labelledby="home-tab">
  <form method="post" enctype='multipart/form-data'>
        <div class="form-row">
        <!--     <div class="col-lg-3 bg-label p-2">
               <label> Notification Code *</label>
            </div>

            <div class="col-lg-8 p-2">
                <input type="text" class="form-control text-xs" name="notif_code" placeholder="G/SPS/N/PHL" onkeyup="this.value = this.value.toUpperCase();" required>
            </div>
       -->
            <div class="col-lg-3 bg-label">
               <label> Tag/s * </label>
            </div>
            <div class="col-lg-9 p-2">
              <?php $getTag = $dbConn->query("SELECT * FROM ref_tags");?>
                <select name="emtagcode" placeholder="Tag/s" class="form-control text-xs" required>
                    <option value="">SELECT TAG</option>
                    <?php while($rowTag = mysqli_fetch_assoc($getTag)) { ?>
                    <option value="<?php echo $rowTag['tag_code']; ?>">
                    <?php echo $rowTag['tag_desc']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div> 

            <div class="col-lg-3 bg-label">
                <label>Document Type </label>
            </div>
            <div class="col-lg-9 p-2">
              <?php
               $getDoc = $dbConn->query("SELECT * FROM ref_doc ");?>
                <select name="emdoctype" placeholder="Document Type" class="form-control text-xs" required>
                    <option value="">SELECT DOCUMENT TYPE</option>
                    <?php while($rowDoc = mysqli_fetch_assoc($getDoc)) { ?>
                    <option value="<?php echo $rowDoc['doc_code']; ?>">
                    <?php echo $rowDoc['doc_desc']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-lg-3 bg-label">
               <label>Document No./Year</label>
            </div>
          <div class="col-lg-3 p-2">
            <input type="text" class="form-control text-xs" name="emdocno">
            </div>   

            <div class="col-lg-3 bg-label">
               <label> Series of</label>
            </div>
          <div class="col-lg-3 p-2">
            <select name="emdocyear" class="form-control">
                 <option value="" selected disabled>SELECT YEAR</option>
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

            <div class="col-lg-3 bg-label">
              <label>Title of the Measure * </label>
            </div>
            <div class="col-lg-9">
               <textarea type="text" class="form-control text-xs" name="emtitle" rows="3" placeholder="TITLE OF THE MEASURE" onkeyup="this.value = this.value.toUpperCase();"></textarea>
            </div>  

            <div class="col-lg-3 bg-label">
                   <label>Country/ies</label>
              </div>
              <div class="col-lg-9 p-2">
                    <div id="file_divem">
            <select name="country[]" class="form-control col-sm-9 float-left" required>
                       <option value="" selected disabled>SELECT COUNTRY</option>
                       <?php foreach($emref_country_info as $emcountry_info) { ?>
                       <option value="<?php echo $emcountry_info; ?>"><?php echo $emcountry_info;?></option>
                       <?php } ?>                              
                    </select> 
                   
                    <button style="" type="button" class="btn btn-outline-primary col-lg-2 float-left ml-3" onclick="add_fileEM();">
                       ADD
                    </button>
                </div>
            </div>

            <div class="col-lg-3 bg-label">
              <label>Date of the Measure *</label>
            </div>
            <div class="col-lg-3 p-2">
              <input type="date" name="emdate" placeholder="Date of the Measure" class="form-control form-control-sm">
            </div>
        </div>
        <div class="form-row">
              <div class="col-lg-3 bg-label">
                    <label for="chooseFile">Select file</label> 
                </div>
           <div class="col-lg-9">
                  <input type="file" name="fileUpload[]" id="chooseFile" multiple>
                </div>
        </div>
        <button name="saveemergency" class="btn btn-sm btn-primary float-right">
        <i class="fas fa-save fa-xs"></i> SAVE </button>
        </form>
</div>
</div>  
<?php include('footer.html'); ?>
</body>


<script type="text/javascript">
function add_file()
{
               $('#file_div').append("<div><select class='form-control col-sm-9 float-left mt-2' style='float:left;' name='country[]' required><option value='' selected disabled>SELECT COUNTRY</option><?php foreach($ref_country_info as $country_info) { ?><option value='<?php echo $country_info; ?>'><?php echo $country_info; ?></option><?php } ?></select><input type='button' class='btn btn-outline-danger mt-2 col-sm-2 float-left ml-3' value='REMOVE' onclick=remove_file(this);></div>");
}

function remove_file(ele)
{
$(ele).parent().remove();
}

function add_fileEM()
{
               $('#file_divem').append("<div><select class='form-control col-sm-9 float-left mt-2' style='float:left;' name='country[]' required><option value='' selected disabled>SELECT COUNTRY</option><?php foreach($emref_country_info as $emcountry_info) { ?><option value='<?php echo $emcountry_info; ?>'><?php echo $emcountry_info; ?></option><?php } ?></select><input type='button' class='btn btn-outline-danger col-sm-2 float-left ml-3 mt-2' value='REMOVE' onclick=remove_fileEM(this);></div>");
}

function remove_fileEM(ele)
{
$(ele).parent().remove();
}

  $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

      $('#chooseFile').on('change', function() {
        multiImgPreview(this, 'div.imgGallery');
      });
    });   
  
</script>