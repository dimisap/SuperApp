<?php

session_start();

unset($_SESSION["username"]);
header("Location:index.html");



/*διαφορετικός τρόπος


session_start();
session_unset();
session_destroy();

header("Location:index.html");
*/


?>
