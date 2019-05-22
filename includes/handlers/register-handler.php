<?php
  function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
  }

  function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
  }

  function sanitizeFormPassword($inputText) {
    $inputText = strip_tags($inputText);
    return $inputText;
  }

  if(isset($_POST['registerButton'])) {
    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $emailConfirmation = sanitizeFormString($_POST['emailConfirmation']);
    $password = sanitizeFormPassword($_POST['password']);
    $passwordConfirmation = sanitizeFormPassword($_POST['passwordConfirmation']);

    $wasSuccessful = $account->register($username,$firstName,$lastName,$email,$emailConfirmation,$password,$passwordConfirmation);

    if ($wasSuccessful) {
      header("Location: index.php");
    }
  }

?>