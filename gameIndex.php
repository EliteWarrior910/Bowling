<!--Basic Hud elements-->
<?php
    include './View/header.php';
?>

<div class="page-grid">
    <?php
        include './Controller/bowling.php';
    ?>

 <!--Score card-->
    <div class="player-grid">
        <div class='player-grid__item player-name'>
        <?php
            if(!isset($_COOKIE[$cookie_name])) {
                echo "New Player3";
            } else {
                echo "$cookie_name<br>";
                echo "Previous score: " . $_COOKIE[$cookie_name];
            }
        ?>
        </div>
        <div style='grid-column:3;'>
            <p id='totalScore' style="margin-right: 250px, margin-top: 100px;"></p>
        </div>
        <div class='player-grid__item score-grid'>
            <!-- Frame rows -->
                <?php
                    include './Controller/score-grid.php';
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
                        echo "$_COOKIE[$cookie_name]";
                    }
                    else{
                        echo "New Player2";
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
        <center><p id='score'></p></center>
        <center><form method="post">
            <input type="textarea" placeholder="Name" name="name">
            <input type="textarea" placeholder="Score" name="score">
            <input type="submit"></input>
        </form></center>
    </div>
</div>

</body>
</html>