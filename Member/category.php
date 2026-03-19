<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Category</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from category";


$result=$conn->query($qry);
$str="<table>";
$str="<ul class='ace-thumbnails clearfix'>";
    
while($row=$result->fetch_assoc())
{
    $catid=$row["catid"];
    $catname=$row["catname"];
    $c1=$row["catimage"];
    $catimage="<img width='150' height='150' src='../images/$c1' height='100px' width='100px'>";

    $str.="<li>
            <a href='product.php?id=$catid' data-rel='colorbox' class='cboxElement'>$catimage</a></li>";
}

$str.="</ul>";
echo $str;



?>

<?php
include_once("footer.php");
?>