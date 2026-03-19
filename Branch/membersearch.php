<?php
include_once("header.php");
?>
<form action="" method="post">
    <div class="form-group">
        <label class="col-sm-3 control-label">Search by Name</label>
        <div class="col-sm-9">
            <input type="text" name="search" placeholder="Enter Name" class="col-xs-10 col-sm-5">
        </div>
    </div>
    <br><br>
    <div class="col-md-offset-4 col-md-12">
        <input type="submit" class="btn btn-info" name="submit" value="Search">
    </div>
</form>

<?php
if (isset($_POST["submit"])) {
    $conn   = mysqli_connect("localhost","root","","project");
    $search = "%" . $conn->real_escape_string(trim($_POST["search"])) . "%";

    $stmt = $conn->prepare("SELECT fname, contact, mail FROM user WHERE fname LIKE ?");
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo htmlspecialchars($row["fname"]) . " &nbsp; ";
            echo htmlspecialchars($row["contact"]) . " &nbsp; ";
            echo htmlspecialchars($row["mail"]) . "<br>";
        }
    } else {
        echo "No records found.";
    }
    $stmt->close();
    $conn->close();
}
?>
<?php include_once("footer.php"); ?>
