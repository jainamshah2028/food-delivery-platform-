<?php include_once("header.php"); ?>
<div class="section-hd">
  <div><div class="section-title">Products</div><div class="section-sub">Pick your favourite item</div></div>
  <a href="category.php" class="btn btn-ghost">← Back</a>
</div>
<div class="prod-grid">
<?php
$conn=mysqli_connect("localhost","root","","project");
$id=intval($_GET["id"]);
$stmt=$conn->prepare("SELECT * FROM product WHERE catid=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result=$stmt->get_result();
while($row=$result->fetch_assoc()){
  $pid=intval($row["pid"]);
  $pname=htmlspecialchars($row["pname"]);
  $pprice=htmlspecialchars($row["pprice"]);
  $pimg=htmlspecialchars($row["pimage"]);
  $pdesc=htmlspecialchars($row["pdesc"]??"");
  $imgTag=file_exists("../images/$pimg")
    ? "<img src='../images/$pimg' class='prod-img' alt='$pname'>"
    : "<div class='prod-placeholder'>🍽️</div>";
  echo "<a href='productdetail.php?id=$pid' class='prod-card'>
    $imgTag
    <div class='prod-body'>
      <div class='prod-name'>$pname</div>
      <div class='prod-desc'>$pdesc</div>
      <div class='prod-price'>₹$pprice</div>
    </div>
  </a>";
}
$stmt->close();$conn->close();
?>
</div>
<?php include_once("footer.php"); ?>
