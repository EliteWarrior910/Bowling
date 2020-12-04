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
    <div id='Livvy'>
        <button id="Bowl2Button" onclick="Choose()">Knock those pins!</button>
    </div>
    <p id="Outcome"></p>
    <p id="Number"></p>
    <!--We could add a hold-the-button function to detemine how good the throw is-->
 


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
                Target = Math.floor(Math.random() * 501)
                Counting = 0;
            }
        }

        setInterval(function(){
            if(Holding==true){
                if(Counting<=0) Count = true;
                if(Count==true) Counting++;
                if(Counting>=500) Count = false;
                if(Count==false) Counting--;
                document.getElementById("Number").innerHTML = "Target: " + Target + "<br>Current: " + Counting;
            }
        }, 5);

        function Throw(){
            Holding=false;
            /*-------------------------------------------------First Throw----------------------------------------------------*/
            if(split==false){
                if(Target-Counting < 25 && Target-Counting > -25) //Strike
                {
                    document.getElementById("secondSplit" + frame).innerHTML = "X";
                    //update scores array
                    scores[frame-2][0] = 'x';
                    scores[frame-2][1] = 'X';
                    console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
                    console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                    frame++;
                }
                if(Target-Counting < 75 && Target-Counting >= 25 || Target-Counting > -75 && Target-Counting <= -25) //8 or 9
                {
                    resultOne = Math.floor(Math.random() * 2) + 8;
                    document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                    //trip split
                    split = 1;
                    //update scores array
                    scores[frame-2][0] = resultOne;
                    console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
                }
                if(Target-Counting < 200 && Target-Counting >= 75 || Target-Counting > -200 && Target-Counting <= -75) //3-8
                {
                    resultOne = Math.floor(Math.random() * 5) + 3;
                    document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                    //trip split
                    split = 1;
                    //update scores array
                    scores[frame-2][0] = resultOne;
                    console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
                }
                if(Target-Counting < 400 && Target-Counting >= 200 || Target-Counting > -400 && Target-Counting <= -200) //1-3
                {
                    resultOne = Math.floor(Math.random() * 3) + 1;
                    document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                    //trip split
                    split = 1;
                    //update scores array
                    scores[frame-2][0] = resultOne;
                    console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
                }
                if(Target-Counting >= 400 || Target-Counting <= -400) //0
                {
                    resultOne = 0;
                    document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                    //trip split
                    split = 1;
                    //update scores array
                    scores[frame-2][0] = resultOne;
                    console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
                }
            }
            /*--------------------------------------------------------------Second Throw-----------------------------------------------------------------------------------*/
            if(split==true){
                Holding=false;
                if(Target-Counting < 25 && Target-Counting > -25) //Spare
                {
                    document.getElementById("secondSplit" + frame).innerHTML = "/";
                    //update scores array
                    scores[frame-2][1] = '/';
                    console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                    //increment frame, un-trip split
                    frame++;
                    split = 0;
                }
                // Results1 = 9
                if(resultOne == 9){
                    if(Target-Counting < 75 && Target-Counting >= 25 || Target-Counting > -75 && Target-Counting <= -25)
                    {
                        document.getElementById("secondSplit" + frame).innerHTML = "/";
                        //update scores array
                        scores[frame-2][1] = '/';
                        console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                        //increment frame, un-trip split
                        frame++;
                        split = 0;
                    }
                    if(Target-Counting >= 75 || Target-Counting <= -75)
                    {
                        resultTwo = 0;
                        document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                        //update scores array
                        scores[frame-2][1] = resultTwo;
                        console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                        //increment frame, un-trip split
                        frame++;
                        split = 0;
                    }
                }
                if(resultOne == 8 || resultOne == 7 || resultOne == 6){
                    if(Target-Counting < 75 && Target-Counting >= 25 || Target-Counting > -75 && Target-Counting <= -25)
                    {
                        resultTwo = Math.floor(Math.random() * (10 - resultOne + 1));
                        if(resultTwo < (resultOne * (1/8))){
                            resultTwo = resultTwo + 2;
                        }
                        document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                        //update scores array
                        scores[frame-2][1] = resultTwo;
                        console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                        //increment frame, un-trip split
                        frame++;
                        split = 0;
                    }
                    if(Target-Counting >= 75 || Target-Counting <= -75){
                        resultTwo = Math.floor(Math.random() * (10 - resultOne + 1));
                        if(resultTwo >= (resultOne * (1/8))){
                            resultTwo = 1;
                        }
                        document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                        //update scores array
                        scores[frame-2][1] = resultTwo;
                        console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                        //increment frame, un-trip split
                        frame++;
                        split = 0;
                    }
                }
                if(resultOne == 5 || resultOne == 4 || resultOne == 3){
                    if(Target-Counting < 75 && Target-Counting >= 25 || Target-Counting > -75 && Target-Counting <= -25){
                        resultTwo = Math.floor(Math.random() * (10 - resultOne + 1));
                            if(resultTwo <= 1){
                                resultTwo = resultTwo + 3;
                            }
                        document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                        //update scores array
                        scores[frame-2][1] = resultTwo;
                        console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                        //increment frame, un-trip split
                        frame++;
                        split = 0;
                    }
                    if(Target-Counting >= 75 || Target-Counting <= -75){
                        resultTwo = Math.floor(Math.random() * (10 - resultOne + 1));
                        if(resultTwo > 2){
                            resultTwo = 2;
                        }
                        document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                        //update scores array
                        scores[frame-2][1] = resultTwo;
                        console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                        //increment frame, un-trip split
                        frame++;
                        split = 0;
                    }
                }
                if(resultOne == 2 || resultOne == 1 || resultOne == 0){
                    if(Target-Counting < 75 && Target-Counting >= 25 || Target-Counting > -75 && Target-Counting <= -25){
                        resultTwo = Math.floor(Math.random() * (10 - resultOne + 1));
                            if(resultTwo <= 4){
                                resultTwo = resultTwo + 3;
                            }
                        document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                        //update scores array
                        scores[frame-2][1] = resultTwo;
                        console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                        //increment frame, un-trip split
                        frame++;
                        split = 0;
                    }
                    if(Target-Counting >= 75 || Target-Counting <= -75){
                        resultTwo = Math.floor(Math.random() * (10 - resultOne + 1));
                        if(resultTwo > 4){
                            resultTwo = 2;
                        }
                        document.getElementById("secondSplit" + frame).innerHTML = resultTwo;
                        //update scores array
                        scores[frame-2][1] = resultTwo;
                        console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                        //increment frame, un-trip split
                        frame++;
                        split = 0;
                    }
                }
            }
            Score();
        }
/*----------------------------------------------------------Possible Cookie Function------------------------------------------------*/
    
/*----------------------------------------------------------Possible Cookie Function------------------------------------------------*/
    </script>
</div>
<!--We could add another 'player' that the player competes against-->


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