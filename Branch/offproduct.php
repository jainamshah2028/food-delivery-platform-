<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Product</h2>

<div class="row">
       
<?php

$conn=mysqli_connect("localhost","root","","project");

$id = intval($_GET["id"]);

$qry="Select * from product where catid='$id'";


$str="";
$result=$conn->query($qry);
//$str="<table  class='table table-striped'><tr><th style='font-size:24px;'>Product Name</th><th style='font-size:24px;'>Product Price</th><th style='font-size:24px;'>Product Image</th></tr>";
while($row=$result->fetch_assoc())
{
    $pid=$row["pid"];
    $pname=$row["pname"];
    $pprice=$row["pprice"];
    $p=$row["pimage"];

    $pimage="<img width='150' height='150' src='../images/$p' height='100px' width='100px'>";

    //$str.="<tr><td>$pname</td><td>$pprice</td><td>$pimage</td></tr>";
    $str.="<div class='col-xs-6 col-sm-4 col-md-3'>";
    $str.="<span class='search-title'><a href='offproductdetail.php?id=$pid'>$pname</a></span>";
    $str.="<br>";
    
    $str.="<img src='../images/$p' height='100' width='100' class='media-object'>";
    $str.="<br>";
    $str.="$pprice";
    //$str="<b>@offerprice</b>"
    $str.="</div>";

}

$str.="</table>";
echo $str;



?>
</div>

      

<?php
include_once("footer.php");
?>