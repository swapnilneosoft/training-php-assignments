<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=pdocrud","root","");
    }catch(Exception $e)
    {
        print_r($e->getMessage());
    }
?>