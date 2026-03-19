<?php
include_once("header.php")
?>
 
<div class="page-header">
<h1>
   Customer Registration
</h1>
</div><!-- /.page-header -->
<style>
.form-group.required .control-label:after
{
  content:" *";
  color:red;
  font-weight:bold;
 
}
</style>
<?php
 
 
$bid=$_SESSION["bid"];
$username="";
$fname="";
$lname="";
$contact="";
$mail="";
$address="";
$uimage="";
$pass="";
 
if(isset($_POST["btnsubmit"]))
{
    $uimg=$_FILES['file']['name'];
    $target_path = "../images/";  
    $target_path = $target_path.basename( $_FILES['file']['name']);  
    move_uploaded_file($_FILES['file']['tmp_name'], $target_path);  
 
   
$username = $conn->real_escape_string(trim($_POST["username"]));
$fname = $conn->real_escape_string(trim($_POST["fname"]));
$lname = $conn->real_escape_string(trim($_POST["lname"]));    
$contact = intval($_POST["contact"]);
$mail = $conn->real_escape_string(trim($_POST["mail"]));
$address = $conn->real_escape_string(trim($_POST["address"]));
$pass = $conn->real_escape_string(trim($_POST["pass"]));
 
   
  $conn=mysqli_connect("localhost","root","","project");
  //$qry1="select * from user where username=$username";
 // $result1 = $conn->query($qry1);
  //$cnt = mysqli_num_rows($result1);
  //echo $cnt;
  $select = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$_POST['username']."'");
  //$result=$conn->query($select);
if(mysqli_num_rows($select)) {
    echo('This username already exists');
}
$qry="insert into user (username,fname,lname,contact,mail,address,pass,uimage) values ('$username','$fname','$lname','$contact','$mail','$address','$pass','$uimage')";
//echo $qry;
$result=$conn->query($qry);
 
//echo "<script>location.href='offorder.php';</script>";
 
 
 
 
 
}
 
 
 
?>
<script type="text/javascript">
    function validateFileType(){
        var fileName = document.getElementById("fileName").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }  
    }
    function allow_alphabets(element){
        let textInput = element.value;
        textInput = textInput.replace(/[^A-Za-z ]*$/gm, "");
        element.value = textInput;
    }
</script>
 
<div class="row">
<div class="col-xs-10">
  <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 
        <div class="form-group required ">
            <label class="col-sm-3 control-label no-padding-right text-Light control-label" for="form-field-1">User Image</label>
 
            <div class="col-sm-9">
                <input type="file" name="file" accept=".png, .jpg, .jpeg" onchange="validateFileType()" id="file" class="col-xs-10 col-sm-5">  
           
            </div>
        </div>
 
        <div class="space-4"></div>
 
        <div class="form-group required">
            <label class="col-sm-3 control-label no-padding-right text-Light control-label" for="form-field-2">Username</label>
 
            <div class="col-sm-9">
                <input type="text" id="form-field-2"class="col-xs-10 col-sm-5" name="username" placeholder="Username"oninput="allow_alphabets(this)"  minlength="5"cols="30" rows="5"  required>
            </div>
        </div>
 
        <div class="form-group required">
            <label class="col-sm-3 control-label no-padding-right text-Light control-label" for="form-field-2">Password</label>
 
            <div class="col-sm-9">
                <input type="password" id="form-field-2" name="pass"  placeholder="Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}" cols="30" rows="5" class="col-xs-10 col-sm-5" required="" title="Must contain at least one number,one uppercase,one lowercase,one special Character, and at least 8 or more characters"required>
            </div>
        </div>
 
        <div class="form-group required">
            <label class="col-sm-3 control-label no-padding-right text-Light control-label" for="form-field-2">First Name</label>
 
        <div class="col-sm-9">
            <input type="text" id="form-field-2" name="fname"pattern="^[a-zA-Z]+$" placeholder="First Name"oninput="allow_alphabets(this)" class="col-xs-10 col-sm-5" required>
        </div>
        </div>
 
        <div class="space-4"></div>
 
        <div class="form-group required">
            <label class="col-sm-3 control-label no-padding-right text-Light control-label" for="form-field-2"> Last Name </label>
 
            <div class="col-sm-9">
                <input type="text" id="form-field-2" name="lname" placeholder="Last name" pattern="^[a-zA-Z]+$"  class="col-xs-10 col-sm-5" oninput="allow_alphabets(this)"required>
            </div>
        </div>
 
        <div class="space-4"></div>
 
        <div class="form-group required">
            <label class="col-sm-3 control-label no-padding-right text-Light control-label" for="form-field-2">Contact Number </label>
 
            <div class="col-sm-9">
                <input type="text" id="form-field-2"  class="col-xs-10 col-sm-5" name="contact" placeholder="Contact" pattern="[0-9]{10}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" required>
            </div>
        </div>
        <div class="space-4"></div>
 
        <div class="form-group required">
            <label class="col-sm-3 control-label no-padding-right text-Light control-label" for="form-field-2">Mail</label>
 
            <div class="col-sm-9">
                <input type="email" id="form-field-2" name="mail" placeholder="E-Mail" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" class="col-xs-10 col-sm-5" required>
            </div>
        </div>
        <div class="space-4"></div>
 
        <div class="form-group required">
            <label class="col-sm-3 control-label no-padding-right text-Light control-label" for="form-field-2">Address</label>
 
            <div class="col-sm-9">
                <input type="text" id="form-field-2" name="address" placeholder="Address" cols="30" rows="5" class="col-xs-10 col-sm-5" required >
            </div>
        </div>
 
        <div class="space-4"></div>
        <div class="space-4"></div>
        <div class="space-4"></div>
        <div class="space-4"></div>
        <div class="space-4"></div>
        <div class="space-4"></div>
        <div class="space-4"></div>
        <div class="space-4"></div>
        <div class="space-4"></div>
        <div class="space-4"></div>
 
        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-4">
                <input type="submit" class="btn btn-info" name="btnsubmit" value="Submit">
 
                &nbsp; &nbsp; &nbsp;
               
            </div>
        </div>
 
       
</div><!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</form>  
</div>
</div>
 
<?php
include_once("footer.php")
?>

