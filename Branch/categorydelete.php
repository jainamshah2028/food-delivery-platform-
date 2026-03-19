<?php
include_once("header.php");
?>

<?php

$catid = intval($_GET["catid"]);
$catname="";
$catimage="";

$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$catname = $conn->real_escape_string(trim($_POST["catname"]));
$catimage = $conn->real_escape_string(trim($_POST["catimage"]));

$qry="delete from category where catname='$catname'";

$result=$conn->query($qry);

echo "<script>location.href='categorydisplay.php';</script>";
}

$qry="select * from category where catid='$catid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
{
$catname=$row["catname"];
$catimage=$row["catimage"];

}
?>

<h2 class="header smaller lighter blue">Remove</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="catname" value="<?php echo htmlspecialchars($catname); ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category Image </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="catimage" value="<?php echo htmlspecialchars($catimage); ?>" class="col-xs-5 col-sm-5">
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