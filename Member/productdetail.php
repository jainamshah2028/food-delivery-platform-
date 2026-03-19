<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Product Detail</h2>
<div class="row">
<?php
$conn = mysqli_connect("localhost","root","","project");
$id   = intval($_GET["id"]);

$stmt = $conn->prepare("SELECT * FROM product WHERE pid=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row    = $result->fetch_assoc();
$stmt->close();

$pid    = intval($row["pid"]);
$pname  = htmlspecialchars($row["pname"]);
$pprice = floatval($row["pprice"]);
$p      = htmlspecialchars($row["pimage"]);

$likes   = "<a href='likeproduct.php?id=$pid'><button class='btn btn-xs btn-success'><img src='https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_thumb_up_48px-256.png' height='20px' width='20px'></button></a>";
$dislike = "<a href='dislikeproduct.php?id=$pid'><button class='btn btn-xs btn-danger'><img src='https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_thumb_down_48px-256.png' height='20px' width='20px'></button></a>";

echo "<tr><td>$pname</td><td>$pprice</td><td><img src='../images/$p' width='150' height='150'></td><td>$likes</td><td>$dislike</td></tr>";

if (isset($_POST["btnans"])) {
    $qty = intval($_POST["txtqty"]);
    if ($qty > 0) {
        $qp = $pprice * $qty;
        $ins = $conn->prepare("INSERT INTO tempcart (pid, proname, price, qty, priceqty) VALUES (?, ?, ?, ?, ?)");
        $ins->bind_param("isdid", $pid, $row["pname"], $pprice, $qty, $qp);
        $ins->execute();
        $ins->close();
        header("Location: temp.php");
        exit;
    }
}

// Like / dislike counts
$ls = $conn->prepare("SELECT COUNT(likes) as cnt FROM rating WHERE pid=? AND likes=1");
$ls->bind_param("i", $pid);
$ls->execute();
$lrow = $ls->get_result()->fetch_assoc();
$ls->close();
echo "<br>Likes: " . intval($lrow["cnt"]);

$ds = $conn->prepare("SELECT COUNT(dislike) as cnt FROM rating WHERE pid=? AND dislike=1");
$ds->bind_param("i", $pid);
$ds->execute();
$drow = $ds->get_result()->fetch_assoc();
$ds->close();
echo "<br>Dislikes: " . intval($drow["cnt"]);
$conn->close();
?>
</div>
<form action="" method="post">
    <input type="number" name="txtqty" id="txtqty" min="1" value="1">
    <br><br>
    <input type="submit" name="btnans" value="Add To Cart">
</form>
<?php include_once("footer.php"); ?>
