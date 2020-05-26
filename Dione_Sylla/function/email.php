<?php

$type = $_GET["type"];

switch ($type) {
    case 1:
        $title = $_GET["title"];
        $cv= $_GET["cv"];

        $message = "Bonjour, \n";
        $message .= "Vous avez reçu une nouvelle proposition de CV pour l'offre d'emploi ".$title."\n";
        $message .= "L'adresse du CV : ".$cv."\n\n";
        $message .= "A très bientôt sur OpenCvTheque !";


        $var = mail('ahmed.botan94@gmail.com', 'Nouvelle proposition de CV', $message);
        break;
}