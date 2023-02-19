<?php

//connect to database

$conn = mysqli_connect("localhost", "root", "", "manee");

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

