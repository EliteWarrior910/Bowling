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
    <button id="BowlButton" onclick="Bowl()">Knock those pins!</button>
    <p id="Outcome"></p>
    <!--We could add a hold-the-button function to detemine how good the throw is-->
    <!--If we have enough time, we could add a cheat function.-->


    <!--Random Number to determine how many pins are knocked-->
    <script>
        //split trips the second split bowl if no strike
        var frame = 2, split = "f";
        //var Display = "";
        function Bowl(){

            if(split == "f" && frame < 12){ //FirstSplit.exe
                // if(frame>10)
                // {
                //     console.log("game ended");
                // }
                //Display += " you rolled ";
                var resultOne = Math.floor(Math.random() * 11);
                //Display += "<br> Total: " + Total + "<br>"
                if(resultOne == 10){ //strike.exe
                    document.getElementById("secondSplit" + frame).innerHTML = "X";
                    frame++;
                }
                else{ //not strike.exe
                    document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                    split = "t";
                }
            }
            else if(frame < 12){ //SecondSplit.exe
                var resultTwo = Math.floor(Math.random() * 11 - resultOne);
                if (resultOne + resultTwo >= 10){ //spare.exe
                    document.getElementById("secondSplit" + frame).innerHTML = "/";
                    //increment frame, un-trip split
                    frame++;
                    split = "f";
                }
                else {
                    document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                    //increment frame, un-trip split
                    frame++;
                    split = "f";
                }
            }
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
        <!-- Frame rows -->
    </div>
<!--End game function showing who won-->

</body>
</html>