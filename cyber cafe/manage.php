<?php include './lib/loged_strct.php';?>
<title>be positive cyber cafe</title>
<div class="body" id="body"><center>
    <div id="searchreasult" align="center"></div>
    <div id="innr" class="body">
        
<?php
    include './lib/connect.php';
    $date=$id=$name=$contact=$start_time=$end_time=$spent=$bill=$desk_no=$address=null;
    $result=  mysqli_query($link,'SELECT * FROM `customer_info`');
    $i=1;
    echo '<table class="data_tab"><tr>';
    echo '<th class="h_c">Sl</th><th class="h_c" >Date</th><th class="h_c" >ID</th><th class="h_c" >Name</th><th class="h_c" >Address</th><th class="h_c" >Contact</th><th class="h_c" >Desk no</th><th class="h_c" >Enter Time</th><th class="h_c" >Exit Time</th><th class="h_c" >Spent</th><th class="h_c" >Bill</th></tr>';
        
    while($row= mysqli_fetch_assoc($result)){
        echo '<tr class="trp">';
        $date=$row["date"];
        $id=$row["id"];
        $name=$row["name"];
        $contact=$row["contact"];
        $start_time=$row['start_time'];
        $end_time=$row['end_time'];
        $spent=$row['spent'];
        $bill=$row['bill'];
        $desk_no=$row['desk_no'];
        $address=$row['address'];
        echo '<th class="d_c" >'.$i.'</th><td class="d_c" >'.$date.'</td><td class="d_c" >'.$id.'</td><td class="d_c" >'.$name.'</td><td class="d_c" >'.$address.'</td><td class="d_c" >'.$contact.'</td><td class="d_c" >'.$desk_no.'</td><td class="d_c" >'.$start_time.'</td><td class="d_c" >'.$end_time.'</td><td class="d_c" >'.$spent.'</td><td class="d_c" >'.$bill.'</td><td><button onclick="edit('.$id.')" class="ebtn">Edit</button></td>';
        $i++;
        echo '</tr>';
    }
    echo '</tr></table>';    

?>
<style>
   .trp:hover td,.trp:hover th{
       background-color: #ffffcc;
       color: black;
       cursor: initial;        
    }
    .ebtn{
        background-color: #006600;
        border: none;
    }
    .ebtn:hover{
        color: white;
    }
</style>
<script>
function edit(id){
    //var conf = confirm("do you realy want to delete?");
    //document.write(conf);
    open("edit.php?id="+id+"","_self");
}
</script>
    </div>
    </center>
</div>