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
                <form id="login-form" action="" method="post">
                    <input type="email" placeholder="email@email.com" required>
                    <input type="password" placeholder="Palavra-passe" required>
                    <a href="#">Esqueceu-se da palavra-passe?</a>
                    <div class="login-button">
                        <button type="submit" class="button">Entrar</button>
                    </div>
                </form>
                <form id="register-form" action="" method="post">
                    <input type="text" placeholder="Nome" required>
                    <input type="email" placeholder="email@email.com" required>
                    <input type="password" placeholder="Palavra-passe" required>
                    <div class="login-button">
                        <button type="submit" class="button">Registar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
</body>
</html>