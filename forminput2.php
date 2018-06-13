<!DOCTYPE html>

<html>
  <head>
  <link rel="stylesheet" href="styles.css">
  <title>Binary to Decimal</title>
  </head>


  <body>

    <h1>Binary to Decimal</h1>

    <?php
       // define variables and set to empty values
       $arg1 = $arg2 = $output = $retc = "";

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $arg1 = test_input($_POST["arg1"]);
         $arg2 = test_input($_POST["arg2"]);
         exec("/usr/lib/cgi-bin/student3/binToDec " . $arg1 . " " . $arg2, $output, $retc); 
       }

       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Input: <input type="text" name="arg1"><br>
      Decimal or Binary? 0 for decimal to binary and 1 for binary to decimal: <input type="text" name="arg2"><br>
      <input type="submit">
    </form>

    <?php
       echo "<h2>Your input:</h2>";
       echo $arg1;
       echo "<br>";
       echo $arg2;
       echo "<br>";
       
       echo "<h2>C Program Output:</h2>";
       foreach ($output as $line) {
         echo $line;
         echo "<br>";
       }
       
       echo "<h2>C Program Return Code:</h2>";
       echo $retc;
      
     ?>
    
  </body>
</html>
