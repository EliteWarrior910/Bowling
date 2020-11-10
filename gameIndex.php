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
</head>

<body>
<!--Grid to place everything-->



<!--Button to throw ball-->
<!--We could add a hold-the-button function to detemine how good the throw is-->
<!--If we have enough time, we could add a cheat function.-->


<!--Random Number to determine how many pins are knocked-->
<div>
        <div id='Divvy'>
    <button id="BowlButton" onclick="Choose()">Knock those pins!</button>
        </div>
        <div id='Livvy'>
    <button id="Bowl2Button" onclick="Bowl2()">Knock those pins!</button>
        </div>
    <p id="Outcome"></p>
    <!--We could add a hold-the-button function to detemine how good the throw is-->
    <!--If we have enough time, we could add a cheat function.-->


    <!--Random Number to determine how many pins are knocked-->
    <script>
        //split trips the second split bowl if no strike
        var frame = 2, split = 0, resultOne = 0, resultTwo = 0;
        //array for score function
        var scores = [
            [null, null],
            [null, null],
            [null, null],
            [null, null],
            [null, null],
            [null, null],
            [null, null],
            [null, null],
            [null, null],
            [null, null],
            [0, 0]
        ];
        //var Display = "";
        function Bowl(){

            if(split == 0 && frame < 12){ //FirstSplit.exe
                // if(frame>10)
                // {
                //     console.log("game ended");
                // }
                //Display += " you rolled ";
                resultOne = Math.floor(Math.random() * 11);
                //console.log('First split result: ' + resultOne);
                //Display += "<br> Total: " + Total + "<br>"
                if(resultOne == 10){ //strike.exe
                    document.getElementById("secondSplit" + frame).innerHTML = "X";
                    //update scores array
                    scores[frame-2][0] = 'x';
                    scores[frame-2][1] = 'X';
                    console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
                    console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                    frame++;
                }
                else{ //not strike.exe
                    document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                    //trip split
                    split = 1;
                    //update scores array
                    scores[frame-2][0] = resultOne;
                    console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
                }
            }
            else if(frame < 12){ //SecondSplit.exe
                resultTwo = Math.floor(Math.random() * (10 - resultOne + 1)); //
                //console.log('Second split result: ' + resultTwo);
                if (resultOne + resultTwo >= 10){ //spare.exe
                    document.getElementById("secondSplit" + frame).innerHTML = "/";
                    //update scores array
                    scores[frame-2][1] = '/';
                    console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                    //increment frame, un-trip split
                    frame++;
                    split = 0;
                }
                else {
                    document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                    //update scores array
                    scores[frame-2][1] = resultTwo;
                    console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                    //increment frame, un-trip split
                    frame++;
                    split = 0;
                }
            }
            else{ //game over message
                document.getElementById("Outcome").innerHTML = 'gg ez';
            }
            Score();
        }

        function Score(){ //reads results and calculates scores
            var totalScore = 0;
            for (i=scores.length-2; i>=0; i--){
                console.log('Test of score function');
                switch (scores[i][1]){
                    case null:
                        console.log('frame ' + i + ' is null');
                        if (scores[i][0] >= 0){
                            document.getElementById("total" + (i+2)).innerHTML = scores[i][0];
                        }
                        break;
                    case '/':
                        if(scores[i+1][0] >= 0 && scores[i+1][0] != null){
                            scores[i][1] = (10 - scores[i][0])+scores[i+1][0];
                            document.getElementById("total" + (i+2)).innerHTML = scores[i][0] + scores[i][1];
                        }
                        break;
                    case 'X':
                        if(scores[i+1][0] >= 0 && scores[i+1][0] != null&& scores[i+1][0] < 10 && scores[i+1][1] >= 0 && scores[i+1][1] != null){
                            scores[i][0] = scores[i+1][0] + scores[i+1][1] + 10;
                            scores[i][1] = 0;
                            document.getElementById("total" + (i+2)).innerHTML = scores[i][0];
                        }
                        else if (scores[i+1][0] >= 10 && scores[i+1][0] != null){
                            scores[i][0] = scores[i+1][0] + scores[i+2][0] + 10;
                            scores[i][1] = 0;
                            document.getElementById("total" + (i+2)).innerHTML = scores[i][0];
                        }
                        break;                    
                    default:
                        console.log('Default case for frame' + i)
                        document.getElementById("total" + (i+2)).innerHTML = scores[i][0] + scores[i][1];
                        break;
                }
                if (scores[i][1] >= 0){
                    totalScore += (scores[i][0] + scores[i][1]);
                }
            }
            document.getElementById('totalScore').innerHTML = totalScore;

        }
            
            var Tid = 0, Speed = 100;

            function toggleOn(){
                if(Tid==0){
                    Tid=setInterval('ThingToDo()',Speed);
                }
            }
            function toggleOff(){
                if (Tid != 0){
                    clearInterval(Tid);
                    Tid=0
                }
            }
            function Thing(){
                
            }
    </script>
</div>
<!--Variable to count current number of pins before moving to next turn-->
<!--We could add another 'player' that the player competes against-->
<!--Do some math with the bowling rules-->


<!--Score card-->
    <div class='score-grid'>
        <!-- Frame rows -->
            <div style='grid-column:1; grid-row: 1; display:grid; margin-right: 10px; margin-left: 10px'>
                <!-- Name -->
                <p style='margin: auto'>Zach</p>
            </div>
            <!-- Populate the table by using Javascript to write to td id's plus the index number, starting at 2 and ending at 11. -->
            <?php //place frame grids
                for($index = 2; $index < 12; $index++){
                    echo"
                        <div class='frame-grid' style='grid-column: $index'>
                            <table class='frame-table'>
                                <tr>
                                    <!-- Split 1 -->
                                    <td id='firstSplit$index'></td>
                                    <!-- Split 2 -->
                                    <td id='secondSplit$index'></td>
                                </tr>
                                <tr>
                                    <!-- Frame Total -->
                                    <td colspan='2' id='total$index'></td>
                                </tr>
                            </table>
                        </div>
                    ";                
                }
            ?>
            <div style='grid-column:12; grid-row:1'>
                <p id='totalScore'></p>
            </div>
        <!-- Frame rows -->
    </div>
<!--End game function showing who won-->

</body>
</html>