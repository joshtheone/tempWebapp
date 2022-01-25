<?php
    class connect {
        protected function db(){
            try {
                $conn = new PDO("mysql:host=".SEVER_NAME.";dbname=".DB_NAME,DB_USER_NAME,PASSWORD);
                // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::EERMODE_EXCEPTION);
                return $conn;
            } catch (PDOException $e) {
                echo "failed: ".$e->getMessage();
            }
        }
    }