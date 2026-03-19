<?php
include_once("header.php")
?>

<div class="page-header">
	<h1>
		My Orders
	</h1>
</div>

<?php 

$uid=$_SESSION["uid"];

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from orders where uid=$uid";

$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th>Order ID</th><th>Date of Order</th><th>Details</th><tr>";
while($row=$result->fetch_assoc())
{
    $oid=$row["oid"];
    $doo=$row["doo"];
    $view="<a href='myorderdetail.php?oid=$oid'>View";

    $str.="<tr><td>$oid</td><td>$doo</td><td>$view</td></tr>";
}

$str.="</table>";
echo $str;

?>

<?php
include_once("footer.php")
?>