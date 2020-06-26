<?php

class Connection  
{
    public static function make()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=newCo', 'root', 'password');
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
