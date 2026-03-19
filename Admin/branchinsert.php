<?php
include_once("header.php");
?>

<?php


$bimage="";
$bad="";
$areaid="";
$contactno="";

$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{

    $bimage=$_FILES['file']['name'];
    $target_path = "../images/";  
    $target_path = $target_path.basename( $_FILES['file']['name']);   
    move_uploaded_file($_FILES['file']['tmp_name'], $target_path);  

$bad = $conn->real_escape_string(trim($_POST["bad"]));
//$bimage = $conn->real_escape_string(trim($_POST["bimage"]));
$areaid = $conn->real_escape_string(trim($_POST["cmbarea"]));
$contactno = intval($_POST["contactno"]);

$qry="insert into branch (bad,contactno,areaid,bimage) values ('$bad','$contactno','$areaid','$bimage')";

$result=$conn->query($qry);
echo "<script>location.href='branchdisplay.php';</script>";
}





?>
<script type="text/javascript">
    function validateFileType(){
        var fileName = document.getElementById("fileName").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }  
    }
    function allow_alphabets(element){
        let textInput = element.value;
        textInput = textInput.replace(/[^A-Za-z ]*$/gm, "");
        element.value = textInput;
    }
</script>
 

<h2 class="header smaller lighter blue">Branch</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Branch Address </label>

    <div class="col-sm-9">
        <input type="text" id="form-field-1" name="bad" class="col-xs-5 col-sm-5" required>
</div>

<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact Number </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="contactno" pattern="[0-9]{10}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" class="col-xs-5 col-sm-5" rerquired>
</div>
<br>
<br>
<br>
<div class="form-group">

    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Area  </label>

    <div class="col-sm-3">
    <input type="text" id="form-field-1" name="area"oninput="allow_alphabets(this)"  class="col-xs-5 col-sm-5" required>
    </div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Branch Image </label>

    <div class="col-sm-3">
        <input type="file" id="file" name="bimage"  accept=".png, .jpg, .jpeg" onchange="validateFileType()"class="col-xs-5 col-sm-5" required>
</div>

    <br>
    <br>
    <br>
    <div class="col-md-offset-3 col-md-9">
        <input class="btn btn-info" name="btnsubmit" type="submit" Value="Submit" required>
    </div>
</div>
</form>

<?php
include_once("footer.php"); 
?>