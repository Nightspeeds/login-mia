<?php

// this is for my local database
//define("HOSTNAME", "localhost");
//define("MYSQLUSER", "root");
//define("MYSQLPASS", "");
//define("MYSQLDB", "profiler");

// let's define database's crendential
define("HOSTNAME","miaeriksen.dk.mysql");
define("MYSQLUSER", "miaeriksen_dk");
define("MYSQLPASS", "iLf7FQ9D");
define("MYSQLDB", "miaeriksen_dk");

// let's create the connection to the database
$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
// let's check if we get a successfull connection to the database
if ($connection->connect_error) {
    // we got an error let's stop the script and output the error message
    die('Connect Error ('. $connection->connect_errno .') ' . $connection->connect_error);
}
// we get a successful connection, let's use the UTF8 charset (char encoding) for the data transfert
$connection->set_charset('utf8');

?>
