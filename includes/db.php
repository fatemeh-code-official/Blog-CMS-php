<?php

$serverName="localhost";
$userName="root";
$password="";
$dbname="blog_new";

$connection=new PDO("mysql:host=$serverName;dbname=$dbname",$userName,$password);

?>