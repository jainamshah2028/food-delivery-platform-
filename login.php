<?php
session_start();
$error = "";
if(isset($_POST["btnans"])){
    $username=trim($_POST["username"]);
    $pass=trim($_POST["pass"]);
    $conn=mysqli_connect("localhost","root","","project");
    $stmt=$conn->prepare("SELECT * FROM user WHERE username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        if($row["pass"]===$pass){
            $_SESSION["uname"]=$row["username"];
            $_SESSION["uid"]=$row["uid"];
            $_SESSION["name"]=$row["fname"]." ".$row["lname"];
            $_SESSION["bid"]=$row["bid"];
            $r=$row["rollid"];
            if($r==1){header("Location: Admin/index.php");exit;}
            if($r==2){header("Location: Branch/index.php");exit;}
            if($r==3){header("Location: Member/index.php");exit;}
        } else { $error="Invalid username or password."; }
    } else { $error="Invalid username or password."; }
    $stmt->close();$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Anand Food Court — Sign In</title>

<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#0A0A0A;--bg2:#111;--bg3:#1A1A1A;--bg4:#222;
  --border:rgba(255,255,255,0.07);--border2:rgba(255,255,255,0.13);
  --accent:#F5A623;--accent2:#E8950F;--accent3:#FFC85A;
  --accent-bg:rgba(245,166,35,0.08);--accent-bg2:rgba(245,166,35,0.15);
  --t1:#FFFFFF;--t2:#CCCCCC;--t3:#999999;
  --glow:0 0 40px rgba(245,166,35,0.18);
}
body{font-family:'Segoe UI',system-ui,sans-serif;background:var(--bg);color:var(--t1);min-height:100vh;display:flex;-webkit-font-smoothing:antialiased;}

/* LEFT VISUAL */
.panel-left{
  width:52%;position:relative;
  background:var(--bg2);
  border-right:1px solid var(--border);
  display:flex;flex-direction:column;justify-content:flex-end;
  padding:64px;overflow:hidden;min-height:100vh;
}
.panel-left::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(ellipse 70% 50% at 40% 60%,rgba(245,166,35,0.08) 0%,transparent 70%),
             radial-gradient(ellipse 40% 40% at 80% 20%,rgba(245,166,35,0.04) 0%,transparent 60%);
}
/* Grid texture */
.panel-left::after{
  content:'';position:absolute;inset:0;
  background-image:linear-gradient(rgba(255,255,255,0.02) 1px,transparent 1px),
                   linear-gradient(90deg,rgba(255,255,255,0.02) 1px,transparent 1px);
  background-size:40px 40px;
}
.glow-orb{
  position:absolute;width:400px;height:400px;
  background:radial-gradient(circle,rgba(245,166,35,0.12) 0%,transparent 70%);
  border-radius:50%;top:-80px;right:-100px;
  animation:pulse 6s ease-in-out infinite;
}
@keyframes pulse{0%,100%{transform:scale(1);opacity:0.8;}50%{transform:scale(1.1);opacity:1;}}

.food-scene{
  position:absolute;top:0;right:0;bottom:0;left:0;
  display:flex;align-items:center;justify-content:center;
  z-index:1;
}
.food-ring{
  position:relative;width:320px;height:320px;
  display:flex;align-items:center;justify-content:center;
}
.food-ring-circle{
  position:absolute;inset:0;
  border:1px solid rgba(245,166,35,0.12);
  border-radius:50%;
  animation:spin 30s linear infinite;
}
.food-ring-circle:nth-child(2){inset:30px;animation-duration:20s;animation-direction:reverse;border-color:rgba(245,166,35,0.08);}
.food-center{font-size:80px;filter:drop-shadow(0 0 30px rgba(245,166,35,0.4));animation:float 5s ease-in-out infinite;}
.food-orbit{position:absolute;font-size:32px;animation:float 4s ease-in-out infinite;}
.food-orbit:nth-child(3){top:0;left:50%;transform:translateX(-50%);animation-delay:0.5s;}
.food-orbit:nth-child(4){bottom:0;left:50%;transform:translateX(-50%);animation-delay:1s;}
.food-orbit:nth-child(5){left:0;top:50%;transform:translateY(-50%);animation-delay:1.5s;}
.food-orbit:nth-child(6){right:0;top:50%;transform:translateY(-50%);animation-delay:2s;}
@keyframes float{0%,100%{transform:translateY(0) translateX(-50%);}50%{transform:translateY(-12px) translateX(-50%);}}
@keyframes spin{to{transform:rotate(360deg);}}

.panel-left-content{position:relative;z-index:2;}
.brand-pill{
  display:inline-flex;align-items:center;gap:8px;
  background:var(--accent-bg2);border:1px solid rgba(245,166,35,0.25);
  color:var(--accent);font-size:11px;font-weight:500;
  letter-spacing:2px;text-transform:uppercase;
  padding:6px 14px;border-radius:20px;margin-bottom:24px;
}
.brand-pill-dot{width:6px;height:6px;background:var(--accent);border-radius:50%;}
.panel-left h1{
  font-family:'Segoe UI',system-ui,sans-serif;
  font-size:clamp(40px,4.5vw,58px);font-weight:800;
  color:var(--t1);line-height:1.05;letter-spacing:-1px;margin-bottom:18px;
}
.panel-left h1 em{color:var(--accent);font-style:normal;display:block;}
.panel-left p{font-size:15px;color:var(--t2);line-height:1.7;max-width:380px;margin-bottom:36px;}
.stats-row{display:flex;gap:0;}
.stat-item{padding:0 32px 0 0;position:relative;}
.stat-item::after{content:'';position:absolute;right:16px;top:10%;bottom:10%;width:1px;background:var(--border);}
.stat-item:last-child::after{display:none;}
.stat-item:first-child{padding-left:0;}
.stat-num{font-family:'Segoe UI',system-ui,sans-serif;font-size:30px;font-weight:800;color:var(--accent);}
.stat-lbl{font-size:11px;color:var(--t3);letter-spacing:1px;text-transform:uppercase;margin-top:3px;}

/* RIGHT FORM */
.panel-right{
  width:48%;display:flex;align-items:center;justify-content:center;
  padding:60px 48px;background:var(--bg);
}
.form-box{width:100%;max-width:380px;}
.form-logo{
  display:flex;align-items:center;gap:10px;margin-bottom:48px;
}
.form-logo-icon{
  width:38px;height:38px;background:var(--accent);border-radius:10px;
  display:flex;align-items:center;justify-content:center;font-size:18px;
  box-shadow:var(--glow);
}
.form-logo-text{font-family:'Segoe UI',system-ui,sans-serif;font-size:18px;font-weight:800;color:var(--t1);}
.form-logo-text span{color:var(--accent);}
.form-eyebrow{font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--t3);margin-bottom:10px;}
.form-title{font-family:'Segoe UI',system-ui,sans-serif;font-size:34px;font-weight:800;color:var(--t1);letter-spacing:-0.5px;margin-bottom:8px;}
.form-sub{font-size:14px;color:var(--t2);margin-bottom:36px;}

.error-msg{
  background:rgba(239,68,68,0.08);border:1px solid rgba(239,68,68,0.2);
  border-left:3px solid #EF4444;color:#FCA5A5;
  padding:12px 16px;border-radius:10px;font-size:13px;margin-bottom:20px;
}
.field-group{margin-bottom:16px;}
.field-label{font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;color:var(--t3);margin-bottom:8px;display:block;}
.field-wrap{position:relative;}
.field-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);font-size:15px;pointer-events:none;color:var(--t3);}
.field-input{
  width:100%;padding:13px 14px 13px 42px;
  background:var(--bg3);border:1px solid var(--border);border-radius:10px;
  font-family:'Segoe UI',system-ui,sans-serif;font-size:14px;color:var(--t1);
  outline:none;transition:all 0.15s;
}
.field-input:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(245,166,35,0.1);}
.field-input::placeholder{color:var(--t3);}

.btn-signin{
  width:100%;padding:14px;
  background:var(--accent);color:#000;border:none;
  border-radius:10px;font-family:'Segoe UI',system-ui,sans-serif;
  font-size:15px;font-weight:700;cursor:pointer;
  letter-spacing:0.3px;transition:all 0.15s;margin-top:8px;
  display:flex;align-items:center;justify-content:center;gap:8px;
}
.btn-signin:hover{background:var(--accent3);box-shadow:var(--glow);transform:translateY(-1px);}
.btn-signin:active{transform:translateY(0);}

.demo-box{
  margin-top:28px;padding:16px;
  background:var(--bg3);border:1px solid var(--border);border-radius:12px;
}
.demo-title{font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--t3);margin-bottom:12px;}
.demo-account{
  display:flex;align-items:center;justify-content:space-between;
  padding:8px 12px;background:var(--bg4);border-radius:8px;
  margin-bottom:6px;cursor:pointer;transition:all 0.15s;border:1px solid transparent;
}
.demo-account:last-child{margin-bottom:0;}
.demo-account:hover{border-color:var(--accent);background:var(--accent-bg);}
.demo-role{display:flex;align-items:center;gap:8px;font-size:12px;color:var(--t2);}
.demo-dot{width:7px;height:7px;border-radius:50%;flex-shrink:0;}
.demo-creds{font-size:11px;color:var(--t3);font-family:monospace;}

@media(max-width:768px){
  body{flex-direction:column;}
  .panel-left{width:100%;min-height:50vh;padding:40px 32px;}
  .panel-right{width:100%;padding:40px 32px;}
  .food-scene{display:none;}
}
</style>
</head>
<body>

<div class="panel-left">
  <div class="glow-orb"></div>
  <div class="food-scene">
    <div class="food-ring">
      <div class="food-ring-circle"></div>
      <div class="food-ring-circle"></div>
      <div class="food-center">🍕</div>
      <div class="food-orbit">🥪</div>
      <div class="food-orbit">🍜</div>
      <div class="food-orbit">🥤</div>
      <div class="food-orbit">⭐</div>
    </div>
  </div>
  <div class="panel-left-content">
    <div class="brand-pill"><span class="brand-pill-dot"></span> Anand Food Court</div>
    <h1>Taste the <em>difference.</em></h1>
    <p>A complete food court management platform — order, manage, and track everything in one elegant system.</p>
    <div class="stats-row">
      <div class="stat-item"><div class="stat-num">27+</div><div class="stat-lbl">Items</div></div>
      <div class="stat-item"><div class="stat-num">5</div><div class="stat-lbl">Branches</div></div>
      <div class="stat-item"><div class="stat-num">3</div><div class="stat-lbl">Roles</div></div>
    </div>
  </div>
</div>

<div class="panel-right">
  <div class="form-box">
    <div class="form-logo">
      <div class="form-logo-icon">🍽️</div>
      <div class="form-logo-text">Anand <span>FC</span></div>
    </div>
    <div class="form-eyebrow">Welcome back</div>
    <h2 class="form-title">Sign in</h2>
    <p class="form-sub">Enter your credentials to access your account.</p>

    <?php if($error): ?>
    <div class="error-msg">⚠ <?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" action="">
      <div class="field-group">
        <label class="field-label">Username</label>
        <div class="field-wrap">
          <span class="field-icon">👤</span>
          <input type="text" name="username" class="field-input" placeholder="your username" required autocomplete="username">
        </div>
      </div>
      <div class="field-group">
        <label class="field-label">Password</label>
        <div class="field-wrap">
          <span class="field-icon">🔑</span>
          <input type="password" name="pass" class="field-input" placeholder="your password" required autocomplete="current-password">
        </div>
      </div>
      <button type="submit" name="btnans" class="btn-signin">Sign In →</button>
    </form>

    <div class="demo-box">
      <div class="demo-title">Demo Accounts — click to fill</div>
      <div class="demo-account" onclick="fill('admin','Admin@123')">
        <span class="demo-role"><span class="demo-dot" style="background:#A855F7"></span> Admin</span>
        <span class="demo-creds">admin / Admin@123</span>
      </div>
      <div class="demo-account" onclick="fill('branch1','Branch@123')">
        <span class="demo-role"><span class="demo-dot" style="background:#3B82F6"></span> Branch</span>
        <span class="demo-creds">branch1 / Branch@123</span>
      </div>
      <div class="demo-account" onclick="fill('member1','Member@123')">
        <span class="demo-role"><span class="demo-dot" style="background:#F5A623"></span> Member</span>
        <span class="demo-creds">member1 / Member@123</span>
      </div>
    </div>
  </div>
</div>

<script>
function fill(u,p){
  document.querySelector('[name=username]').value=u;
  document.querySelector('[name=pass]').value=p;
}
</script>
</body>
</html>
