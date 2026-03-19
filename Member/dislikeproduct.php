<?php
include_once("header.php");

$uid     = intval($_SESSION["uid"]);
$pid     = intval($_GET["id"]);
$dislike = 1; // fixed value

$conn = mysqli_connect("localhost","root","","project");

$stmt = $conn->prepare("INSERT INTO rating (dislike, pid, uid) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $dislike, $pid, $uid);
$stmt->execute();
$stmt->close();

$stmt2 = $conn->prepare("UPDATE product SET dislikecount=dislikecount+1 WHERE pid=?");
$stmt2->bind_param("i", $pid);
$stmt2->execute();
$stmt2->close();
$conn->close();

header("Location: productdetail.php?id=$pid");
exit;
?>
<?php include_once("footer.php"); ?>
