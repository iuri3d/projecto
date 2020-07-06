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
                <form id="login-form" action="login.php" method="post">
                    <input type="email" placeholder="email@email.com" name="email" required>
                    <input type="password" class="ipassword" placeholder="Palavra-passe" name="password" required>
                    <span class="btn-show-pass">
					    <i class="fa fa-eye"></i>
					</span>
                    <a href="#">Esqueceu-se da palavra-passe?</a>
                    <div class="login-button">
                        <button type="submit" value="login" class="button" id="login-btn">Entrar</button>
                    </div>
                </form>
                <form id="register-form" action="register.php" method="post">
                    <input type="text" placeholder="Nome" name="name" required>
                    <input type="email" placeholder="email@email.com" name="email" required>
                    <input type="password" class="ipassword" placeholder="Palavra-passe" name="password" required>
                    <span class="btn-show-pass">
					    <i class="fa fa-eye"></i>
					</span>
                    <div class="login-button">
                        <button type="submit" class="button" id="register-btn">Registar</button>
                    </div>
                </form>        
            </div>
        </div>
    </div>

    <?php require_once('../includes/scripts.php'); ?>
</body>
</html>