<?php
include_once("header.php");
?>

<h2 class="header smaller lighter blue">Feedback</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User ID </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="uid" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="fname" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Feedback </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="dof" class="col-xs-5 col-sm-5">
</div>

    <br>
    <br>
    <br>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-Mail </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="mail" class="col-xs-5 col-sm-5">
</div>

    <br>
    <br>
    <br>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact Number </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="contactno" class="col-xs-5 col-sm-5">
</div>

    <br>
    <br>
    <br>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Message </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="msg" class="col-xs-5 col-sm-5">
</div>

    <br>
    <br>
    <br>
    <div class="col-md-offset-3 col-md-9">
        <input class="btn btn-info" name="btnsubmit" type="submit" Value="Submit">
    </div>
</div>
</form>


<?php
include_once("footer.php"); 
?>