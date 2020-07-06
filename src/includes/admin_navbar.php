<nav class="navbar">
    <div class="content">
        <div class="user">          
            <div class="profile">
                <div class="profile-name"> <?php echo$_SESSION['name'] ?></div>
                <div class="profile-image"></div>
            </div>
            <div class="user-settings">
                <div class="profile-settings"><a href="profile.php"><i class="fas fa-user"></i>Perfil</a></div>
                <div class="logout"><a href="../auth/signout.php"><i class="fas fa-sign-out-alt"></i>Sair</a></div>
            </div>
        </div>
    </div>
</nav>