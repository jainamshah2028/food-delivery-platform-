<?php
session_start();
$username = "";
$error = "";

if (isset($_POST["btnans"])) {
    $username = trim($_POST["username"]);
    $pass     = trim($_POST["pass"]);

    $conn = mysqli_connect("localhost", "root", "", "project");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // PREPARED STATEMENT — prevents SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password — use password_verify() if passwords are hashed
        // For now we compare plain text (as original) but flag it below
        if ($row["pass"] === $pass) {
            $roleid = $row["rollid"];
            $_SESSION["uname"] = $row["username"];
            $_SESSION["uid"]   = $row["uid"];
            $_SESSION["name"]  = $row["fname"] . " " . $row["lname"];
            $_SESSION["bid"]   = $row["bid"];

            if ($roleid == 1) {
                header("Location: Admin/index.php");
                exit;
            } elseif ($roleid == 2) {
                header("Location: Branch/index.php");
                exit;
            } elseif ($roleid == 3) {
                header("Location: Member/index.php");
                exit;
            }
        } else {
            $error = "Your username or password is wrong.";
        }
    } else {
        $error = "Your username or password is wrong.";
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css">
    <title>Anand Food Court</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
* { box-sizing: border-box; margin: 0; padding: 0; font-family: Raleway, sans-serif; }
.bgimg { min-height: 100vh; width: 100%; background-image: url("images/rrr.png"); background-position: center; background-size: cover; position: relative; }
.container { display: flex; align-items: center; justify-content: center; min-height: 100vh; }
.screen__content { background: linear-gradient(100deg, #141313, transparent); position: relative; height: 600px; width: 360px; box-shadow: 0px 0px 24px #ffffff; }
.login { width: 320px; padding: 30px; padding-top: 156px; }
.login__field { padding: 20px 0px; position: relative; }
.login__icon { position: absolute; font-size: 25px; top: 30px; color: #ffffff; }
.login__input { border: none; border-bottom: 2px solid #ffffff; background: none; color: #ffffff; font-size: 25px; padding: 10px; padding-left: 24px; font-weight: 1000; width: 75%; transition: .2s; }
.login__input:focus { outline: none; border-bottom-color: #ffffff; color: #ffffff; }
.login__submit { background: linear-gradient(90deg, #141313, transparent); font-size: 22px; margin-top: 30px; padding: 16px 20px; border-radius: 26px; border: 1px solid #ffffff; text-transform: uppercase; font-weight: 700; display: flex; align-items: center; width: 100%; color: #ffffff; box-shadow: 0px 2px 2px #ffffff; cursor: pointer; transition: .2s; }
.error-msg { color: #ff6b6b; font-size: 14px; padding: 8px 30px; }
.social-login { position: absolute; height: 140px; width: 160px; text-align: center; bottom: 0px; right: 0px; color: #ffffff; }
.social-icons { display: flex; align-items: center; justify-content: center; }
.social-login__icon { padding: 20px 10px; color: #ffffff; text-decoration: none; text-shadow: 0px 0px 8px #ffffff; }
.social-login__icon:hover { transform: scale(1.5); }
</style>
<body>
<div class="bgimg">
    <div class="container">
        <div class="screen__content">
            <?php if ($error): ?>
                <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <form class="login" method="post" action="">
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="text" class="login__input" name="username" placeholder="User name" required>
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" class="login__submit" name="btnans">Log In Now</button>
            </form>
            <div class="social-login">
                <h3>log in via</h3>
                <div class="social-icons">
                    <a href="#" class="social-login__icon fab fa-instagram"></a>
                    <a href="#" class="social-login__icon fab fa-facebook"></a>
                    <a href="#" class="social-login__icon fab fa-twitter"></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
