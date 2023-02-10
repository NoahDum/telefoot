<?php
// Constantes pour une connexion à la base de donnée 
define("DB_HOSTNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "telefoot");

// Constantes pour stocker les chemins vers nos différents dossiers
define("DIR_TEMPLATE", "../templates/");
define("DIR_APPLICATION", "../src/");
define("DIR_MODEL",DIR_APPLICATION . "model/");
define("DIR_CONTROLLER",DIR_APPLICATION . "controller/");
define("DIR_VIEW",DIR_APPLICATION . "view/");
define("HOST", "http://localhost/telefoot/public/");
define("DIR_ASSETS", HOST ."assets/");