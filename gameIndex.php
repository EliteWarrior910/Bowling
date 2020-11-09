<!--Basic Hud elements-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href=''>
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
    <title>Document</title>
</head>

<body>
<!--Grid to place everything-->



<!--Button to throw ball-->
<div>
    <button id="BowlButton" onclick="Bowl()">Knock those pins!</button>
    <p id="Outcome"></p>
    <!--We could add a hold-the-button function to detemine how good the throw is-->
    <!--If we have enough time, we could add a cheat function.-->


    <!--Random Number to determine how many pins are knocked-->
    <script>
        var Pins=11, Bowls=0, Total = 0, Sets = 1;
        //var Display = "";
        if(Sets<10){
            function Bowl(){
                // if(Sets>10)
                // {
                //     console.log("game ended");
                // }
                //Display += " you rolled ";
                var Scored = Math.floor(Math.random() * Pins + 1);
                Pins = Pins - Scored;
                Bowls++;
                //Display += " " + Scored;
                Total += Scored;
                //Display += "<br> Total: " + Total + "<br>"
                document.getElementById("Outcome").innerHTML = "You knocked over " + Scored + " pins! <br> Total: " + Total;
                if(Pins == 1 || Bowls == 2){
                    Sets++;
                    Pins = 10; Bowls = 0;
                }
            }
        }   
        else if(Sets>10)
        {
            console.log("game ended");
        }
    </script>
</div>
<!--Variable to count current number of pins before moving to next turn-->
<!--We could add another 'player' that the player competes against-->
<!--Do some math with the bowling rules-->


<!--Score counter-->
<!--End game function showing who won-->

</body>
</html>