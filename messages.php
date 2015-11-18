<?php
session_start();
include("header.php");
header("refresh:3; url=index.php");
 ?>

<body>
<br />
<br />
<br />
<br />

<h1><?=($_SESSION["message"])?></h1>





<?php
unset($_SESSION["message"]);
include("footer.php");
?>
