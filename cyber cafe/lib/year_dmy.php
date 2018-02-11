<?php
include './connect.php';
        $y=$_POST['year'];
        $er=0;
        echo '<table>';
        echo '<tr><th colspan="4" class="head">Yearly Report of '.$_POST['year'].'</th></tr>';      
       for($n=1;$n<13;$n++){
            $dateobj= DateTime::createFromFormat('!m',$n);
            $name=$dateobj->format("F");
            $m=$dateobj->format("M");
            $q=$m.' '.$y;
            echo $m;
            $res= mysqli_query($link, "SELECT COUNT(*) AS 'cus' FROM `customer_info` WHERE `date` LIKE '%$q'");
            $ro = mysqli_fetch_assoc($res);
            $tor= mysqli_query($link, "SELECT SUM(`bill`) AS 'total' FROM `customer_info` WHERE `date` LIKE '%$q'");
            $rror= mysqli_fetch_assoc($tor); 
            $er+=$ro['cus'];
            echo "<tr class='yt' id='yt' onmouseover='sd$n()'>";
            echo '<td class="ty">'.$n.'</td>';
            echo '<td class="ty">'.$name.'</td>';
            echo '<td class="ty">'.$ro['cus'].'</td>';
            echo '<td class="ty">'.$rror['total'];
            echo '               
                <span class="detai" id="detai'.$n.'">
                <script>
                function sd'.$n.'(){                    
                var mh="'.$m.'";
               var yr="'.$_POST['year'].'";
                   var dl="'.$name.'";
                    
                    var n=new Date(yr,"JanFebMarAprMayJunJulAugSepOctrNovDec".indexOf(mh)/3+1,0).getDate();
                    //alert(dl+" "+mh+" "+yr+" "+n);
                $.ajax({               
                            type: "POST",
                            url:"./lib/month_dmy.php",
                            data: {"month":mh,"year":yr,"fmon":dl,"nod":n},
                            success: function (dat) {                           
                                $("#detai'.$n.'").html(dat);
                                     
                            }
                        });
                        }
                        </script>
                </span>';
            echo '</td></tr>';
        }
       $toru= mysqli_query($link, "SELECT SUM(`bill`) AS 'total' FROM `customer_info` WHERE `date` LIKE '%$y'");
        $rroru= mysqli_fetch_assoc($toru);        
        echo "<tr><th colspan='4'>Total</th></tr><tr><td colspan='2' class='det'><div>Customer : ".$er."</td><td class='det' colspan='2'>Bill : ".$rroru['total']." tk</div></td></tr>";
        

        echo '</table>';           
?>

<style>
    .ty{
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
    .detai{
    visibility: hidden;
    width: 620px;
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
.yt:hover .detai{
    visibility: visible;
}
.yt:hover .ty{
    background-color: antiquewhite;
}
.hat{
    background-color: #333333;
    color: white;
}
</style>