<?php
include_once("header.php");

$uid  = intval($_GET["id"]);
$conn = mysqli_connect("localhost","root","","project");

if (isset($_POST["btnsubmit"])) {
    $username = $conn->real_escape_string(trim($_POST["username"]));
    $fname    = $conn->real_escape_string(trim($_POST["fname"]));
    $lname    = $conn->real_escape_string(trim($_POST["lname"]));
    $contact  = $conn->real_escape_string(trim($_POST["contact"]));
    $mail     = $conn->real_escape_string(trim($_POST["mail"]));
    $address  = $conn->real_escape_string(trim($_POST["address"]));

    $stmt = $conn->prepare("UPDATE user SET username=?, fname=?, lname=?, contact=?, mail=?, address=? WHERE uid=?");
    $stmt->bind_param("ssssssi", $username, $fname, $lname, $contact, $mail, $address, $uid);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM user WHERE uid=?");
$stmt->bind_param("i", $uid);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
$stmt->close();

$fname    = $row["fname"]    ?? "";
$lname    = $row["lname"]    ?? "";
$contact  = $row["contact"]  ?? "";
$mail     = $row["mail"]     ?? "";
$address  = $row["address"]  ?? "";
$username = $row["username"] ?? "";
?>

<div class="page-header"><h1>Edit Profile</h1></div>
<div class="row"><div class="col-xs-12">
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="col-sm-3 control-label">Username</label>
      <div class="col-sm-9"><input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" class="col-xs-10 col-sm-5"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">First Name</label>
      <div class="col-sm-9"><input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>" class="col-xs-10 col-sm-5"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Last Name</label>
      <div class="col-sm-9"><input type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>" class="col-xs-10 col-sm-5"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Contact</label>
      <div class="col-sm-9"><input type="text" name="contact" value="<?php echo htmlspecialchars($contact); ?>" class="col-xs-10 col-sm-5"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Email</label>
      <div class="col-sm-9"><input type="text" name="mail" value="<?php echo htmlspecialchars($mail); ?>" class="col-xs-10 col-sm-5"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Address</label>
      <div class="col-sm-9"><input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" class="col-xs-10 col-sm-5"></div>
    </div>
    <div class="clearfix form-actions">
      <div class="col-md-offset-3 col-md-9">
        <input type="submit" class="btn btn-info" name="btnsubmit" value="Save Changes">
      </div>
    </div>
  </form>
</div></div>

<?php include_once("footer.php"); ?>
