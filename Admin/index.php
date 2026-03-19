<?php include_once("header.php"); ?>

<div class="stats-grid">
<?php
$conn=mysqli_connect("localhost","root","","project");
$stats=[
  ['📦','Orders',    "SELECT COUNT(*) FROM orders"],
  ['👥','Members',   "SELECT COUNT(*) FROM user WHERE rollid=3"],
  ['🏪','Branches',  "SELECT COUNT(*) FROM branch"],
  ['🍔','Products',  "SELECT COUNT(*) FROM product"],
];
foreach($stats as $s){
  $r=$conn->query($s[2])->fetch_row();
  echo "<div class='stat-card'>
    <div class='stat-icon'>{$s[0]}</div>
    <div><div class='stat-val'>{$r[0]}</div><div class='stat-lbl'>{$s[1]}</div></div>
  </div>";
}
?>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
  <!-- Recent Orders -->
  <div class="card">
    <div class="card-pad" style="border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;">
      <div>
        <div style="font-family:'Syne',sans-serif;font-weight:700;color:var(--t1);font-size:15px;">Recent Orders</div>
        <div style="font-size:11px;color:#AAAAAA;margin-top:2px;">Latest customer orders</div>
      </div>
      <a href="orders.php" class="btn btn-ghost" style="font-size:12px;padding:6px 12px;">View all</a>
    </div>
    <div class="tbl-wrap">
    <table>
      <thead><tr><th>Order ID</th><th>Member</th><th>Date</th><th>Status</th></tr></thead>
      <tbody>
      <?php
      $res=$conn->query("SELECT o.oid,u.fname,u.lname,o.doo FROM orders o JOIN user u ON o.uid=u.uid ORDER BY o.oid DESC LIMIT 6");
      if($res && $res->num_rows>0){
        while($row=$res->fetch_assoc()){
          $name=htmlspecialchars($row["fname"]." ".$row["lname"]);
          echo "<tr>
            <td><span class='badge badge-purple'>#".intval($row["oid"])."</span></td>
            <td style='color:var(--t1);font-weight:500;'>$name</td>
            <td>".htmlspecialchars($row["doo"])."</td>
            <td><span class='badge badge-green'>✓ Done</span></td>
          </tr>";
        }
      } else {
        echo "<tr><td colspan='4' style='text-align:center;color:#AAAAAA;padding:28px;'>No orders yet</td></tr>";
      }
      ?>
      </tbody>
    </table>
    </div>
  </div>

  <!-- Quick Links -->
  <div class="card card-pad">
    <div style="font-family:'Syne',sans-serif;font-weight:700;color:var(--t1);font-size:15px;margin-bottom:4px;">Quick Actions</div>
    <div style="font-size:11px;color:#AAAAAA;margin-bottom:18px;">Jump to any management area</div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
      <?php
      $links=[
        ['branchinsert.php','🏪','Add Branch'],
        ['categoryinsert.php','🗂️','Add Category'],
        ['productinsert.php','🍔','Add Product'],
        ['iteminsert.php','🥬','Add Item'],
        ['stockinsert.php','📦','Add Stock'],
        ['members.php','👥','View Members'],
        ['orders.php','📋','All Orders'],
        ['feedback.php','💬','Feedback'],
      ];
      foreach($links as $l){
        echo "<a href='{$l[0]}' style='display:flex;align-items:center;gap:10px;padding:12px 14px;background:var(--bg3);border:1px solid var(--border);border-radius:10px;text-decoration:none;color:var(--t2);font-size:13px;transition:all 0.15s;'
          onmouseover=\"this.style.borderColor='var(--accent)';this.style.color='var(--t1)'\"
          onmouseout=\"this.style.borderColor='var(--border)';this.style.color='var(--t2)'\">
          <span style='font-size:18px;'>{$l[1]}</span>{$l[2]}
        </a>";
      }
      $conn->close();
      ?>
    </div>
  </div>
</div>

<?php include_once("footer.php"); ?>
