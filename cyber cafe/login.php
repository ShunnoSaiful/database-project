<?php include './lib/sturcture.php';?>
    <title>Sign-Up/Login Form</title>    
    <link rel="stylesheet" type="text/css"  href="css/login.css">  
    <div class="body" id="body"><center>
    <div class="form">      
        <div class="label-sign"><a onclick="signup()">Registration</a></div><div class="label-log"><a onclick="login()">Login</a></div>
        <form method="POST" action="lib/login_fun.php">
            <table>
                <tr><th><label>username</label></th><th><input type="text" name="username"></th></tr>
                <tr><th><label>password</label></th><th><input type="password" name="password"></th></tr>
                <tr><th colspan="2"><center><input type="submit" class="button" value="log in"></center></th></tr>
            </table>
        </form>
    </div></center>
   <script>   
    function login() {
    window.open("login.php","_self");
}
    function signup() {
    window.open("signup.php","_self");
}
    </script>
    </div>