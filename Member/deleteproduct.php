<?php
include_once("header.php");

$id = intval($_GET["id"]);  // Safe integer — prevents SQL injection
$conn = mysqli_connect("localhost","root","","project");

$stmt = $conn->prepare("DELETE FROM tempcart WHERE tid=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: temp.php");
exit;
?>
<?php include_once("footer.php"); ?>
