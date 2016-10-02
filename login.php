<?php

session_start();

// if the user is logged we don't want to show the login page
if (isset($_SESSION['uid'])) {
   echo 'You are already logged! You will be redirected to the secret page in 2 seconds...';
   header('Refresh: 2; URL = secret.php');
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Test login</title>
</head>
<body>
    <?php
        // let's initialize the resulat variable which is used below
        $resultat = '';
        // let's check if the form was submitted by the user
        if (isset($_POST['login'])) {
            // yes the user sumbitted the form, let's get the user's submitted data
            $username = filter_input(INPUT_POST, 'Brugernavn');
            $password = filter_input(INPUT_POST, 'Password');
            // let's check if all is alright
            if (empty($username) || is_string($username) == false) {
                die('Please enter a valid username!');
            }
            if (empty($password)) {
                die('Please enter a password!');
            }
            // the given username is fine - let's load the database connection
            require_once('dbcon.php');
            // let's get the user from the database
            $getUser = 'SELECT id, Navn, password, email FROM users WHERE Brugernavn = ?';
            $statement = $connection->prepare($getUser);
            $statement->bind_param('s', $username);
            $statement->execute();
            $statement->bind_result($uid, $name, $hashedPassword, $email);
            $statement->fetch();
            // it's always good to close the statement
            $statement->close();
            // let's check if we found a user with this username
            if (!$uid) {
                die('This username "'. $username .'" does not exist!');
            }
            // we found a user - let's compare if the given password
            // matches with the databases's one
            if (!password_verify($password, $hashedPassword)) {
                die('The username "'. $username .'" exists but the password is wrong!');
            }
            // we got a match!
            // save the user's id in the session and tell that he is logged
            $_SESSION['uid'] = $uid;
            $resultat = 'Hello '. $name .'! You are now logged!';
            // it's always good to close the database connection
            $connection->close();
        }
    ?>
    <p><?php echo $resultat; ?></p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
        <input type="text" name="Brugernavn" placeholder="Brugernavn">
        <input type="text" name="Password" placeholder="Password">
        <input type="submit" name="login" value="login">
    </form>
    <ul>
        <li><a href='secret.php'>Go to the secret page</a></li>
        <li><a href='index.php'>Go back to the main page</a></li>
    </ul>
</body>
</html>
