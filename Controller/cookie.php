<script>
  function saveScore(){
    document.cookie = cookieScore;
    document.getElementById("score").innerHTML = "Your score of " + cookieScore + " has been saved.";
  }
</script>