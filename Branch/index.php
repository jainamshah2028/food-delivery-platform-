<?php
include_once("header.php");
?>

<h2 class="header smaller lighter blue">TCC ADMIN</h2>

<table class='table table-striped'>

<tr>
    <td class="td"><img src="https://cdn4.iconfinder.com/data/icons/materia-flat-finance-vol-3/24/012_152_add_product_crate_package_box_parcel_shipping_bundle_cargo-128.png" height='100px' width='100px'><a href="">New Order</a></td>
    <td ><img src="https://cdn3.iconfinder.com/data/icons/businessman-character-3/100/man_236_bearded_man_make_restaurant_dish_order_people-128.png" height='100px' width='100px'><a href="orders.php">Make Order</a></td>
    <td><img src="https://cdn0.iconfinder.com/data/icons/food-delivery-outline-stay-home/512/My_order-128.png" height='100px' width='100px'><a href="orders.php">My Order</a></td>
</tr>
<tr >
    <td><img src="https://cdn3.iconfinder.com/data/icons/digital-marketing-filled-outline-3/64/store-512.png" height='100px' width='100px'><a href="branchdisplay.php">Branch</a></td>
    <td><img src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/8_avatar-256.png" height='100px' width='100px'><a href="customer.php">Members</a></td>
    <td class='td'><img src='https://cdn0.iconfinder.com/data/icons/containers/256/self1.png' height='100px' width='100px'><a href='stock.php?id=$bid'>Stock</a></td>
</tr>
</table>

<?php
include_once("footer.php");
?>