<?php
/**
 *  Index
 *  Registration and login
 */
session_start();
if(isset($_SESSION["userid"])) {
  header("Location: profile.php?id=" . $_SESSION["userid"]);
}
?>
<html>
<head>
  <title>Twitter Clone</title>
</head>
<body>
  <h1>Twitter Clone</h1>
  <form action="signup.php" method="post">
    <fieldset>
      <legend>Sign Up:</legend>
      First name:<br>
      <input type="text" name="firstname" value="">
      <br>
      Last name:<br>
      <input type="text" name="lastname" value="">
      <br>
      Email:<br>
      <input type="text" name="email" value="">
      <br>
      Password:<br>
      <input type="password" name="password" value="">
      <br><br>
      <input type="submit" value="Submit">
    </fieldset>
  </form>
  <form action="login.php" method="post">
    <fieldset>
      <legend>Login:</legend>
      Email:<br>
      <input type="text" name="email" value="">
      <br>
      Password:<br>
      <input type="password" name="password" value="">
      <br><br>
      <input type="submit" value="Submit">
    </fieldset>
  </form>
</body>
</html>