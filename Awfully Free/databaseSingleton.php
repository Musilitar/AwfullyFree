<?php
include_once 'database.php';

class DatabaseSingleton {

    private static $verbinding;

    public static function getDatabase() {

        if (self::$verbinding == null) {
            $mijnComputernaam = "iwtsl.ehb.be";
            $mijnGebruikersnaam = "wda019";
            $mijnWachtwoord = "72896053";
            $mijnDatabase = "wda019";
            self::$verbinding = new Database($mijnComputernaam, $mijnGebruikersnaam, $mijnWachtwoord, $mijnDatabase);
        }
        return self::$verbinding;
    }

}
?>
