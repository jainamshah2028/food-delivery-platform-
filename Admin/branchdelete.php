<?php
include_once("header.php");
?>

<?php

$bid = intval($_GET["bid"]);
$bad="";
$contactno="";
$areaid="";
$bimage="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$bad = $conn->real_escape_string(trim($_POST["bad"]));
$contactno = intval($_POST["contactno"]);
$bimage = $conn->real_escape_string(trim($_POST["bimage"]));
$areaid = $conn->real_escape_string(trim($_POST["areaid"]));

$qry="delete from branch where bad='$bad'";

$result=$conn->query($qry);

echo "<script>location.href='branchdisplay.php';</script>";
}

$qry="select * from branch where bid='$bid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
{
    $bad=$row["bad"];
    $contactno=$row["contactno"];
    $bimage=$row["bimage"];
    $areaid=$row["areaid"];
}
?>


<h2 class="header smaller lighter blue">Branch</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Branch Address </label>

    <div class="col-sm-9">
        <input type="text" id="form-field-1" name="bad" value="<?php echo htmlspecialchars($bad); ?>" class="col-xs-5 col-sm-5">
</div>

<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact Number </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="contactno" value="<?php echo htmlspecialchars($contactno); ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Area Id </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="areaid" value="<?php echo htmlspecialchars($areaid); ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Branch Image </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="bimage" value="<?php echo htmlspecialchars($bimage); ?>" class="col-xs-5 col-sm-5">
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