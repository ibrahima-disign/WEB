<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

require_once "../entity/Account.php";
require_once "../includes/header.php";

$connected = (isset($_SESSION["account"]) && $_SESSION["account"] instanceof Account);

if ($connected) {
    $account = $_SESSION["account"];
}

?>


<header>
    <div id="header">
        <div class="sticky-wrapper" style="">
            <div id="nav" class="">
                <div class="row">
                    <div class="span3">
                        <a href="#" id="logo">
                           
                        </a>
                    </div>
                    <nav>
                        <div class="span9">
                            <a href="#" id="mobile-menu-trigger" class="mobile-menu-closed"><i class="fa fa-bars"></i>
                            </a>
                            <ul class="sf-menu sf-js-enabled" id="menu">
                                <li id="1">
                                    <a href="../home/"><span class="glyphicon glyphicon-home"></span> Acceuil</a>
                                </li>
                                

                                <?php
                                if ($connected) {
                                    print '
                                    <li id="5">
                                        <a href="../register/"><span class="glyphicon glyphicon-user"></span> Bienvenue ' . $account->getForename() . '</a>
                                        <ul>
                                          <li>
                                                <a href="../home/account.php"><span class="glyphicon glyphicon-cog"></span>
                                                    Mon compte</a>
                                            </li>
                                            
                                         
                                            <li>
                                                <a href="../function/disconnect.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a>
                                            </li>
                                        </ul>
                                    </li>
                                    ';

                                } else {
                                    print ' 
                                    <li id="3">
                                        <a href="../login/"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
                                    </li>
                                    <li id="4">
                                        <a href="../register/"><span class="glyphicon glyphicon-user"></span> Inscription</a>
                                    </li>';
                                }
                                ?>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById(<?php echo "'$index'"; ?>).setAttribute("class", "active");
</script>