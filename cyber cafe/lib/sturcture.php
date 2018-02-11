<html>
    <head>
        <link rel="stylesheet" type="text/css"  href="./css/sturcture_css.css">    
        <link rel="shortcut icon" href="rsc/favicon.ico">
        <script src="./lib/jquery-3.1.1.js"></script>        
    </head>
    <body>       
    <center><div>
        <table border="0" class="nev">
            <tr>
                <td style="width: 40%; font-size: 25px;" rowspan="2"><strong><a style=" color: white; text-decoration: none;" href="index.php" class="banner">
                            <img src="rsc/banner.png" height="75px"></a></strong></td>
                <td class="nmb" style="width: 20%;" ><a class="nm" href="index.php">Home</a></td>
                <td class="nmb" style="width: 20%;" onclick="window.open('login.php','_self')"><a class="nm">Employee</a></td>                
                <td class="nmb" style="width: 20%;"><a class="nm" href="about_us.php">About Us</a></td>
            </tr>
            <tr>
                <td id="clock" colspan="3"></td>                
            </tr>
        </table>
        </div>       
        </center>
    <script>
    $(document).ready(function (){
        $('#body').css('marginTop',$('.nev').outerHeight(true));
    });
    function clock(){
        var q=new Date().toLocaleString();
        document.getElementById("clock").innerHTML =q;
        setTimeout(function() {clock();},1000); 
    }   
    clock();   
    </script>
    <div class="footer" align="center"><f>&copy; Be posiTive 2016<br>devolped by BRINta</f></div>
  </body>
</html>
