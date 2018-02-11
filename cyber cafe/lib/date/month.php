<select name="year" id="year" onclick="m('m')">
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
<select name="month" id="month" onclick="m('m')">
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
<div id='main_body' align='center' ></div>
<script>
    function m(a){
        var mo=document.getElementById('month').value;
                       var m=mo.toString().substring(-3,3);
                        var y=document.getElementById('year').value;
                        var n=new Date(y,"JanFebMarAprMayJunJulAugSepOctrNovDec".indexOf(m)/3+1,0).getDate();
                        $.ajax({
                            type: 'POST',
                            url:"./lib/month_dmy.php",
                            data: {"month":m,"year":y,"fmon":mo,"nod":n},
                            success: function (dat) {
                                $('#main_body').html(dat);
                            }
                        });
    }
    m('m');
</script>