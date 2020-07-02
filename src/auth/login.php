<?php
require_once('../includes/functions.php');


if (!empty($_POST)) {
    $password   = $_POST['password'];
    $email      = $_POST['email'];

    if (!empty($password) && !empty($email)) {
        $sql = "SELECT name, email, password, token, level FROM users WHERE email = ? AND level >= ? LIMIT 1";

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

                $_SESSION['name'] = $r['name'];
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