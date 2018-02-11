<?php
include './connect.php';
        $qq=$_POST['month'].' '.$_POST['year'];
        $nod= $_POST['nod'];
       /* echo $nod;
        echo $qq;*/
         $c=0;
        echo '<table>';
        echo '<tr><th colspan="4" class="head">Monthly Report of '.$_POST['fmon'].' '.$_POST['year'].'</th></tr>';
         echo '<tr><th class="hat">SL</th><th class="hat">Date</th><th class="hat">Customer</th><th class="hat">Bill</th></tr>';
        for($f=1;$f<=$nod;$f++){
            $q=$f.' '.$qq;
            echo '<tr class="p" id="p" onmouseover="sdf'.$f.'('.$f.')">';
            echo '<td class="q" >'.$f.'</td>';
            echo '<td class="q">'.$q.'</td>';
            $res= mysqli_query($link, "SELECT COUNT(*) AS 'nod' FROM `customer_info` WHERE `date` LIKE '%$q'");
            $row = mysqli_fetch_assoc($res);
            $c+=$row['nod'];
            echo '<td class="q">'.$row['nod'].'</td>';
            $to= mysqli_query($link, "SELECT SUM(`bill`) AS 'total' FROM `customer_info` WHERE `date` LIKE '%$q'");
            $rro= mysqli_fetch_assoc($to);
            echo '<td class="q">'.$rro['total'].' tk                
                <span class="detail" id="detail'.$f.'">
                <script>
                function sdf'.$f.'(dlu){

                var mh="'.$_POST['month'].'";
                var yr="'.$_POST['year'].'";
                var m="'.$_POST['fmon'].'";
                $.ajax({
                            type: "POST",
                            url:"./lib/day_dmy.php",
                            data: {"day":dlu,"month":mh,"year":yr,"fmon":m},
                            success: function (dat) {                           
                                $("#detail'.$f.'").html(dat);
                            }
                        });
                        }
                        </script>
                </span>';
            echo '</td></tr>';        
        }
        $tor= mysqli_query($link, "SELECT SUM(`bill`) AS 'total' FROM `customer_info` WHERE `date` LIKE '%$qq'");
        $rror= mysqli_fetch_assoc($tor);        
        echo "<tr><th colspan='4'>Total</th></tr><tr><td colspan='2' class='det'><div>Customer : ".$c."</td><td class='det' colspan='2'>Bill : ".$rror['total']." tk</div></td></tr>";
        echo '</table>';
    
?>

<style>
    .q{
        background-color: whitesmoke;
        width: 120px;
        border-bottom: 1px solid black;
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
    }
    .detail{
    visibility: hidden;
    background-color: black;
    color: white;
    text-align: center;
    border-radius: 5px;
    padding: 5px 0;
    position: absolute;
    z-index: 999;
    font-size: small;
    right: 120px;
}
.p:hover .detail{
    visibility: visible;
}
.p:hover .q{
    background-color: antiquewhite;
}
.hat{
    background-color: #333333;
    color: white;
}
</style>