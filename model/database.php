<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=sswcustomer';
    private static $username = 'mgs_user';
    private static $password = 'pa55word';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
                
                // Don't forget to add the ERRMODE_EXCEPTION
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
               
                $error_message = $e->getMessage();
                echo $error_message;
             //   include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>