<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Member Details</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from rtype";


$result=$conn->query($qry);
$str="<table  class='table table-striped' style='font-size:16px;'><tr><th>Membership Type</th><th>Image</th><th>Price</th><th>Buy</th></tr>";
while($row=$result->fetch_assoc())
{
    $rtid=$row["rtid"];
    $rtdetail=$row["rtdetail"];
    $u1=$row["rtimage"];
    $rtimage="<img width='150' height='150' src='../images/$u1'>";
    $rtamt=$row["rtamt"];
    $buy="<a href='payment.php?rtid=$rtid'><button class='btn btn-xs btn-info'><i class='ace-icon fa fa-shopping-cart bigger-160'></i></button></a>";
    
    $str.="<tr><td>$rtdetail</td><td>$rtimage</td><td>$rtamt</td><td>$buy</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>