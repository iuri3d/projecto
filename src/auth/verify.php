<?php
require_once('../includes/functions.php');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificação de Conta</title>
  <link rel="stylesheet" href="style/main.css">
</head>
<body>
  <?php
  if (!empty($_GET['token']) && !empty($_GET['email'])) {
      $token   = $_GET['token'];
      $email   = $_GET['email'];

      $sql = "UPDATE users SET level=? WHERE email=? AND token=?";

      $stmt = conn()->prepare($sql);
      if ($stmt->execute([1, $email, $token])) {
          $stmt = null;

          $dir = 'users/'.$token;
          if (!file_exists($dir)) {
              mkdir($dir, 0777, true);
          }


          echo "User verified!";

          $subject = 'Conta verificada';
          $message = '<a href="localhost">Entre na sua conta</a>';
          $output = '<p>A thank you message has been sent to '.$email.'</p>';

          email($email, $subject, $message, $output);
      }
  } else {
      echo "Parametros de confirmação em falta.";
  }

  ?>
</body>
</html>