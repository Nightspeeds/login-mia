<?php

session_start();

unset($_SESSION['uid']);

echo 'Du er nu logget ud!';

header('Refresh: 2; URL = index.php');

?>
