<select name="year" id="year" onclick="y('y')">
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
<div id='main_body' align='center' ></div>
<script>
    function y(a){
        var y=document.getElementById('year').value;
                        $.ajax({
                            type: 'POST',
                            url:"./lib/year_dmy.php",
                            data: {"year":y},
                            success: function (dat) {
                                $('#main_body').html(dat);
                            }
                        });
    }
    y('y');
</script>