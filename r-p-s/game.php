<?php
// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}
// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}
// Set up the values for the game...
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;
$computer = 0; // Hard code the computer to rock
// TODO: Make the computer be random
// $computer = rand(0,2);
// This function takes as its input the computer and human play
// and returns "Tie", "You Lose", "You Win" depending on play
// where "You" is the human being addressed by the computer
function check($computer, $human) {
    // For now this is a rock-savant checking function
    // TODO: Fix this
    if ( $human == 0 ) {
        return "Tie";
    } else if ( $human == 1 ) {
        return "You Win";
    } else if ( $human == 2 ) {
        return "You Lose";
    }
    return false;
}
// Check to see how the play happenned
$result = check($computer, $human);
?>
<!DOCTYPE html>
<html>
<style>
body {
  background-image: url("bg.jpg");
  background-repeat: no-repeat;
}
</style>
<head>
<title> Rock, Paper, Scissors Game</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container"><div class="container">
<!--css1 --><meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=brick-sign">
<style>
.w3-lobster {
  font-family: "Lobster", Sans-serif;
  font-color:"red"
}
</style>
<body>
<!-- heading-->
<div class="w3-container w3-lobster font-effect-brick-sign">
  <p class="w3-xxxlarge">
Rock Paper Scissors
<?php
if ( isset($_REQUEST['name']) ) {
    echo "<p>Welcome: ";
    echo htmlentities($_REQUEST['name']);
    echo "</p>\n";
}
?>
<form method="post"  >
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<style>
.button {
  background-color: #F1C40F; /* Green */
  border: none;
  color: black ;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
<input type="submit" class="button button2" value="Play">
<input type="submit" class="button button2" name="logout" value="Logout">
</form>

<pre>
<?php
if ( $human == -1 ) {
    print "Please select a strategy and press Play.\n";
} 

else if ( $human == 3 ) {
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            print "Human=$names[$h]\t Computer=$names[$c] \t Result=$r\n";
        }
    }
} else {
    print "Your Play=$names[$human] \t Computer Play=$names[$computer] \tResult=$result\n";
}
?>
</pre>
</div>
</body>
</html>