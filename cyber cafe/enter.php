<!doctype html>
<html>
    <head>
        <title>be positive cyber cafe</title>
                <link rel="shortcut icon" href="rsc/favicon.ico">
    </head>
    <body>
        <style>
            
            table{
                margin: auto;
                background-color: rgba(23, 161, 119, 0.5);
                box-shadow: 0 4px 10px 4px rgba(23, 161, 119, 1.0);
            }            
            #pc,.date,.id{
                font-size:xx-large;
            }
            #s_t{
                color: red;
            }
            input{
                padding: 10px 10px;
                height: 30px;
                width: 400px;
                font-size: x-large;
            }
            .button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 5px 0;
  font-size: 1rem;
  font-weight: 200;
  text-transform: uppercase;
  letter-spacing: .5em;
  background: tomato;
  color: #ffffff;
  width: 50%;
   transition: .5s ease;
}
.button:hover, .button:focus {
  background: #ff7e29;
  cursor: pointer;
}
        </style>
        <?php
        $desk_no=$_GET['desk_no'];
        //echo $desk_no;
        date_default_timezone_set("Asia/Dhaka");
    include './lib/connect.php';             
        $result=  mysqli_query($con,'SELECT COUNT(id)AS "no" FROM `customer_info`');
        while($row=  mysqli_fetch_assoc($result)){
            $tsl=$row["no"]+1;
        }
        if($tsl!=0){
            $resultd=  mysqli_query($con,'SELECT COUNT(id) AS "this_day" FROM `customer_info` WHERE date="'.  date("d M Y").'" ');
        while($row=  mysqli_fetch_assoc($resultd)){
            $sld=$row["this_day"]+1;
        }
        }
        $id=date("ymd").''.$tsl.''.$sld;
        //$ik=  mysqli_query($con,'INSERT INTO `customer_info` (id,date,name,address,desk_no,start_time,contact) VALUES("'.$id.'","'.$date.'","'.$name.'","'.$add.'","'.$desk_no.'","'.$start_time.'","'.$contact.'")');
?>
        <form method="POST" action="<?php send();?>">
            <table>
                <tr>
                    <th rowspan="2" id="pc"><?php echo $desk_no;?></th>
                    <th class="date">Today <?php echo date("D d M Y");?></th></tr><tr>
                    <th class="id">ID:&emsp;<?php echo $id;?></th></tr><tr>
                    <td>Name:</td><td><input type="text" size="40" name="name"/></td></tr><tr>
                    <td>Address: </td><td><input type="text" size="40" name="address"/></td></tr><tr>
                    <td>Contact no:</td><td><input type="text" size="40" name="contact"/></td></tr><tr>
                    <td>Entry Time:</td><td><input size="40" name="start_time" id="s_t"/>
                    <script>
                        function getlivetime(){
    document.getElementById('s_t').value=new Date().getHours()+":"+new Date().getMinutes()+":"+new Date().getSeconds();
    setTimeout(function(){getlivetime();},1000);
    
    }
    getlivetime();
 </script>
                    </td></tr><tr>
                    <th colspan="2"><input type="submit"  value="save" name="submit" class="button"></th>
                </tr>
            </table>
        </form>
        <?php function send(){  
            $name=NULL;$add=NULL;$contact=NULL;$start_time=NULL;
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST)) {
                $name=$_POST["name"];
                $add=$_POST["address"];
                $contact=$_POST["contact"];
                $start_time=$_POST["start_time"];                
                $date= date("d M Y");    
                       $sql='INSERT INTO `customer_info` (id,date,name,address,desk_no,start_time,contact) VALUES("'.$GLOBALS["id"].'","'.$date.'","'.$name.'","'.$add.'","'.$GLOBALS["desk_no"].'","'.$start_time.'","'.$contact.'")';
               $ik=  mysqli_query($GLOBALS['con'],$sql);
               $sql2='UPDATE `desk_info` SET `status` = "Engaged",`last_use`="'.$GLOBALS["id"].'" WHERE `desk_no` = "'.$GLOBALS["desk_no"].'"';
               $ik2=  mysqli_query($GLOBALS['con'],$sql2);
               if(!$ik || !$ik2){
                   echo $sql.''.$sql2;
               }
            else{
            header("Location:monitor.php");
               /*echo "<script>
        open('monitor.php','_self');
        </script>";*/
            }
        }
            }                 
            
        ?>
      
    </body>
</html>