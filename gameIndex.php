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
    <button id="BowlButton" onclick="Bowl()">Knock those pins!</button>
        </div>
        <div id='Livvy'>
    <button id="Bowl2Button" onclick="Choose()">Knock those pins!</button>
        </div>
    <p id="Outcome"></p>
    <p id="Number"></p>
    <!--We could add a hold-the-button function to detemine how good the throw is-->
    <!--If we have enough time, we could add a cheat function.-->


    <!--Random Number to determine how many pins are knocked-->
    <script>
        var testCount = 0;
        setInterval(function(){

            testCount++;
            console.log("Current count: " + testCount);

        }, 3000);        

        //split trips the second split bowl if no strike
        var frame = 2, split = false, resultOne = 0;
        function Bowl(){

            if(split == false && frame < 12){ //FirstSplit.exe
                resultOne = Math.floor(Math.random() * 11);
                console.log('First split result: ' + resultOne);
                if(resultOne == 10){ //strike.exe
                    document.getElementById("secondSplit" + frame).innerHTML = "X";
                    frame++;
                }
                else{ //not strike.exe
                    document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                    //trip split
                    split = true;
                }
            }
            else if(frame < 12){ //SecondSplit.exe
                var resultTwo = Math.floor(Math.random() * (10 - resultOne + 1)); //
                console.log('Second split result: ' + resultTwo);
                if (resultOne + resultTwo >= 10){ //spare.exe
                    document.getElementById("secondSplit" + frame).innerHTML = "/";
                    //increment frame, un-trip split
                    frame++;
                    split = false;
                }
                else {
                    document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                    //increment frame, un-trip split
                    frame++;
                    split = false;
                }
            }
            else{ //game over message
                document.getElementById("Outcome").innerHTML = 'gg ez';
            }
        }

        function Score(){
            //reads results and calculates
        }
            
        var Counting=0, Counter=0, Target=0;
        var Holding = false, Count = false;
        function Choose(){
            if(Holding==false){
                Priming();
            }
            else if(Holding==true){
                Throw();
            }
        }

        function Priming(){
            Holding = true;
            if(Holding==true){
                Target = Math.floor(Math.random() * 1001)
                setInterval
            }
            document.getElementById("Number").innerHTML = "Target: " + Target + "<br>Current: " + Counter;
        }

        function Throw(){
            if(split==false){
                Holding=false;
                if(Target-Counting < 25 && Target-Counting > -25) //Strike
                {
                    document.getElementById("secondSplit" + frame).innerHTML = "X";
                    frame++;
                }
                if(Target-Counting < 75 && Target-Counting >= 25 || Target-Counting > -75 && Target-Counting <= -25) //8 or 9
                {
                    resultOne = Math.floor(Math.random() * 2) + 8;
                }
                if(Target-Counting < 200 && Target-Counting >= 75 || Target-Counting > -200 && Target-Counting <= -75) //3-8
                {
                    resultOne = Math.floor(Math.random() * 5) + 3;
                }
                if(Target-Counting < 400 && Target-Counting >= 200 || Target-Counting > -400 && Target-Counting <= -200) //1-3
                {
                    resultOne = Math.floor(Math.random() * 3) + 1;
                }
                if(Target-Counting >= 400 || Target-Counting <= -400) //0
                {
                    resultOne = 0;
                }
            }
            if(split==true){
                Holding=false;
                if(Target-Counting < 25 && Target-Counting > -25) //Spare
                {
                    document.getElementById("secondSplit" + frame).innerHTML = "/";
                    //increment frame, un-trip split
                    frame++;
                    split = false;
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