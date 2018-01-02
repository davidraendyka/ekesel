<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>

<body>
	<div class="navigation">
  
    <table class="table-content-navbar">
      <tbody>
        
        <tr>
          <td width="28%" height="60" ><a href="index.php"><img src="assets/image/logo.png" width="100px" height="50px" alt="" class="logobar"/></a></td>
          <td width="32%">&nbsp;</td>
          <td width="40%">
			  <ul class="nav">
  <li class="button-dropdown">
    <a href="javascript:void(0)" class="dropdown-toggle">
      Account<span>▼</span>
    </a>
    <ul class="dropdown-menu">
      <li>
        <a href="adminaccount.php">
          Administrator
        </a>
      </li>
      <li>
        <a href="teacheraccount.php">
          Teacher
        </a>
      </li>
      <li>
        <a href="studentaccount.php">
          Student
        </a>
      </li>
    </ul>
  </li>
  <li class="button-dropdown">
    <a href="javascript:void(0)" class="dropdown-toggle">
      Adjustment<span>▼</span>
    </a>
    <ul class="dropdown-menu">
      <li>
        <a href="subject.php">
          Subject
        </a>
      </li>
		<li>
        <a href="schedule.php">
          Learning Schedule
        </a>
      </li>
		<a href="department.php">
          Department
        </a>
      </li>
    </ul>
  </li>
	<li class="button-dropdown">
		<a href="logout.php" class="dropdown-toggle">Logout</a>
</ul>
<script src="assets/js/jquery-3.2.1.min.js"></script>
		</td>
		  </tr>
		</tbody>
		</table>
	</div>
	
<script>jQuery(document).ready(function(e) {
  function t(t) {
    e(t).bind("click", function(t) {
      t.preventDefault();
      e(this)
        .parent()
        .fadeOut();
    });
  }
  e(".dropdown-toggle").click(function() {
    var t = e(this)
    .parents(".button-dropdown")
    .children(".dropdown-menu")
    .is(":hidden");
    e(".button-dropdown .dropdown-menu").hide();
    e(".button-dropdown .dropdown-toggle").removeClass("active");
    if (t) {
      e(this)
        .parents(".button-dropdown")
        .children(".dropdown-menu")
        .toggle()
        .parents(".button-dropdown")
        .children(".dropdown-toggle")
        .addClass("active");
    }
  });
  e(document).bind("click", function(t) {
    var n = e(t.target);
    if (!n.parents().hasClass("button-dropdown"))
      e(".button-dropdown .dropdown-menu").hide();
  });
  e(document).bind("click", function(t) {
    var n = e(t.target);
    if (!n.parents().hasClass("button-dropdown"))
      e(".button-dropdown .dropdown-toggle").removeClass("active");
  });
});
</script>
</body>
</html>