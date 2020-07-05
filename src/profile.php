<?php
    session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: auth/sign.php');
        exit;
    } else {

    require_once('includes/functions.php');
    require_once('includes/head.php');
    }
?>
<body>
<?php require_once('includes/navbar.php'); ?>
<?php require_once('includes/profile_page.php'); ?>

<?php require_once('./includes/scripts.php'); ?>
</body>
</html>