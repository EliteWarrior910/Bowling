<!--Basic Hud elements-->
<?php
    include './View/header.php'
?>
<!--Button to throw ball-->

<!--Random Number to determine how many pins are knocked-->
<div class="page-grid">
    <?php
        include './Controller/bowling.php'
    ?>

 <!--Score card-->
    <div class="player-grid">
        <div class='score-grid'>
            <!-- Frame rows -->
                <?php
                    include './Controller/score-grid.php'
                ?>
                <div style='grid-column:12; grid-row:1'>
                    <p id='totalScore'></p>
                </div>
            <!-- Frame rows -->
        </div>
        <div>
            <!-- Previous High Score -->
                <?php
                    // check for cookies
                    if(isset($_COOKIE[$cookie_name])) {
                        echo $_COOKIE[$cookie_name];
                    }
                ?>
            <!-- Previous High Score -->
        </div>
    </div>
    <div class="ui-grid">
        <div class="ui-grid__item ui-ball">
            <img src="./View/Public/Images/Bowling.png" style="z-index:2; height: 450px; width: 450px; margin-left: 275px;"  onclick="Choose()">
        </div>
        <div class="ui-grid__item ui-bar">
            <img src="./View/Public/Images/GreyLine.jpg" style="z-index:2; height: 25px; width: 285px; margin-top: 225px;" id="line">
        </div>
        <div class="ui-grid__item ui-arrow">
            <img src="./View/Public/Images/leftArrow.png" style="height: 50px; width: 25px; margin-top: 215px;" id="arrow">
        </div>
    </div>
    <div class='save-form' id='save-form'>
        <center><p>Enter your current Score!</p></center>
        <center><p id='score' name='score'></p></center>
        <center><form method="POST" action="./Controller/cookie.php">
            <input type="textarea" placeholder="Name" name="name">
            <button type="submit" name="submission">Submit Score</button>
        </form></center>
    </div>
</div>

</body>
</html>