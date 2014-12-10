<?php
/**
 *  Registers the user and redirects to profile
 */
session_start();
include 'database.php';

$firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)) {
  $sql = "INSERT INTO Users (firstname, lastname, email, password)
  VALUES ('".$firstname."', '".$lastname."', '".$email."', '".$password."')";

  if ($conn->query($sql) === TRUE) {
      $_SESSION["userid"] = $conn->insert_id;
      $_SESSION["name"] = $firstname . " " . $lastname;
      header("Location: profile.php?id=" . $conn->insert_id);
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else {
  echo "Error: Invalid fields";
}
$conn->close();
?>