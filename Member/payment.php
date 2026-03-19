<?php
include_once("header.php");

$rtid = intval($_GET["rtid"]);
$uid  = intval($_SESSION["uid"]);
$dos  = date("Y-m-d");

if (isset($_POST["btnsubmit"])) {
    $conn = mysqli_connect("localhost","root","","project");
    $stmt = $conn->prepare("INSERT INTO mrecharge (uid, rtid, dos) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $uid, $rtid, $dos);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: myrecharge.php");
    exit;
}
?>
<div class="page-header"><h1>Confirm Membership Purchase</h1></div>
<form method="post">
  <div class="col-md-offset-3 col-md-9">
    <input class="btn btn-info" name="btnsubmit" type="submit" value="Confirm Payment">
  </div>
</form>
<?php include_once("footer.php"); ?>
