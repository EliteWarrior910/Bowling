<!--Basic Hud elements-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href='./View/Public/gameCSS.css'>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        *{
            font-family: 'Times New Roman', Times, serif;
        }
        body{
            margin: 0;
        }
    </style>
    <title>Bowling</title>
    <?php
        include './Controller/cookie.php';
    ?>
</head>

<body>

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
    </div>
    <div class="ui-grid">
        <div class="ui-grid__item ui-ball">
            <img src="./View/Public/Bowling.png" style="z-index:2; height: 450px; width: 450px; margin-left: 275px;"  onclick="Choose()">
        </div>
        <div class="ui-grid__item ui-bar">
            <img src="./View/Public/GreyLine.jpg" style="z-index:2; height: 25px; width: 285px; margin-top: 225px;" id="line">
        </div>
        <div class="ui-grid__item ui-arrow">
            <img src="./View/Public/leftArrow.png" style="height: 50px; width: 25px; margin-top: 215px;" id="arrow">
        </div>
    </div>
    <div>
        <center><p>Enter your current Score!</p></center>
        <center><form method="POST" action="./Controller/cookie.php">
            <input type="textarea" placeholder="Name" name="name">
            <button type="submit" name="submition">Submit Score</button>
        </form></center>
    </div>
</div>
<!--End game function showing who won-->

</body>
</html>