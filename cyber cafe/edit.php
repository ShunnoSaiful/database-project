<?php include './lib/connect.php';
 include './lib/loged_strct.php';
    $id=$_GET['id'];
    $temp= mysqli_query($link, "SELECT * FROM `customer_info` WHERE `id`='$id'");
    while($data= mysqli_fetch_assoc($temp)){
        $desk_no=$data['desk_no'];
        $name=$data['name'];
        $address=$data['address'];
        $contact=$data['contact'];
        $start_time=$data['start_time'];
    }
?>
<title><?php echo 'Edit '.$name.' || Be posiTive cyber cafe';?></title>
    <div id="body" class="body"><center>       
        <form method="POST">
            <table>
                <tr>
                    <th rowspan="2" id="pc"><?php echo $desk_no;?></th>
                    <th class="date">Today <?php echo date("D d M Y");?></th></tr><tr>
                    <th class="id">ID:&emsp;<?php echo $id;?></th></tr><tr>
                    <td>Name:</td><td><input type="text" size="40" name="name" value="<?php echo $name;?>"/></td></tr><tr>
                    <td>Address: </td><td><input type="text" size="40" name="address" value="<?php echo $address;?>"/></td></tr><tr>
                    <td>Contact no:</td><td><input type="text" size="40" name="contact" value="<?php echo $contact;?>"/></td></tr><tr>
                    <td>Entry Time:</td><td><input size="40" name="start_time" id="s_t" value="<?php echo $start_time;?>"/>                    
                    </td></tr><tr>
                    <th colspan="2"><input type="submit"  value="Update" name="btn" class="button">
                     <input type="submit"  value="Delete" name="btn" class="button"></th>
                </tr>
            </table>
        </form>
        </center></div>
<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if($_POST['btn']==='Update'){
            $name=$_POST['name'];
            $address=$_POST['address'];
            $contact=$_POST['contact'];
            $start_time=$_POST['start_time'];
            $edit_status= mysqli_query($link, "UPDATE `customer_info` SET `name`='$name',`address`='$address',`contact`='$contact',`start_time`='$start_time' WHERE `id`='$id'");
            if($edit_status){
               echo 'edited successfully!';
            }else{
                echo mysqli_error($link);
            }
        }else{
            echo "<script>"
            . " var conf = confirm(\"do you realy want to delete?\");"            
            . "</script>";
            $j= "<script> document.write(conf);</script>";
            if($j){
                $edit_status= mysqli_query($link, "DELETE FROM `customer_info` WHERE `id`='$id'");
            if($edit_status){
                echo '<script>
                open("manage.php","_self");
                </script>';
                
            }else{
                echo mysqli_error($link);
            }
            }else{
                echo $j.'else';
            }
        }
    }
?>
