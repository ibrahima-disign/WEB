<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

include("../entity/Account.php");
include("../includes/header.php");

$account = $_SESSION["account"];

if ($account instanceof Account) {
    $email = $account->getEmail();

    $statement = $database->prepare("DELETE FROM users WHERE email = ?;");
    $statement->bind_param("s", $email);
    $statement->execute();
    echo "1";
} else
    echo "0";
