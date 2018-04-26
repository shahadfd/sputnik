<?php
session_start();

?>
<html>
<head>
</head>
<body>
<p>
<h1>Welcome <?php echo $_SESSION['u']; ?></h1>

<p>Your cookie infromation: </p>
<p><?php 
foreach($_COOKIE as $k => $v)
  print ("<p>$k: $v</p>");
 ?></p>
</body>
</html>
 
