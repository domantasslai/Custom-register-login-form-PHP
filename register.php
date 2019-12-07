<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

  $account = new Account($con);


  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  function getInputValue($name){
    if (isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Spotify</title>

    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js">

    </script>

  </head>
  <body>
    <?php if (isset($_POST['registerButton'])): ?>
      <script>
          $(document).ready(function(){
            $("#loginForm").hide();
            $("#registerForm").show();
          });
      </script>
    <?php else: ?>
      <script>
          $(document).ready(function(){
            $("#loginForm").show();
            $("#registerForm").hide();
          });
      </script>
    <?php endif; ?>


    <div id="background">
      <div id="loginContainer">
        <div id="inputContainer">
          <form id="loginForm" class="" action="register.php" method="POST">
            <h2>Login to your account</h2>
            <p>
              <?php echo $account->getError(Constants::$loginFailed); ?>
              <label for="loginUsername">Username</label>
              <input id="loginUsername" type="text" name="loginUsername" placeholder="e.g. domantasSlaiciunas" required>
            </p>
            <p>
              <label for="loginPassword">Password</label>
              <input id="loginPassword" type="password" name="loginPassword" placeholder="Your password" required>
            </p>
            <button type="submit" name="loginButton">Login</button>

            <div class="hasAccountText">
              <span id="hideLogin">Don't have an account yet? Signup here</span>
            </div>
          </form>




          <form id="registerForm" class="" action="register.php" method="POST">
            <h2>Create your free account</h2>
            <p>
              <?php echo $account->getError(Constants::$usernameCharacters); ?>
              <?php echo $account->getError(Constants::$usernameTaken); ?>
              <label for="username">Username</label>
              <input id="username" type="text" name="username" value="<?php getInputValue('username'); ?>" placeholder="e.g. domantasSlaiciunas" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$firstNameCharacters); ?>
              <label for="firstName">First name</label>
              <input id="firstName" type="text" name="firstName" value="<?php getInputValue('firstName'); ?>" placeholder="e.g. Domantas" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$lastNameCharacters); ?>
              <label for="lastName">Last name</label>
              <input id="lastName" type="text" name="lastName" value="<?php getInputValue('lastName'); ?>" placeholder="e.g. Slaiciunas" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
              <?php echo $account->getError(Constants::$emailInvalid); ?>
              <?php echo $account->getError(Constants::$emailTaken); ?>
              <label for="email">Email</label>
              <input id="email" type="email" name="email" value="<?php getInputValue('email'); ?>" placeholder="e.g. domantasslai@gmail.com" required>
            </p>
            <p>
              <label for="email2">Confirm email</label>
              <input id="email2" type="email" name="email2" value="<?php getInputValue('email2'); ?>" placeholder="e.g. domantasslai@gmail.com" required>
            </p>


            <p>
              <?php echo $account->getError(Constants::$passwordDoNoMatch); ?>
              <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
              <?php echo $account->getError(Constants::$passwordCharacters); ?>
              <label for="password">Password</label>
              <input id="password" type="password" name="password" placeholder="Your password" required>
            </p>

            <p>
              <label for="password2">Confirm password</label>
              <input id="password2" type="password" name="password2" placeholder="Confirm your password" required>
            </p>
            <button type="submit" name="registerButton">SIGN UP</button>

            <div class="hasAccountText">
              <span id="hideRegister">Already have an account? Log in here</span>
            </div>

          </form>

        </div>

        <div id="loginText">
          <h1>Get greate music right now </h1>
          <h2>Listen to loads of songs for free</h2>
          <ul>
            <li>Disvore music you'll fall in love with</li>
            <li>Create your </li>
            <li>Disvore music you'll fall in love with</li>
          </ul>
        </div>

      </div>
    </div>

  </body>
</html>
