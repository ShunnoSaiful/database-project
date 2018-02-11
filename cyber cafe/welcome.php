<?php include './lib/loged_strct.php';?>
<title>be positive cyber cafe</title>    
            <div class="body" id="body">
                <div id="innr" align="center">
                    <h1>Welcome <?php 
                    echo $_SESSION['username'];
                    ?>
                    </h1>
                    <h2>Go to <a href="monitor.php" style="background-color: whitesmoke;">Monitor</a> (For Monitoring Cafe)</h2>
                    <h2>Go to <a href="manage.php" style="background-color: whitesmoke;">Manage</a> (For Manage Cafe)</h2>
                    <h2>Go to <a href="cafe_report.php" style="background-color: whitesmoke;">Cafe Report</a>(For View Report by daily,monthly or yearly)</h2>
                </div>
                <div id="searchreasult" align="center"></div>
            </div>            
           

