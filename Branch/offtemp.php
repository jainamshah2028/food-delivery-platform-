<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Bill</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from tempcart";

$pid="";
$tprice=0;
$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Amount</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    $pname=$row["proname"];
    $pprice=$row["price"];
    $qty=$row["qty"];
    $priceqty=$row["priceqty"];
    $edit="<a href='category.php?id=$pid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='category.php?id=$pid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$pname</td><td>$pprice</td><td>$qty</td><td>$priceqty</td><td>$edit</td><td>$delete</td></tr>";

    $tprice+=$priceqty;
}

$str.="</table>";
echo $str;
echo "TOTAL AMOUNT IS $tprice";


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
    }

    $tqry="delete from tempcart";

    $result=$conn->query($tqry);

    echo "<script>location.href='offthankyou.php?oid=$oid';</script>";

}

?>


<form action="" method="post">
<div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Search</label>

            <div class="col-sm-9">
                <input type="text" id="form-field-2" name="search" placeholder="Enter Number" class="col-xs-10 col-sm-5">
            </div>
        </div>
        <br>
        <br>
        <br><br>
        <div class="space-4"></div>

        <div class="col-md-offset-4 col-md-12">
            <input type="submit" class="btn btn-info" name="submit" value="Search By Number">

            &nbsp; &nbsp; &nbsp;
            
        </div>
        <?php

        $uid=$_SESSION["uid"];
        $cno="";

        if(isset($_POST["search"]))
        {
            $cno = $conn->real_escape_string(trim($_POST["search"])); 

            $conn = mysqli_connect("localhost","root","","project");
    
            $qry="SELECT * from user where contact like '$cno%'";

            $result = $conn->query($qry);
        
                if($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    {
                        echo $row["fname"]."  ".$row["contact"]."  ".$row["mail"]."<br>";
                        $qry1="Select * from mrecharge,rtype where iscurrent='yes' and mrecharge.rtid=rtype.rtid";
                        $result1=$conn->query($qry1);
                        $row1=$result1->fetch_assoc();
                        echo $row1["rtdetail"];
                    }
                }
                else 
                {
                    echo "0 records";
                }
            
            $conn->close();
        }
        ?>

    <br>
    <br>
    <br>
    <input type="submit" name="btnans" value="Order Now">

</form>
<?php
include_once("footer.php");
?>