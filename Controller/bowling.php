<script>    
    
    //split trips the second split bowl if no strike
    var frame = 2, split = 0, resultOne = 0, resultTwo = 0; totalScore = 0;
    //throw result array for score function
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
    //lock array for use in Score function
    function Score(){ //reads results and calculates scores
      if(frame<=11){
        totalScore = 0;
        for (i=scores.length-2; i>=0; i--){
            switch (scores[i][1]){
                case null:
                    if (scores[i][0] >= 0){ //If first split is number, set total for frame to number. If first split is null then break.
                        document.getElementById("total" + (i+2)).innerHTML = scores[i][0];
                    }
                    break;
                case '/': //If next throw scores a number, set score of second split of frame to 10-(firstSplit)+(nextThrow'sScore). Else break
                    if(scores[i+1][0] >= 0){
                        scores[i][1] = (10 - scores[i][0])+scores[i+1][0];
                        document.getElementById("total" + (i+2)).innerHTML = scores[i][0] + scores[i][1];
                    } //Total of spare frame = firstSplit+secondSplit.
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
      }
      else{
        document.getElementById('save-form').style.display = 'block';
        document.getElementById('score').innerHTML = totalScore;
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
            document.getElementById("line").style = "z-index:2; height: 25px; width: 285px; margin-top: "  + (Target - 25) + "px;";
        }
    }

    setInterval(function(){
        if(Holding==true){
            if(Counting<=0) Count = true;
            if(Count==true) {
                Counting += 3;
            }
            if(Counting>=500) Count = false;
            if(Count==false) {
                Counting -= 3;
            }
            document.getElementById("arrow").style = "z-index:2; height: 50px; width: 25px; margin-top:"  + (Counting - 35) + "px;";
        }
    }, 1);

    function Throw(){
        Holding=false;
        /*-------------------------------------------------First Throw----------------------------------------------------*/
        if(split==0){
            if(Target-Counting < 15 && Target-Counting > -15) //Strike
            {
                document.getElementById("secondSplit" + frame).innerHTML = "X";
                //update scores array
                scores[frame-2][0] = 'x';
                scores[frame-2][1] = 'X';
                console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
                console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                frame++;
            }
            if(Target-Counting < 55 && Target-Counting >= 15 || Target-Counting > -55 && Target-Counting <= -15) //8 or 9
            {
                resultOne = Math.floor(Math.random() * 2) + 8;
                document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                //trip split
                split = 1;
                //update scores array
                scores[frame-2][0] = resultOne;
                console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
            }
            if(Target-Counting < 150 && Target-Counting >= 55 || Target-Counting > -150 && Target-Counting <= -55) //3-8
            {
                resultOne = Math.floor(Math.random() * 5) + 3;
                document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                //trip split
                split = 1;
                //update scores array
                scores[frame-2][0] = resultOne;
                console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
            }
            if(Target-Counting < 250 && Target-Counting >= 150 || Target-Counting > -250 && Target-Counting <= -150) //1-3
            {
                resultOne = Math.floor(Math.random() * 3) + 1;
                document.getElementById("firstSplit" + frame).innerHTML = resultOne;
                //trip split
                split = 1;
                //update scores array
                scores[frame-2][0] = resultOne;
                console.log('First split in frame ' + (frame-1) + ' is ' + scores[frame-2][0]);
            }
            if(Target-Counting >= 250 || Target-Counting <= -250) //0
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
        if(split==1){
            Holding=false;
            if(Target-Counting < 15 && Target-Counting > -15) //Spare
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
                if(Target-Counting < 55 && Target-Counting >= 15 || Target-Counting > -55 && Target-Counting <= -15)
                {
                    document.getElementById("secondSplit" + frame).innerHTML = "/";
                    //update scores array
                    scores[frame-2][1] = '/';
                    console.log('Second split in frame ' + (frame-1) + ' is ' + scores[frame-2][1]);
                    //increment frame, un-trip split
                    frame++;
                    split = 0;
                }
                if(Target-Counting >= 55 || Target-Counting <= -55)
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
                if(Target-Counting < 55 && Target-Counting >= 15 || Target-Counting > -55 && Target-Counting <= -15)
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
                if(Target-Counting >= 55 || Target-Counting <= -55){
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
                if(Target-Counting < 55 && Target-Counting >= 15 || Target-Counting > -55 && Target-Counting <= -15){
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
                if(Target-Counting >= 55 || Target-Counting <= -55){
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
                if(Target-Counting < 55 && Target-Counting >= 15 || Target-Counting > -55 && Target-Counting <= -15){
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
                if(Target-Counting >= 55 || Target-Counting <= -55){
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

</script>
