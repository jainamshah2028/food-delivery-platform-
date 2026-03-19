<?php
include_once("header.php");
?>

<div class="page-header">
	<h1>
		My Recharges
	</h1>
</div>

<?php 

$uid=$_SESSION["uid"];

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from mrecharge,rtype where uid=$uid and mrecharge.rtid=rtype.rtid";


$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th>Membership ID</th><th>Detail</th><th> Price</th><th>Start Date</th><th>End Date</th><tr>";
while($row=$result->fetch_assoc())
{
    $rtid=$row["rtid"];
    $dos=$row["dos"];
    $dof=$row["dof"];
    $rtamt=$row["rtamt"];
    $rtdetail=$row["rtdetail"];

    $str.="<tr><td>$rtid</td><td>$rtdetail</td><td>$rtamt</td><td>$dos</td><td>$dof</td></tr>";
}

$str.="</table>";
echo $str;

?>

<?php
include_once("footer.php");
?>