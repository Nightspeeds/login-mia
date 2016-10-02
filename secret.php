<?php

session_start();

// if the user is logged in then let's show it!
if (!isset($_SESSION['uid'])) {
    echo 'Du er nu logget ind, og vil blive ført til næste side on få sekunder!';
    header('Refresh: 2; URL = login.php');
    // we use 'die' to stop the script
    die;
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Secret</title>
</head>
<body>
   <p>Here is the secret message: <strong>"HER ER DEN SIDE DU KUN KAN SE HVIS DU ER LOGGET IND"</strong> :)</p>
    <ul>
        <li><a href='logout.php'>Logout</li>
    </ul>

</body>
</html>
