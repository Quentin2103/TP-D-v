<?php
namespace BugApp\Models;
class Manager {

    public static function connectDb() {
        
        $pdo_options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
        
        $dbh = new \PDO('mysql:host=localhost;dbname=bug;charset=utf8', 'root', '', $pdo_options);
        return $dbh;
        
    }

}
?> 