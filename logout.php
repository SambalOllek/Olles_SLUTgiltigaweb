<?php
session_start();
session_destroy();
//skickar dig till en sida som i sin tur loggar ut dig efter 1 sekund
 ?>

 <!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<meta http-equiv="refresh" content="1;url=loginpage.php"/>
</body>
</html>
