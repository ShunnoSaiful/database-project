<?php
include './lib/loged_strct.php';
?>
<style>
    .rep{
        background-color: #179b77;
        height: 20px;
        font-size: x-large;   
        cursor: pointer;
    }
</style>
<div class="body" id="body" style="background-color: rgba(0, 0, 0 ,.2)">
   <div id="searchreasult" align="center"></div>
    <div id="innr" class="body" align="center">
        <span class="rep" onclick="dp('d')">Daily Report</span>  
        <span class="rep" onclick="dp('m')">Monthly Report</span>  
        <span class="rep" onclick="dp('y')">Yearly Report</span>
        <div id="dc" align='center'></div></div>
    
</div> 
<script>
    function dp(a){
        switch(a){
            case 'd':
                $.ajax({
                    type: 'POST',
                    url:"./lib/date/day.php",
                    success: function (dat) {
                        $('#dc').html(dat);                        
                    }
                });
                break;
            case 'm':
                $.ajax({
                    type: 'POST',
                    url:"./lib/date/month.php",
                    success: function (dat) {
                        $('#dc').html(dat);                        
                    }
                });
                break;
            case 'y':
                $.ajax({
                    type: 'POST',
                    url:"./lib/date/year.php",
                    success: function (dat) {
                        $('#dc').html(dat);                        
                    }
                });
                break;
            default:
                    $.ajax({
                    type: 'POST',
                    url:"./lib/date/day.php",
                    success: function (dat) {
                        $('#dc').html(dat);                        
                    }
                });   
        }
    }
    dp("");

</script>