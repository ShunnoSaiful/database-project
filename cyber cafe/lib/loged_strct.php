<html>
    <head>
        <link rel="stylesheet" type="text/css"  href="./css/loged_css.css">    
        <link rel="shortcut icon" href="rsc/favicon.ico">
        <script src="lib/jquery-3.1.1.js"></script>       
    </head>
    <body>       
    <center><div id="header" class="nev">
            <table border="0"  >
            <tr>
                <td style="width: 35%; font-size: 25px;" rowspan="2"><strong><a style=" color: white; text-decoration: none;" href="welcome.php" class="banner">
                        <img src="rsc/banner.png" height="75px"></a></strong></td>
                <td class="nmb" style="width: 14%;" ><a class="nm" href="welcome.php">Home</a></td>
                <td class="nmb" style="width: 14%;" onclick="monitor()"><a class="nm">Monitor cafe</a></td>
                <td class="nmb" style="width: 14%;" onclick="manage()"><a class="nm">Manage cafe</a></td>
                <td class="nmb" style="width: 13%;" onclick="report()"><a class="nm">Report</a></td>
                <td style="width: 5%;" rowspan="2">
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn" onmouseover="myFunction()" id="profile"></button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="edit_profile.php">Edit profile</a>
                            <a href="#about">Setting</a>
                            <a href="index.php">logout</a>
                        </div>
                    </div>
                </td>
            </tr><tr>
                <td id="clock" colspan="2">clock</td>
                <td colspan="2" id="search-bar"><input  type="text" id="s_box" onkeyup="searchresult(this.value)" placeholder="serach..."></td>                
            </tr>
        </table>
        </div>
        <div>     
            <?php
                session_start();
                if(isset($_SESSION['username'])){
                    $username=$_SESSION['username'];
                    include 'connect.php';
                    $result= mysqli_query($link, "SELECT * FROM admin_info");
                    $row= mysqli_fetch_assoc($result);                    
                    //echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
                }
            ?>
        </div>
        </center>
    <script>
    $(document).ready(function (){
        $('#body').css('marginTop',$('#header').outerHeight(true));
    });    
    function clock(){
        var q=new Date().toLocaleString();
        document.getElementById("clock").innerHTML =q;
        setTimeout(function() {clock();},1000); 
    }clock();
    
    document.getElementById('profile').innerHTML="<?php echo'<img src=\"data:image/jpeg;base64,'.base64_encode($row['image']).'\" width=\"40px\"/>' ;?>";
    function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
};
function monitor(){
    window.open("monitor.php","_self");
}
function report(){
    window.open("cafe_report.php","_self");
}
function manage(){
    window.open("manage.php","_self");
}

function searchresult(str) {
  if (str==="") {
   // document.getElementById('innr').style.visibility='visible';
    //document.getElementById('searchreasult').style.visibility='hidden';
    document.getElementById('searchreasult').style.display='none';
    document.getElementById('innr').style.display='block';
    return;
  }else{
       document.getElementById('searchreasult').style.display='block';
    document.getElementById('innr').style.display='none';
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState===4 && this.status===200) {
      document.getElementById("searchreasult").innerHTML=this.responseText;
    }
  };
  xmlhttp.open("GET","search.php?q="+str,true);
  xmlhttp.send();
  console.log(str);
}
}
    </script>
    <!--div class="footer" align="center"><f>&copy; Be posiTive 2016<br>devolped by BRINta</f></div-->
  </body>
</html>
