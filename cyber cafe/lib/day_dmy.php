<?php

include './connect.php';
        $q= $_POST['day'].' '.$_POST['month'].' '.$_POST['year'];
        $dayfor= DateTime::createFromFormat('d M Y', $q); 
        echo '<table class="day_dmy">';
        echo '<tr><th colspan="5" class="head">Daily Report of '.$dayfor->format("l").', '.$_POST['day'].' '.$_POST['fmon'].' '.$_POST['year'].'</th></tr>';
        
        $res= mysqli_query($link, "SELECT * FROM `customer_info` WHERE `date` LIKE '%$q' ORDER BY `start_time` ASC");
        $n=1;
        echo '<tr><th class="hat">SL</th><th class="hat">ID</th><th class="hat">Name</th><th class="hat na">Spent</th><th class="hat">Bill</th></tr>';
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<tr class="r">';
            echo '<td>'.$n.'</td><td  class="w">'.$row['id'].'</td><td  class="na">'.$row['name'].'</td><td  class="w">'.$row['spent'].'</td><td  class="w">'.$row['bill'].' tk
                    <span class="details" id="details">
                    ID : '.$row['id'].'
                    <br>Name : '.$row['name'].'
                    <br>Contact : '.$row['contact'].'
                    <br>Address : '.$row['address'].'
                    <br>Desk no : '.$row['desk_no'].'
                    <br>Start Time : '.$row['start_time'].'
                    <br>End Time : '.$row['end_time'].'
                    <br>Spent : '.$row['spent'].'
                    <br>Bill : '.$row['bill'].'
                    </span></td>';
            echo '</tr>';
            $n++;
        }
        $to= mysqli_query($link, "SELECT SUM(`bill`) AS 'total' FROM `customer_info` WHERE `date` LIKE '%$q'");
        $rro= mysqli_fetch_assoc($to);     
        echo "<tr><th colspan='5' class='to'>Total</th></tr>";
        echo "<tr><td colspan='5'><table style='width:100%;'><tr><td class='det'>Customer : ".($n-1)."</td><td class='det'>Bill : ".$rro['total']." tk</td></tr></table></td></tr>";
        echo '</table>';
?>

<style>
    .w,.na{
        background-color: whitesmoke;
        width: 120px;
        border-bottom: 1px solid black;
    }
    .na,.hat .na{
        width: 200px;
    }
    .head{
        font-size: xx-large;
    }
    .head,.det{
        background-color: #000000;
        color: white;
    }
    .det{
        font-size: x-large;
        width: 50%;
    }
    .details{
    visibility: hidden;
    width: 120px;
    /*max-width: 600px;
    min-width: 120px;*/
    background-color: black;
    color: white;
    text-align: center;
    border-radius: 5px;
    padding: 5px 0;
    position: absolute;
    z-index: 999;
    font-size: small;
}
.r:hover .details{
    visibility: visible;
}
.r:hover td{
    background-color: antiquewhite;
}
.hat{
    background-color: #333333;
    color: white;
}
.to{
    font-size: x-large;color: white;
    
}
</style>