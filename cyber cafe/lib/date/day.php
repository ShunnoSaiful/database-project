<select name="year" id="year" onclick="dayyy('d')">
    <?php
        for($n=2010;$n<=2050;$n++){
            if($n==(date('Y'))){
                echo '<option selected="selected">'.$n.'</option>';
            }else{
                echo '<option>'.$n.'</option>';
            }
        }
    ?>
</select>
<select name="month" id="month" onclick="dayyy('d')">
    <?php
        for($n=1;$n<13;$n++){
            $dateobj= DateTime::createFromFormat('!m',$n);
            $name=$dateobj->format("F");
            if($name==(date('F'))){
                echo '<option selected="selected">'.$name.'</option>';
            }else{
                echo '<option>'.$name.'</option>';
            }                 
        }
    ?>
</select>
<select name="day" id="day" onclick="da('d')">
</select>
<div id='main_body' align='center' ></div>
<script>
    function dayyy(a){
        var m=document.getElementById('month').value;
        var y=document.getElementById('year').value;
        var d=document.getElementById('day');
        d.innerHTML="";
        var n=new Date(y,"JanFebMarAprMayJunJulAugSepOctrNovDec".indexOf(m.toString().substring(-3,3))/3+1,0).getDate(); 
        var o=1;
        for(o=1;o<=n;o++){
            if(o===new Date().getDate()){
                d.innerHTML=d.innerHTML+"<option selected='selected'>"+o+"</option>";
            }else{
                d.innerHTML=d.innerHTML+"<option>"+o+"</option>";
            }            
        }
        da(a);
    }
   function da(a){
      // alert("gdfg");
       var m=document.getElementById('month').value;
        var mh=document.getElementById('month').value.toString().substring(-3,3);
        var yr=document.getElementById('year').value;
        var dy=document.getElementById('day').value;
                        $.ajax({
                            type: 'POST',
                            url:"./lib/day_dmy.php",
                            data: {"dmyr":a,"day":dy,"month":mh,"year":yr,"fmon":m},
                            success: function (dat) {
                                $('#main_body').html(dat);
                            }
                        });
   }
    dayyy('d');
    //console.log("dsgdfg");
</script>