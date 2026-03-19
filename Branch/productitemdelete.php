<?php
include_once("header.php");
?>

<?php

$piid = intval($_GET["piid"]);
$pid="";
$iid="";
$qty="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$pid = $conn->real_escape_string(trim($_POST["pid"]));
$iid = $conn->real_escape_string(trim($_POST["iid"]));
$qty = intval($_POST["qty"]);

$qry="delete from productitem where piid='$piid'";

$result=$conn->query($qry);

echo "<script>location.href='productitemdisplay.php';</script>";
}

$qry="select * from productitem where piid='$piid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
{
    $pid=$row["pid"];
    $iid=$row["iid"];
    $qty=$row["qty"];
}
?>

<h2 class="header smaller lighter blue">Delete</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product ID </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="pid" value="<?php echo htmlspecialchars($pid); ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Item ID </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="iid" value="<?php echo htmlspecialchars($iid); ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quantity </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="qty" value="<?php echo htmlspecialchars($qty); ?>" class="col-xs-5 col-sm-5">
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