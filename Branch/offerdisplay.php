<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Offer</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from offer";


$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th style='font-size:24px;'>Offer Name</th><th>Offer Image</th><th>Visibility</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    $ofid=$row["ofid"];
    $ofname=$row["ofname"];
    $ofimage=$row["ofimage"];
    $isdisplay=$row["isdisplay"];
    $edit="<a href='offerupdate.php?ofid=$ofid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='offerdelete.php?ofid=$ofid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$ofname</td><td>$ofimage</td><td>$isdisplay</td><td>$edit</td><td>$delete</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>