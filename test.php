<html>
  <body>
    <?php
    // initialising score. Variables dont actually need to be initalised, but we're incrementing score so we need to initialise it here.
    $score = 0;

    if (empty($_POST["question1"])) { 
        $question1 = "0"; // if skipped, automatically give answer a score of 0
      } else {
        $question1 = test_input($_POST["question1"]);

        if ($question1 == "option2") {
          $score = ($score += 1); // if they pick two
        } //               increase their score by one
    } //              harders qs increase score by greater amount

    function test_input($data) { // cleans up any data
      $data = trim($data); //unnecessary, since multiple choice
      $data = stripslashes($data); // but DO NOT REMOVE for now
      $data = htmlspecialchars($data);
      return $data;
    }

    ?>

    <h1>IQ Test</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <!-----------------------QUESTION 1----------------------------------------------->
      <h2>Question 1</h2>
      <p><b>What is 1+1? (this is the hardest question ever)<b></p> 

      <input type="radio" name="question1"
      <?php /*opt1: 1*/if (isset($question1) && $question1=="option1") echo "checked";?>
      value="option1">1<br>

      <input type="radio" name="question1"
      <?php if (isset($question1) && $question1=="option2") echo "checked";?>
      value="option2">2<br>

      <input type="radio" name="question1"
      <?php if (isset($question1) && $question1=="option3") echo "checked";?>
      value="option3">3<br>

      <input type="radio" name="question1"
      <?php if (isset($question1) && $question1=="option4") echo "checked";?>
      value="option4">4<br>

      <br><input type="submit" name="submit" value="Finished? Let's mark!">
    </form>

    <?php
    echo "<h2>Your Score:</h2>";
    echo $score;

    ?>

  </body>
</html>