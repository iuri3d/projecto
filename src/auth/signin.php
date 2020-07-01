<?php
require_once('../includes/functions.php');

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

  <link rel="stylesheet" href="/styles/styles.css">
</head>
<body>
    <div class="container">
        <div class="panel">
            <div class="form-header">
                <div id="login-form-link" class="active">Login</div>
                <div id="register-form-link">Registar</div>
            </div>
            <div class="form-body">
                <form id="login-form" action="signin.php" method="post">
                    <input type="email" placeholder="email@email.com" name="email" required>
                    <input type="password" placeholder="Palavra-passe" name="password" required>
                    <a href="#">Esqueceu-se da palavra-passe?</a>
                    <div class="login-button">
                        <button type="submit" class="button" id="login-btn">Entrar</button>
                    </div>
                </form>
                <form id="register-form" action="signin.php" method="post">
                    <input type="text" placeholder="Nome" name="name" required>
                    <input type="email" placeholder="email@email.com" name="email" required>
                    <input type="password" placeholder="Palavra-passe" name="password" required>
                    <div class="login-button">
                        <button type="submit" class="button" id="register-btn">Registar</button>
                    </div>
                </form>

                <?php

                    ////Registration PHP
                    /*if (!empty($_POST)) {
                        $password   = $_POST['password'];
                        $email      = $_POST['email'];
                        $name      = $_POST['name'];

                        if (!empty($password) && !empty($email)) {
                            $password   = password_hash($_POST['password'], PASSWORD_BCRYPT);
                            $level      = 0;
                            $token      = sha1(bin2hex(date('U')));

                            $sql = "INSERT INTO users (name, email, password, token, level) VALUES (?, ?, ?, ?, ?)";

                            $stmt = conn()->prepare($sql);

                            if ($stmt->execute([$name,$email, $password, $token, $level])) {
                                $stmt = null;
                                echo "User signed up!";

                    // $subject = 'Verify your account';
                    // $message = 'Click the link to verify your account: <br><b><a href=https://www.app.com/verify.php?token='.$token.'&email='.$email.'>'.$token.'</a></b>';
                    // $output = '<p>A confirmation message has been sent to '.$email.'</p>';

                    // email($email, $subject, $message, $output);
                            }
                        } else {
                            echo "All fields are required";
                        }
                    }*/

                    if (!empty($_POST)) {
                        $password   = $_POST['password'];
                        $email      = $_POST['email'];
            
                        if (!empty($password) && !empty($email)) {
                            $sql = "SELECT email, password, token, level FROM users WHERE email = ? AND level > ? LIMIT 1";
            
                            $stmt = conn()->prepare($sql);
                            if ($stmt->execute([$email, 0])) {
                                $n = $stmt->rowCount();
                                $r = $stmt->fetch();
            
                                $stmt = null;

                                echo ($n);

                                if ($n === 1 && password_verify($password, $r['password'])) {
                                    echo('entrou no session');
                                    session_start();
                                    //session_regenerate_id();
            
                                    $_SESSION['loggedin'] = true;
            
                                    $_SESSION['email'] = $r['email'];
                                    $_SESSION['token'] = $r['token'];
                                    $_SESSION['level'] = $r['level'];
            
                                    header("Location: ../index.php");
                                } else {
                                    echo 'A autenticação falhou.';
                                }
                            }
                        } else {
                            echo "All fields are required";
                        }
                    }

                ?>        
            </div>
        </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
</body>
</html>