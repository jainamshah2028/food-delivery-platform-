<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Anand FC — Branch</title>

<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#0A0A0A;--bg2:#111111;--bg3:#1A1A1A;--bg4:#222222;
  --border:rgba(255,255,255,0.07);--border2:rgba(255,255,255,0.13);
  --accent:#3B82F6;--accent2:#2563EB;--accent3:#60A5FA;
  --accent-bg:rgba(59,130,246,0.08);--accent-bg2:rgba(59,130,246,0.15);
  --t1:#FFFFFF;--t2:#CCCCCC;--t3:#999999;
  --green:#22C55E;--red:#EF4444;--amber:#F5A623;
  --sidebar-w:248px;--radius:12px;--radius-lg:18px;--radius-xl:24px;
  --glow:0 0 24px rgba(59,130,246,0.25);--shadow-lg:0 12px 40px rgba(0,0,0,0.6);
}
body{font-family:'Segoe UI',system-ui,sans-serif;background:var(--bg);color:var(--t1);display:flex;min-height:100vh;-webkit-font-smoothing:antialiased;}
.sidebar{width:var(--sidebar-w);background:var(--bg2);border-right:1px solid var(--border);min-height:100vh;position:fixed;top:0;left:0;display:flex;flex-direction:column;z-index:200;}
.sidebar-logo{padding:26px 22px 20px;border-bottom:1px solid var(--border);}
.logo-mark{display:flex;align-items:center;gap:10px;}
.logo-icon{width:34px;height:34px;background:var(--accent);border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:17px;box-shadow:var(--glow);flex-shrink:0;}
.logo-text{font-family:'Segoe UI',system-ui,sans-serif;font-size:16px;font-weight:800;color:var(--t1);}
.logo-text span{color:var(--accent);}
.logo-sub{font-size:9px;color:var(--t3);letter-spacing:2.5px;text-transform:uppercase;margin-top:5px;padding-left:44px;}
.sidebar-user{padding:14px 18px;margin:10px;background:var(--bg3);border-radius:var(--radius);border:1px solid var(--border);display:flex;align-items:center;gap:11px;}
.user-avatar{width:34px;height:34px;background:linear-gradient(135deg,var(--accent),var(--accent2));border-radius:8px;display:flex;align-items:center;justify-content:center;font-family:'Segoe UI',system-ui,sans-serif;font-size:13px;font-weight:800;color:#fff;flex-shrink:0;}
.user-name{font-size:13px;font-weight:500;color:var(--t1);line-height:1.2;}
.user-role{font-size:10px;color:var(--accent);letter-spacing:1.5px;text-transform:uppercase;margin-top:1px;}
.nav-section{padding:0 10px;flex:1;overflow-y:auto;}
.nav-label{font-size:9px;letter-spacing:2.5px;text-transform:uppercase;color:var(--t3);padding:14px 12px 5px;display:block;}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 12px;border-radius:8px;color:#BBBBBB;text-decoration:none;font-size:13px;transition:all 0.15s;margin-bottom:1px;position:relative;}
.nav-item:hover{background:var(--bg3);color:var(--t1);}
.nav-item.active{background:var(--accent-bg2);color:var(--accent);}
.nav-item.active::before{content:'';position:absolute;left:0;top:20%;bottom:20%;width:3px;background:var(--accent);border-radius:0 3px 3px 0;}
.nav-icon{font-size:15px;width:18px;text-align:center;flex-shrink:0;}
.sidebar-bottom{padding:10px;border-top:1px solid var(--border);}
.logout-link{display:flex;align-items:center;gap:10px;padding:9px 12px;border-radius:8px;color:var(--t3);text-decoration:none;font-size:13px;transition:all 0.15s;}
.logout-link:hover{background:rgba(239,68,68,0.1);color:var(--red);}
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:0 28px;height:60px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:100;}
.topbar-title{font-family:'Segoe UI',system-ui,sans-serif;font-size:16px;font-weight:700;color:var(--t1);}
.topbar-badge{background:var(--accent-bg2);color:var(--accent);font-size:10px;padding:3px 10px;border-radius:20px;font-weight:500;letter-spacing:1px;text-transform:uppercase;}
.topbar-right{display:flex;align-items:center;gap:12px;}
.topbar-greeting{font-size:13px;color:var(--t2);}
.topbar-greeting strong{color:var(--t1);font-weight:500;}
.btn{display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:8px;font-family:'Segoe UI',system-ui,sans-serif;font-size:13px;font-weight:500;cursor:pointer;text-decoration:none;border:none;transition:all 0.15s;}
.btn-accent{background:var(--accent);color:#fff;}
.btn-accent:hover{background:var(--accent3);color:#000;box-shadow:var(--glow);}
.btn-ghost{background:var(--bg3);color:var(--t2);border:1px solid var(--border);}
.btn-ghost:hover{background:var(--bg4);color:var(--t1);}
.btn-danger{background:rgba(239,68,68,0.1);color:var(--red);border:1px solid rgba(239,68,68,0.2);}
.btn-danger:hover{background:rgba(239,68,68,0.2);}
.page-content{padding:28px;flex:1;}
.stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:14px;margin-bottom:24px;}
.stat-card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius-lg);padding:22px;display:flex;align-items:center;gap:16px;}
.stat-icon{width:46px;height:46px;border-radius:11px;background:var(--accent-bg);border:1px solid rgba(59,130,246,0.2);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;}
.stat-val{font-family:'Segoe UI',system-ui,sans-serif;font-size:28px;font-weight:800;color:var(--t1);line-height:1;}
.stat-lbl{font-size:11px;color:var(--t3);margin-top:4px;}
.section-hd{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:18px;}
.section-title{font-family:'Segoe UI',system-ui,sans-serif;font-size:18px;font-weight:700;color:var(--t1);letter-spacing:-0.3px;}
.section-sub{font-size:12px;color:var(--t3);margin-top:2px;}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius-lg);overflow:hidden;}
.card-pad{padding:22px;}
table{width:100%;border-collapse:collapse;}
thead tr{border-bottom:1px solid var(--border);}
th{font-size:10px;letter-spacing:1.5px;text-transform:uppercase;color:var(--t3);font-weight:500;padding:12px 16px;text-align:left;}
td{padding:13px 16px;font-size:13px;color:var(--t2);border-bottom:1px solid var(--border);}
tr:last-child td{border-bottom:none;}
tbody tr:hover td{background:var(--bg3);color:var(--t1);}
.badge{display:inline-flex;align-items:center;gap:5px;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:500;}
.badge-blue{background:var(--accent-bg);color:var(--accent);}
.badge-green{background:rgba(34,197,94,0.1);color:var(--green);}
.badge-red{background:rgba(239,68,68,0.1);color:var(--red);}
.badge-amber{background:rgba(245,166,35,0.1);color:var(--amber);}
.action-group{display:flex;gap:6px;}
.form-group{margin-bottom:16px;}
.form-label{display:block;font-size:10px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;color:var(--t3);margin-bottom:7px;}
.form-input{width:100%;background:var(--bg3);border:1px solid var(--border);border-radius:9px;padding:11px 13px;font-family:'Segoe UI',system-ui,sans-serif;font-size:13px;color:var(--t1);outline:none;transition:all 0.15s;}
.form-input:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(59,130,246,0.1);}
.form-input::placeholder{color:var(--t3);}
select.form-input option{background:var(--bg3);}
.cat-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:12px;}
.cat-card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius-lg);padding:22px 14px;text-align:center;text-decoration:none;display:block;transition:all 0.2s;}
.cat-card:hover{border-color:var(--accent);background:var(--accent-bg);transform:translateY(-3px);}
.cat-emoji{font-size:32px;margin-bottom:10px;display:block;}
.cat-name{font-family:'Segoe UI',system-ui,sans-serif;font-size:13px;font-weight:700;color:var(--t1);margin-bottom:3px;}
.prod-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:14px;}
.prod-card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius-lg);overflow:hidden;transition:all 0.2s;text-decoration:none;display:block;}
.prod-card:hover{border-color:var(--border2);transform:translateY(-3px);box-shadow:var(--shadow-lg);}
.prod-img{width:100%;height:150px;object-fit:cover;background:var(--bg3);}
.prod-placeholder{width:100%;height:150px;background:var(--bg3);display:flex;align-items:center;justify-content:center;font-size:44px;}
.prod-body{padding:14px;}
.prod-name{font-family:'Segoe UI',system-ui,sans-serif;font-size:14px;font-weight:700;color:var(--t1);margin-bottom:4px;}
.prod-price{font-size:20px;font-weight:700;color:var(--amber);font-family:'Segoe UI',system-ui,sans-serif;}
</style>
</head>
<body>
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-mark"><div class="logo-icon">🏪</div><div class="logo-text">Anand <span>Branch</span></div></div>
    <div class="logo-sub">Branch Panel</div>
  </div>
  <div class="sidebar-user">
    <div class="user-avatar"><?php echo strtoupper(substr($_SESSION["name"]??"B",0,1)); ?></div>
    <div><div class="user-name"><?php echo htmlspecialchars($_SESSION["name"]??"Branch"); ?></div><div class="user-role">Branch Staff</div></div>
  </div>
  <nav class="nav-section">
    <span class="nav-label">Operations</span>
    <a href="index.php" class="nav-item"><span class="nav-icon">📊</span> Dashboard</a>
    <a href="offorder.php" class="nav-item"><span class="nav-icon">🛒</span> New Order</a>
    <span class="nav-label">Members</span>
    <a href="membersearch.php" class="nav-item"><span class="nav-icon">🔍</span> Find Member</a>
    <a href="customer.php" class="nav-item"><span class="nav-icon">➕</span> New Customer</a>
    <span class="nav-label">Catalogue</span>
    <a href="categorydisplay.php" class="nav-item"><span class="nav-icon">🗂️</span> Categories</a>
    <a href="productdisplay.php" class="nav-item"><span class="nav-icon">🍔</span> Products</a>
    <a href="offerdisplay.php" class="nav-item"><span class="nav-icon">🎁</span> Offers</a>
    <span class="nav-label">Stock</span>
    <a href="stockdisplay.php" class="nav-item"><span class="nav-icon">📦</span> Stock</a>
    <a href="feedback.php" class="nav-item"><span class="nav-icon">💬</span> Feedback</a>
  </nav>
  <div class="sidebar-bottom">
    <a href="../login.php" class="logout-link"><span>🚪</span> Logout</a>
  </div>
</aside>
<div class="main">
<div class="topbar">
  <div style="display:flex;align-items:center;gap:12px;">
    <div class="topbar-title">Branch Panel</div>
    <span class="topbar-badge">Branch Staff</span>
  </div>
  <div class="topbar-right">
    <span class="topbar-greeting">Welcome, <strong><?php echo htmlspecialchars($_SESSION["name"]??"Staff"); ?></strong></span>
    <a href="offorder.php" class="btn btn-accent">+ New Order</a>
  </div>
</div>
<div class="page-content">
