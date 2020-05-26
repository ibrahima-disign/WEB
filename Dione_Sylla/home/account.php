<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include("../entity/Account.php");

session_start();

if (!isset($_SESSION["account"]) || !($_SESSION["account"] instanceof Account)) {
    header('Location: ..');
    return;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <title>Connexion</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../layout/css/base.css">
    <link rel="stylesheet" href="../layout/css/grid.css">
    <link rel="stylesheet" href="../layout/css/elements.css">
    <link rel="stylesheet" href="../layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="../layout/css/util.css">
    <link rel="stylesheet" type="text/css" href="../layout/css/login.css">
</head>
<body>
<div id="wrap">

    <?php
    $index = 5;
    include('../includes/navigation.php');
    ?>
    <div id="content">
        <section>
            <div>
                <div class="row">
                    <div class="span12 text-center">
                        <div class="headline m-b-0">
                            <h3>Modifier le mot de passe</h3>
                        </div>
                        <div class="limiter">
                            <div class="container-login100">
                                <div class="wrap-login100 p-t-85 p-b-20">
                                    <form id="form" class="login100-form validate-form" onsubmit="return validateForm()">

                                        <p id="error_label" style="color:red; display:none;"></p>

                                        <div class="wrap-input100 validate-input m-t-30 m-b-35">
                                            <input name="current_password" class="input100" type="password" required>
                                            <span class="focus-input100" data-placeholder="Mot de passe actuel"></span>
                                        </div>
                                        <div class="wrap-input100 validate-input m-b-50">
                                            <input name="new_password" class="input100" type="password">
                                            <span class="focus-input100" data-placeholder="Nouveau mot de passe"></span>
                                        </div>
                                        <div class="container-login100-form-btn">
                                            <button class="login100-form-btn">
                                                Modifier
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
        <section>
            <div class="row">

                <form id="remove" class="login100-form validate-form" onsubmit="return removeAccount()">
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="background-color: red">
                            Supprimer mon compte (action irréversible)
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>
<script src="../layout/js/jquery-2.1.0.min.js"></script>
<script src="../layout/js/waypoints/waypoints.min.js"></script>
<script src="../layout/js/waypoints/waypoints-sticky.min.js"></script>
<script>

    $('.input100').each(function () {
        if ($(this).val().trim() != "") {
            $(this).addClass('has-val');
        }
        else {
            $(this).removeClass('has-val');
        }
    });

    function removeAccount() {
        var errorLabel = document.getElementById("error_label");

        $.ajax({
            type: 'POST',
            url: '../function/remove_account.php',
            success: function (data) {
                if (data === "0") {
                    errorLabel.innerHTML = "Supression du compte impossible !";
                    errorLabel.style.display = "inline";
                } else if (data === "1") {
                    window.location.href = "../function/disconnect.php"
                }
            },
            async: true
        });

        return false;
    }

    function validateForm() {
        var errorLabel = document.getElementById("error_label");
        var formData = $('#form').serializeArray();

        $.ajax({
            type: 'POST',
            url: '../function/modify_password.php',
            data: formData,
            success: function (data) {
                if (data === "0") {
                    errorLabel.innerHTML = "Mot de passe actuel incorrect !";
                    errorLabel.style.display = "inline";
                } else if (data === "1") {
                    errorLabel.innerHTML = "Le mot de passe à été modifié avec succès !";
                    errorLabel.style.display = "inline";
                    errorLabel.style.color = "green";
                    $('#form').trigger("reset");
                }
            },
            async: true
        });

        return false;
    }

    $('.input100').each(function () {
        $(this).on('blur', function () {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    });

    $(document).ready(function () {
        $('#nav').waypoint('sticky', {wrapper: '<div class="sticky-wrapper" />', stuckClass: 'stuck'})
    });
</script>
</body>
</html>
<script></script>