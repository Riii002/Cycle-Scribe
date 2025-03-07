<?php
    $db = new mysqli("localhost","root","","cyclescribedb");

    if($db->connect_error)
    {
        die("Connection Failed : ". $db->connect_error);
    }
?>