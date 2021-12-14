<?php
    //mysql_connect("localhost","root","");
    //mysql_select_db("login");
    $conn = new mysqli("mini-eksamensprojekt","root","");
    if($conn-> connect_error){
        die("error: " . $conn->connect_error);
    }

?>