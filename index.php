<?php
if(isset($_REQUEST['submit'])) {
  $ans = $_REQUEST['ans'];
  if(!empty($ans)) {
    $ans = calculate($ans);
  }
}

function calculate($ans) {
  $operator = '+';
  $pos = stripos($ans, '+');
  if($pos === true) $operator = '+';
  if($pos === false) {
    $pos = stripos($ans, '-');
    $operator = '-';
  }
  if($pos === false) {
    $pos = stripos($ans, '*');
    $operator = '*';
  }

  if($pos !== false) {
    $tokens = explode($operator, $ans);
    switch($operator) {
      case '+':
        return $tokens[0] + $tokens[1];
        break;
      case '-':
        return $tokens[0] - $tokens[1];
        break;
      case '*':
        return $tokens[0] * $tokens[1];
        break;
      default:
        break;
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>html calculator</title>
</head>
  <body>
    <form name="calculator" method="POST">
      <input type="hidden" name="submit" value="true" >
      <input type="button" value="1" onclick="document.calculator.ans.value+='1'">
      <input type="button" value="2" onclick="document.calculator.ans.value+='2'">
      <input type="button" value="3" onclick="document.calculator.ans.value+='3'">
      <input type="button" value="+" onclick="document.calculator.ans.value+='+'">
      <br>
      <input type="button" value="4" onclick="document.calculator.ans.value+='4'">
      <input type="button" value="5" onclick="document.calculator.ans.value+='5'">
      <input type="button" value="6" onclick="document.calculator.ans.value+='6'">
      <input type="button" value="-" onclick="document.calculator.ans.value+='-'">
      <br>
      <input type="button" value="7" onclick="document.calculator.ans.value+='7'">
      <input type="button" value="8" onclick="document.calculator.ans.value+='8'">
      <input type="button" value="9" onclick="document.calculator.ans.value+='9'">
      <input type="button" value="*" onclick="document.calculator.ans.value+='*'">
      <br>
      <input type="button" value="0" onclick="document.calculator.ans.value+='0'">
      <input type="reset" value="reset">
      <input type="button" value='='
      onclick="document.calculator.ans.value=eval(document.calculator.ans.value)">

      <br>
      <label for="ans">solution</label>
      <input type="textfeild" name="ans" value="<?php echo isset($ans)?$ans:''?>">
    </form>
    <script src="http://code.jquery.com/jquery-2.0.0.js"></script>
  </body>
</html>
