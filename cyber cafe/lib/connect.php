<?php
   /* $f='./lib/links.xml';
    echo $f;
    $xml= simplexml_load_file($f);
    $host=$xml->server;
    $user=$xml->username;
    $pass=$xml->password;
    $database=$xml->databasename;*/
$host="localhost";
    $user="root";
    $pass="";
    $database="cyber_cafe";
$link= mysqli_connect($host, $user, $pass, $database);
$con= mysqli_connect($host, $user, $pass, $database);
if(!$link){
    echo mysqli_error($link);
}

