<?php
include_once("header.php");

$uid  = intval($_SESSION["uid"]);
$pid  = intval($_GET["id"]);
$likec = 1; // fixed value

$conn = mysqli_connect("localhost","root","","project");

$stmt = $conn->prepare("INSERT INTO rating (likes, pid, uid) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $likec, $pid, $uid);
$stmt->execute();
$stmt->close();

$stmt2 = $conn->prepare("UPDATE product SET likecount=likecount+1 WHERE pid=?");
$stmt2->bind_param("i", $pid);
$stmt2->execute();
$stmt2->close();
$conn->close();

header("Location: productdetail.php?id=$pid");
exit;
?>
<?php include_once("footer.php"); ?>
