<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Product Detail</h2>

<div class="row">
       
<?php

$conn=mysqli_connect("localhost","root","","project");

$id = intval($_GET["id"]);

$qry="Select * from product where pid='$id'";


$str="";
$result=$conn->query($qry);
$row=$result->fetch_assoc();

    $id=$row["pid"];
    $pname=$row["pname"];
    $pprice=$row["pprice"];
    $p=$row["pimage"];

    $pimage="<img width='150' height='150' src='../images/$p' height='100px' width='100px'>";

    $str.="<tr><td>$pname</td><td>$pprice</td><td>$pimage</td></tr>";
    


$str.="</table>";
echo $str;

$qty="";
$tp = "";


if(isset($_POST["btnans"]))
{
    $qty = $conn->real_escape_string(trim($_POST["txtqty"]));

    $qp = $pprice * $qty;
    $str="insert into tempcart (pid,proname,price,qty,priceqty) values ('$id','$pname','$pprice','$qty','$qp')";
    
    $result=$conn->query($str);
    echo "<script>location.href='offtemp.php';</script>";
}

?>

<form action="" method="post">
<input type="text" name="txtqty" id="txtqty">
<br>
<br>
<input type="submit" name="btnans" value="Add To Cart">
</form>

    
<?php
include_once("footer.php");
?>