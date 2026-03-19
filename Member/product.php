<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Product</h2>
<div class="row">
<?php
$conn = mysqli_connect("localhost","root","","project");
$id   = intval($_GET["id"]);  // intval prevents SQL injection

$stmt = $conn->prepare("SELECT * FROM product WHERE catid=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $pid    = intval($row["pid"]);
    $pname  = htmlspecialchars($row["pname"]);
    $pprice = htmlspecialchars($row["pprice"]);
    $p      = htmlspecialchars($row["pimage"]);

    echo "<div class='col-xs-6 col-sm-4 col-md-3'>";
    echo "<span class='search-title'><a href='productdetail.php?id=$pid'>$pname</a></span><br>";
    echo "<img src='../images/$p' height='100' width='100' class='media-object'><br>";
    echo "$pprice";
    echo "</div>";
}
$stmt->close();
$conn->close();
?>
</div>
<?php include_once("footer.php"); ?>
