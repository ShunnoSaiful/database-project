<?php include './lib/sturcture.php';?> 
    <title>Sign-Up/Login Form</title>    
    <link rel="stylesheet" type="text/css"  href="css/login.css">    
  <div class="body" id="body"><center>
    <div class="form">      
        <div class="label-sign"><a onclick="signup()">Registration</a></div><div class="label-log"><a onclick="login()">Login</a></div>
        <form action="signup.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr><th><label>Name</label></th><th><input type="text" name="name"></th></tr>
                <tr><th><label>Email</label></th><th><input type="email" name="email"></th></tr>
                <tr><th><label>Contact</label></th><th><input type="text" name="contact"></th></tr>
                <tr><th><label>Position</label></th><th><input type="text" name="position"></th></tr>
                <tr><th><label>Image</label></th><th><input type="file" name="image"></th></tr>
                <tr><th><label>Username</label></th><th><input type="text" name="signusername"></th></tr>
                <tr><th><label>password</label></th><th><input type="password" name="signpass"></th></tr>            
                <tr><th></th><th><center><input type="submit" class="button" value="sign up"></center></th></tr>
            </table>
        </form>
    </div></center>
</div>
       <script>   
    function login() {
    window.open("login.php","_self");
}
    function signup() {
    window.open("signup.php","_self");
}
    </script>
<?php
if(isset($_POST['name'])){
     include './lib/connect.php';
    $res= mysqli_query($link, "SELECT COUNT(*) AS num FROM `admin_info`");
    $admin_id=null;
    while($data= mysqli_fetch_assoc($res)){
        $admin_id=($data['num']+1);
    }
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $signusername=$_POST['signusername'];
    $signpass=$_POST['signpass'];
    $position=$_POST['position']; 
    echo "image".$_FILES['image']."image";
    $img=$_FILES['image']['tmp_name'];    
    echo 'img'.$img.'img';
    if($img===""){
        $img="./rsc/admin.png";
    }
    $image = addslashes(file_get_contents($img));
    echo $name.''.$contact.''.$email.''.$signpass.''.$signusername.''.$admin_id.'';
   $sql="INSERT INTO `admin_info` (`username`, `admin_id`, `name`, `type`, `signature`, `password`, `image`)"
            . " VALUES ('$signusername', '$admin_id', '$name', '$position', '$name', '$signpass', '{$image}')";
    $qry= mysqli_query($link, $sql);
    if($qry){
        session_start();
        $_SESSION['username']=$signusername;
        header("Location:../welcome.php");
    }else{
        echo mysqli_error($link);
    }
}
