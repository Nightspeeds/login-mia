<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create user, muligheden for at oprette bruger</title>
</head>
<body>
    <?php
        // let's initialize the resulat variable which is used below
        $resultat = '';
        // let's check if the form was submitted by the user
        if (isset($_POST['opretbruger'])) {
            // yes the user sumbitted the form
            // let's validate the form that the use submitted with filters (http://php.net/manual/en/filter.filters.validate.php)
            $name = filter_input(INPUT_POST, 'Navn');
            $username = filter_input(INPUT_POST, 'Brugernavn');
            $password = filter_input(INPUT_POST, 'Password');
            $email = filter_input(INPUT_POST, 'Email', FILTER_VALIDATE_EMAIL);
            // let's check if we get some errors
            if (empty($name) || is_string($name) == false) {
                die('Please enter a valid name!');
            }
            if (empty($username) || is_string($username) == false) {
                die('Indtast et gydigt brugernavn!');
            }
            if (empty($password)) {
                die('Indtast kodeord!');
            }
            if (empty($email) || $email == false) {
                die('Indtast en gyldig email');
            }
            // so all went well - let's hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // let's insert the user in the database, first load the database connection
            require_once('dbcon.php');
            $insertNewUser = 'INSERT INTO users (Navn, Brugernavn, Password, Email) VALUES (?,?,?,?)';
            $statement = $connection->prepare($insertNewUser);
            $statement->bind_param('ssss', $name, $username, $hashedPassword, $email);
            $statement->execute();
            // let's check if we could create a new user in the database
            // if we could create a new row in the database then it's a success otherwise the user already exists
            if ($statement->affected_rows > 0) {
                $resultat = 'Success! Om et øjeblik vil du blive ført til log ind siden';
            header('Refresh: 3; URL = login.php');;} 
			else {
                $resultat = 'Dette brugernavn findes allerede. Prøv venligst igen';
            }
            // it's always good to close the statement
            $statement->close();
            // it's always good to close the database connection
            $connection->close();

        }
    ?>
    <p><?php echo $resultat; ?></p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
        <p><input type="text" name="Navn" placeholder="Navn"></p>
        <p><input type="text" name="Brugernavn" placeholder="Brugernavn"></p>
        <p><input type="text" name="Password" placeholder="Password"></p>
        <p><input type="text" name="Email" placeholder="Email"></p>
        <input type="submit" name="opretbruger" value="Opret bruger">
    </form>
    
</body>
</html>
