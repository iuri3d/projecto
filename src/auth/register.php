<?php
require_once('../includes/functions.php');


    if (!empty($_POST)) {
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

                $subject = 'Verificação de conta';
                $message = 'Clique no link para verificar a sua conta: <br><b><a href="localhost/auth/verify.php?token='.$token.'&email='.$email.'">Verificar Conta</a></b>';
                $output = '<p>Um email de confirmação foi enviado para'.$email.'</p>';

                email($email, $subject, $message, $output);
            }
        } else {
            echo "All fields are required";
        }
    }
?>