<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Product Detail</h2>

<div class="row">
       
<?php

$id = intval($_GET["id"]);
$pimage="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnans"]))
{
$qty = $conn->real_escape_string(trim($_POST["txtqty"]));
$pimage = $conn->real_escape_string(trim($_POST["pimage"]));

$qry="update tempcart set qty='$qty'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='temp.php';</script>";
}

$qr1="select * from tempcart,product where tid='$id'";
//echo $qry;
$result1=$conn->query($qr1);
$row1=$result1->fetch_assoc();
$p1=$row1["pimage"];
$pimage="<img width='150' height='150' src='../images/$p1' height='100px' width='100px'>";
$qty=$row1["qty"];

?>

<form action="" method="post">
<?php echo $pimage;?>
<input type="text" name="txtqty" id="txtqty" value="<?php echo htmlspecialchars($qty); ?>">
<br>
<br>
<input type="submit" name="btnans" value="Add To Cart">
</form>

    
<?php
include_once("footer.php");
?>