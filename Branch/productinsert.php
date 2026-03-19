<?php
include_once("header.php");
?>

<?php


$pname="";
$pprice="";
$pimage="";
$catid="";
$pdesc="";

if(isset($_POST["btnsubmit"]))
{

    $pimage=$_FILES['file']['name'];
    $target_path = "../images/";  
    $target_path = $target_path.basename( $_FILES['file']['name']);   
    move_uploaded_file($_FILES['file']['tmp_name'], $target_path);  

$pname = $conn->real_escape_string(trim($_POST["pname"]));
$pprice = intval($_POST["pprice"]);
//$pimage = $conn->real_escape_string(trim($_POST["pimage"]));
$catid = $conn->real_escape_string(trim($_POST["catid"]));
$pdesc = $conn->real_escape_string(trim($_POST["pdesc"]));

$conn=mysqli_connect("localhost","root","","project");

$qry="insert into product (pname,pprice,pimage,catid,pdesc) values ('$pname','$pprice','$pimage','$catid','$pdesc')";

$result=$conn->query($qry);
echo "<script>location.href='productdisplay.php';</script>";
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

<h2 class="header smaller lighter blue">Product</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1"class="col-xs-5 col-sm-5" name="pname" oninput="allow_alphabets(this)"  required>
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Price </label>

    <div class="col-sm-3">
        <input type="number" id="form-field-1"  class="col-xs-5 col-sm-5" name="pprice"pattern="[0-9]{10}" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" required>
            </div>
        </div>>
</div>
<br>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Image </label>

    <div class="col-sm-3">
        <input type="file" id="file" name="pimage" accept=".png, .jpg, .jpeg" onchange="validateFileType()" class="col-xs-5 col-sm-5" required>
</div>

    <br>
    <br>
    <br>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category ID </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="catid" $pattern = '/^(0|[1-9]\d*)(\.\d{2})?$/' class="col-xs-5 col-sm-5" required>
</div>

    <br>
    <br>
    <br>
    
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Description </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="pdesc" class="col-xs-5 col-sm-5" >
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