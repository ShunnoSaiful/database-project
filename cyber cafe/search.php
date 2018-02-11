<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
if(isset($_GET['q'])){
    $q=$_GET['q'];
    include './lib/connect.php';
if ($link) {
$sql="SELECT * FROM `customer_info` WHERE date LIKE '%$q%' OR id LIKE '%$q%' OR name LIKE '%$q%' OR contact LIKE '%$q%' OR start_time LIKE '%$q%' OR end_time LIKE '%$q%' OR spent LIKE '%$q%' OR bill LIKE '%$q%' OR desk_no LIKE '%$q%' OR address LIKE '%$q%'";
$result = mysqli_query($link,$sql);

 $i=1;
 echo '<table><th class="h_c">Sl</th><th class="h_c" >Date</th><th class="h_c" >ID</th><th class="h_c" >Name</th><th class="h_c" >Address</th><th class="h_c" >Contact</th><th class="h_c" >Desk no</th><th class="h_c" >Enter Time</th><th class="h_c" >Exit Time</th><th class="h_c" >Spent</th><th class="h_c" >Bill</th></tr>';
        
    while($row= mysqli_fetch_assoc($result)){
        echo '<tr>';
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
        echo '<th class="d_c" >'.$i.'</th><td class="d_c" >'.$date.'</td><td class="d_c" >'.$id.'</td><td class="d_c" >'.$name.'</td><td class="d_c" >'.$address.'</td><td class="d_c" >'.$contact.'</td><td class="d_c" >'.$desk_no.'</td><td class="d_c" >'.$start_time.'</td><td class="d_c" >'.$end_time.'</td><td class="d_c" >'.$spent.'</td><td class="d_c" >'.$bill.'</td>';
        $i++;
        echo '</tr>';
    }
echo "</table>";
}
}
?>
</body>
</html>