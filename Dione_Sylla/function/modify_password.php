<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

if (!isset($_POST["current_password"])) return;

include("../entity/Account.php");
include("../includes/header.php");

$password = $_POST["current_password"];
$newPassword = $_POST["new_password"];

$account = $_SESSION["account"];

if ($account instanceof Account && $account->getPassword() == $password) {

    $email = $account->getEmail();

    $statement = $database->prepare("UPDATE users SET password = ? WHERE email = ?;");
    $statement->bind_param("ss", $newPassword, $email);
    $statement->execute();
    echo "1";
} else
    echo "0";
