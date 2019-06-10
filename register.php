<?php
include "includes/classes/Account.php";
include "includes/classes/Constants.php";
include "includes/config.php";

$account = new Account($con);

include "includes/handlers/login-handler.php";
include "includes/handlers/register-handler.php";

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Spotify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css">
  <script src="main.js"></script>
</head>
<body>
    <div id="inputContainer">
      <form action="register.php" id="loginForm" method="POST">
        <h2>Login To Your Account</h2>
        <p>
        <label for="loginUsername">Username</label>
        <input type="text" name="loginUsername" id="loginUsername" placeholder="e.g. bartsimpson" required>
        </p>
        <p>
        <label for="loginPassword">Password</label>
        <input type="password" name="loginPassword" id="loginPassword" required>
        </p>
        <p>
        <input type="submit" name="loginButton" value="Login">
        </p>
      </form>

      <form action="register.php" id="registerForm" method="POST">
        <h2>Create Your Free Account</h2>
        <p>
          <?php echo $account->getError(Constants::$usernameLength) ?>
          <label for="username">Username</label>
          <input type="text" name="username" id="username" placeholder="e.g. bartsimpson" value="<?php getInputValue('username')?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$firstNameLength) ?>
          <label for="firstName">First Name</label>
          <input type="text" name="firstName" id="firstName" placeholder="Bart" value="<?php getInputValue('firstName')?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$lastNameLength) ?>
          <label for="lastName">Last Name</label>
          <input type="text" name="lastName" id="lastName" placeholder="Simpson" value="<?php getInputValue('lastName')?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$emailInvalid) ?>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" placeholder="bart@gmail.com" value="<?php getInputValue('email')?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$emailDoNotMatch) ?>
          <label for="email">Email Confirmation</label>
          <input type="email" name="emailConfirmation" id="emailConfirmation" placeholder="bart@gmail.com" value="<?php getInputValue('emailConfirmation')?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$passwordNotAlphanumeric) ?>
          <?php echo $account->getError(Constants::$passwordLength) ?>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="Your password" value="<?php getInputValue('password')?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
          <label for="password">Confirm Password</label>
          <input type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="Your password" value="<?php getInputValue('passwordConfirmation')?>" required>
        </p>
        <p>
        <input type="submit" name="registerButton" value="Sign Up">
        </p>
      </form>
    </div>
</body>
</html>