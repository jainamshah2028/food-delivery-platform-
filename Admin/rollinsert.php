<?php
include_once("header.php");
?>

<?php


$rollname="";

if(isset($_POST["btnsubmit"]))
{
$rollname = $conn->real_escape_string(trim($_POST["rollname"]));

$conn=mysqli_connect("localhost","root","","project");

$qry="insert into roll (rollname) values ('$rollname')";

$result=$conn->query($qry);
echo "<script>location.href='rolldisplay.php';</script>";
}

?>

<h2 class="header smaller lighter blue">Insert Your Roll</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Roll Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="rollname" class="col-xs-5 col-sm-5" required>
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