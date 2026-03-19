<?php include_once("header.php"); ?>

<div class="hero">
  <div class="hero-glow"></div>
  <div class="hero-deco">🍕</div>
  <div class="hero-inner">
    <div class="hero-tag">What's good today?</div>
    <h1 class="hero-title">Order fresh, <em>eat happy.</em></h1>
    <p class="hero-sub">Browse our full menu across 7 categories. Fresh ingredients, great taste — every time.</p>
  </div>
</div>

<div class="section-hd">
  <div><div class="section-title">Categories</div><div class="section-sub">Choose what you're craving</div></div>
</div>

<div class="cat-grid">
<?php
$conn=mysqli_connect("localhost","root","","project");
$result=$conn->query("SELECT * FROM category");
$emojis=['🍕','🥪','🍜','🥘','🍝','🌮','🥤','🍛','🥗','🍱'];
$i=0;
while($row=$result->fetch_assoc()){
  $cid=intval($row["catid"]);
  $cn=htmlspecialchars($row["catname"]);
  $em=$emojis[$i%count($emojis)];
  echo "<a href='product.php?id=$cid' class='cat-card'>
    <span class='cat-emoji'>$em</span>
    <div class='cat-name'>$cn</div>
    <div class='cat-hint'>Tap to explore →</div>
  </a>";
  $i++;
}
$conn->close();
?>
</div>

<div class="stats-grid" style="margin-top:28px;">
  <div class="stat-card"><div class="stat-icon">🍕</div><div><div class="stat-val">27+</div><div class="stat-lbl">Menu Items</div></div></div>
  <div class="stat-card"><div class="stat-icon">🏪</div><div><div class="stat-val">5</div><div class="stat-lbl">Branches</div></div></div>
  <div class="stat-card"><div class="stat-icon">⚡</div><div><div class="stat-val">Fast</div><div class="stat-lbl">Fresh Orders</div></div></div>
  <div class="stat-card"><div class="stat-icon">👑</div><div><div class="stat-val">3</div><div class="stat-lbl">Memberships</div></div></div>
</div>

<?php include_once("footer.php"); ?>
