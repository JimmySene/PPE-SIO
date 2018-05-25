<?php 

function sql_connect()
{
    $con = mysqli_connect('localhost', 'root', '', 'belle_table');
    return $con;
}



?>