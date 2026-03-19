<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Bill</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from tempcart";
//$tid="";

$pid="";
$tprice=0;
$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Amount</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    $tid=$row["tid"];
    $pname=$row["proname"];
    $pprice=$row["price"];
    $qty=$row["qty"];
    $priceqty=$row["priceqty"];
    $edit="<a href='editproductdetails.php?id=$tid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='deleteproduct.php?id=$tid'><button class='btn btn-xs btn-danger'>
    <i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$pname</td><td>$pprice</td><td>$qty</td><td>$priceqty</td><td>$edit</td><td>$delete</td></tr>";

    $tprice+=$priceqty;
}

$str.="</table>";
echo $str;
echo "TOTAL AMOUNT IS $tprice";
echo "</br>";

$uid=$_SESSION["uid"];
$bill="";

//$conn=mysqli_connect("localhost","root","","project");

$dp="";
$dos="";
$qry="Select * from mrecharge,rtype where iscurrent='yes' and mrecharge.rtid=rtype.rtid";

$result=$conn->query($qry);

$str="<table  class='table table-striped'><tr><th>Current Recharge Date</th><th>Amount</th><tr>";
while($row=$result->fetch_assoc())
{
    $dos=$row["dos"];
    $rtamt=$row["rtamt"];

    $str.="<tr><td>$dos</td><td>$rtamt</td></tr>";
}

//$str.="</table>";
echo $str;


if($rtamt==10000)
{
    $dp=($tprice*10)/100;
    echo "Discount Amount : $dp";
    $bill=$tprice-$dp;
}
elseif($rtamt==20000)
{
    $dp=($tprice*20)/100;
    echo "Discount Amount : $dp";
    $bill=$tprice-$dp;
}
elseif($rtamt=30000)
{
    $dp=($tprice*30)/100;
    echo "Discount Amount : $dp";
    $bill=$tprice-$dp;
}
else
{
    echo "No Discount Amount";
}

echo "</br>";
echo "Amount to be Paid : $bill";

if(isset($_POST["btnans"]))
{
    //1 step
    $uid=$_SESSION["uid"];
    $doo= date("Y-m-d");
    $odr="insert into orders (uid,doo) values ('$uid','$doo')";
    //echo $odr;
    $result=$conn->query($odr);
  

    //echo "<br>1step complete";
    //2 step

    $max="select max(oid) as oid from orders";
    $result=$conn->query($max);
    $row=$result->fetch_assoc();

    $oid=$row["oid"];
    //echo "<br>2nstep complete $oid";

    session_start();

    $_SESSION["oid"] = $oid;
    
    //3 Step
    $tab="";
    $tqry="select * from tempcart";

    $result=$conn->query($tqry);
   
    while($row=$result->fetch_assoc())
    {
        $tid=$row["tid"];
        $pid=$row["pid"];
        $proname=$row["proname"];
        $price=$row["price"];
        $qty=$row["qty"];
        $priceqty=$row["priceqty"];

        $qryodinsert="insert into orderdetail (oid,pid,proname,price,qty,priceqty) value ('$oid','$pid','$proname','$price','$qty','$priceqty')";
   
        //echo "<br>$qryodinsert";

        $result1=$conn->query($qryodinsert); 

        
        $qry3="update product set sellcount=sellcount+$qty where pid='$pid'";
         $result3=$conn->query($qry3);
         

    }

    $tqry="delete from tempcart";

    $result=$conn->query($tqry);

    echo "<script>location.href='thankyou.php?oid=$oid';</script>";


}
?>


<h2 class="header smaller lighter blue">Your Membership</h2>

<?php


$oid="";
$priceqty="";
$qy="select sum(priceqty) as pq from orderdetail where oid in(select oid from orders where doo >='$dos' and uid='$uid')";

$result=$conn->query($qy);
$sr="<table  class='table table-striped'><tr><th>Balance Used</th><tr>";
while($row1=$result->fetch_assoc())
{
    $pq=$row1["pq"];

    $sr.="<tr><td>$pq</td></tr>";
}
$sr.="</table>";
echo $sr;

$ab="";

echo "Available Balance : ";
echo $ab=$rtamt-$pq;
echo "</br>";
echo "</br>";

if($tprice>$ab)
{
    echo "Order can't be placed due to INSUFFICIENT BALANCE";
    echo "</br>";
    echo "</br>";
}
else
{
    echo "Remaining Balance ";
    echo $bill=$ab-$tprice;
    echo "</br>";
    echo "</br>";
    echo "CLICK ON ORDER NOW TO CONFIRM YOU ORDER";
    echo "</br>";
    echo "</br>";
}


?>

<form action="" method="post">
    <input type="submit" name="btnans" value="Order Now">

</form>
<?php
include_once("footer.php");
?>