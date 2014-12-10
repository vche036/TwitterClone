<?php
/**
 *  Profile
 *  Shows user profile and comments
 */
session_start();
include 'database.php';
include 'user.php';

if(isset($_GET["id"])) :
  $userid = mysqli_real_escape_string($conn, $_GET["id"]);
  $user = new User($userid);
?>
<!doctype html>
<html>
<head>
  <title>Twitter Clone</title>
</head>
<body>
  <?php if(isset($_SESSION["userid"])) : ?>
    <p>Logged in as <a href="profile.php?id=<?php echo $_SESSION["userid"] ?>"><b><?php echo $_SESSION["name"]; ?></b></a>.
      <a href="logout.php">Logout</a></p>
  <?php endif; ?>  
  <h1><?php echo $user->firstname . " " . $user->lastname; ?></h1>
  <form action="followuser.php" method="post">
    <input type="hidden" name="userid" value="<?php echo $userid ?>" />
    <p>
      <?php echo $user->getNumFollowing(); ?> Following |
      <?php echo $user->getNumFollowers(); ?> Followers
      <?php $user->getFollowButton(); ?>
    </p>
  </form>  
  <?php if(isset($_SESSION["userid"]) && $_SESSION["userid"] == $userid) : ?>
    <form action="addcomment.php" method="post">
      <textarea name="comment"></textarea>
      <br />
      <input type="submit" value="Submit" />
      <br />
      <br />
    </form>
  <?php endif; ?>
  <?php $user->getComments(); ?>
  <?php $user->getOtherUsers(); ?>
</body>
</html>
<?php endif; ?>
<?php $conn->close(); ?>