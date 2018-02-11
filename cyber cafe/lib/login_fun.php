<?php 
include './connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $server_usn=null;
    $server_pass=null;    
    $sql="SELECT `username`,`password` FROM `admin_info`";
    $qry= mysqli_query($link, $sql);
    $flag=null;
    while($result= mysqli_fetch_assoc($qry)){
        $server_usn = $result['username'];
        $server_pass = $result['password'];
        if($server_usn===$username&&$server_pass===$password){
            $flag='match';
            break;
        }       
    }
    if($flag==='match'){
        session_start();
        $_SESSION['username']=$username;
        header('Location:../welcome.php');
    }else{
        echo "password doesn't match";
    }
    //include '';
