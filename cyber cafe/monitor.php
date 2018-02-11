<?php include './lib/loged_strct.php';?>
<title>be positive cyber cafe</title>
<div class="body" id="body"><center> 
    <div id="searchreasult" align="center"></div>
    <div id="innr" class="body">
        <?php
        include './lib/connect.php'; 
        $total=0;
        $free=0;
        $eng=0;
        $result=  mysqli_query($link,'SELECT info,status,last_use,rate FROM `desk_info`');
        $i=1;
        while($row= mysqli_fetch_assoc($result)){
            $desk_info[$i]=$row["info"];
            $desk_status[$i]=$row["status"];
            $desk_last_use[$i]=$row["last_use"];
            $rate[$i]=$row['rate'];
            $i++;
            }
            echo '<input type="hidden" id="vclock"><table style="border: 1px solid black; width:100%;"><tr>'.
                    '<script>function getlivetime(){  
                        now=new Date().getHours()+":"+new Date().getMinutes()+":"+new Date().getSeconds();
                        document.getElementById("vclock").innerHTML=now;
                        setTimeout(function(){getlivetime();},1000);           
                        }
                        getlivetime();
                        </script>';
            for($n=1;$n<$i;$n++){
                if($desk_status[$n]==="Free"){
                    $mp= explode("+", $desk_info[$n]); 
                    echo '<td class="cid" >c'.$n.'</td><td class="freecell"><a href="enter.php?desk_no=c'.$n.'" id="c'.$n.'">';
                    for($k=0;$k<count($mp);$k++){
                        echo $mp[$k]."<br>";
                        }
                    echo "</td>";
                    $free++;
                }else{
                    echo '<td class="cid" >c'.$n.'</td><td class="engcell" id="engcell'.$n.'" onclick="optionbox'.$n.'('.$n.','.$desk_last_use[$n].')">';
                    $result=  mysqli_query($link,'SELECT start_time,name FROM `customer_info` WHERE id="'.$desk_last_use[$n].'"');
                    while($row= mysqli_fetch_assoc($result)){
                        $use=$row["start_time"];
                        $name=$row["name"];
                        }
                    echo 'by '.$name.'  ( '.$desk_last_use[$n].' )<br>'.'Start time: '.$use.'<br>';
                    echo 'Spent time : <label id="sp'.$n.'"></label> min <br> cost : <label id="tk'.$n.'"></label> tk  '; 
                    echo '
                        <script>
                        var pi'.$n.'='.$n.';
                var ID'.$n.'="'.$desk_last_use[$n].'";
                var start_time'.$n.'="'.$use.'";
                var name'.$n.'="'. $name.'";
                var cost'.$n.'=null;
                var sp'.$n.' = null;
                var rate'.$n.'='.$rate[$n].';       
                    
                function parseTime'.$n.'(s'.$n.'){
                var c'.$n.'=s'.$n.'.split(":"); 
                return parseInt(c'.$n.'[0])*60+parseInt(c'.$n.'[1]);    
                }
                function getlivetime'.$n.'(){  
                now'.$n.' =new Date().getHours()+":"+new Date().getMinutes()+":"+new Date().getSeconds();
                sp'.$n.'=parseTime'.$n.'(now)-parseTime'.$n.'(start_time'.$n.');
                document.getElementById("sp"+pi'.$n.').innerHTML=sp'.$n.';
                cost'.$n.' = sp'.$n.'*rate'.$n.';
                document.getElementById("tk'.$n.'").innerHTML=cost'.$n.';
                setTimeout(function(){getlivetime'.$n.'();},1000);
                }getlivetime'.$n.'();
                
                function optionbox'.$n.'(po,dlu){
                getlivetime'.$n.'();
                    console.log(name'.$n.');
               // var op=confirm("do you realy want to Free c"+po)
               // if(op==true){
                  open("report.php?id="+dlu+"&end_time="+now+"&d_n=c"+po+"&name="+name'.$n.'+"&start_time="+start_time'.$n.'+"&rate="+rate'.$n.'+"&spent_time="+sp'.$n.',"_self");
               // }
                }
            
                </script>';     
            echo "</td>";
            $eng++;
        }
        if($n%2===0 && $n<=9){
            echo '</tr><tr>';
        }
        $total++;
    }
   
        echo '<div class="mon" >Total : '.$total.' Free : '.$free.' Engaged : '.$eng.'</div>';
    
    echo '</tr></table>';    

?>
            </div>
    </center> </div>