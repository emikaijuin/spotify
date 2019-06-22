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
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/register.css">
  <link href="https://fonts.googleapis.com/css?family=Cabin:400,700&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>
</head>
<body>
  <?php
if (isset($_POST['registerButton'])) {
    echo '<script>
        $(document).ready(function() {
          $("#loginForm").hide();
          $("#registerForm").show();
        });
      </script>';
} else {
    echo '<script>
        $(document).ready(function() {
          $("#loginForm").show();
          $("#registerForm").hide();
        });
      </script>';
}
?>
  <div id="background">
    <div id="loginContainer">
      <div id="inputContainer">
        <form action="register.php" id="loginForm" method="POST">
          <h2>Login To Your Account</h2>
          <p>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$loginFailed) ?>
            </span>
            <label for="loginUsername">Username</label>
            <input type="text" name="loginUsername" id="loginUsername" placeholder="e.g. bartsimpson" value="<?php getInputValue('loginUsername')?>" required>
          </p>
            <p>
              <label for="loginPassword">Password</label>
            <input type="password" name="loginPassword" id="loginPassword" required>
          </p>
          <p>
            <input type="submit" name="loginButton" value="Login">
          </p>
          <div class="hasAccountText">
            <span id="hideLogin">Don't have an account yet? Sign up here.</span>
          </div>
        </form>

        <form action="register.php" id="registerForm" method="POST">
          <h2>Create Your Free Account</h2>
          <p>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$usernameLength) ?>
            </span>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$usernameTaken) ?>
            </span>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="e.g. bartsimpson" value="<?php getInputValue('username')?>" required>
          </p>
          <p>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$firstNameLength) ?>
            </span>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" placeholder="Bart" value="<?php getInputValue('firstName')?>" required>
          </p>
          <p>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$lastNameLength) ?>
            </span>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" placeholder="Simpson" value="<?php getInputValue('lastName')?>" required>
          </p>
          <p>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$emailInvalid) ?>
            </span>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$emailTaken) ?>
            </span>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="bart@gmail.com" value="<?php getInputValue('email')?>" required>
          </p>
          <p>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$emailDoNotMatch) ?>
            </span>
            <label for="email">Email Confirmation</label>
            <input type="email" name="emailConfirmation" id="emailConfirmation" placeholder="bart@gmail.com" value="<?php getInputValue('emailConfirmation')?>" required>
          </p>
          <p>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$passwordNotAlphanumeric) ?>
            </span>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$passwordLength) ?>
            </span>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Your password" value="<?php getInputValue('password')?>" required>
          </p>
          <p>
            <span class="errorMessage">
              <?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
            </span>
            <label for="password">Confirm Password</label>
            <input type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="Your password" value="<?php getInputValue('passwordConfirmation')?>" required>
          </p>
          <p>
            <input type="submit" name="registerButton" value="Sign Up">
          </p>
          <div class="hasAccountText">
            <span id="hideRegister">Already have an account? Login here.</span>
          </div>
        </form>
      </div>

      <div id="loginText">
        <h1>Get great music, right now</h1>
        <h2>Listen to loads of songs for free.</h2>
        <ul>
          <li>Discover music you'll fall in love with</li>
          <li>Create your own playlists</li>
          <li>Follow artists to keep up to date</li>
        </ul>
      </div>
    </div>
  </div>

</body>
</html>

