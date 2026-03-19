<?php
include_once("header.php");
?>

<?php

$pid = intval($_GET["pid"]);
$pname="";
$pprice="";
$pimage="";
$catid="";
$pdesc="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
    $pname = $conn->real_escape_string(trim($_POST["pname"]));
    $pprice = intval($_POST["pprice"]);
    $pimage = $conn->real_escape_string(trim($_POST["pimage"]));
    $catid = $conn->real_escape_string(trim($_POST["catid"]));
    $pdesc = $conn->real_escape_string(trim($_POST["pdesc"]));

$qry="delete from product where pid='$pid'";

$result=$conn->query($qry);

echo "<script>location.href='productdisplay.php';</script>";
}

$qry="select * from product where pid='$pid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
{
$pname=$row["pname"];
$pprice=$row["pprice"];
$p=$row["pimage"];
$pimage="<img scr='../images/$p' height='100px' width='100px' height='100px'>";
$catid=$row["catid"];
$pdesc=$row["pdesc"];
}
?>

<h2 class="header smaller lighter blue">Product</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="pname" value="<?php echo htmlspecialchars($pname); ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Price </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="price" value="<?php echo htmlspecialchars($pprice); ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Image </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="pimage" value="<?php echo htmlspecialchars($pimage); ?>" class="col-xs-5 col-sm-5">
</div>

    <br>
    <br>
    <br>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category ID </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="catid" value="<?php echo htmlspecialchars($catid); ?>" class="col-xs-5 col-sm-5">
</div>

    <br>
    <br>
    <br>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Description </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="pdesc" value="<?php echo htmlspecialchars($pdesc); ?>" class="col-xs-5 col-sm-12">
</div>

    <br>
    <br>
    <br>
    <div class="col-md-offset-3 col-md-9">
        <input class="btn btn-info" name="btnsubmit" type="submit" Value="Submit">
    </div>
</div>
</form>

<?php
include_once("footer.php");
?>