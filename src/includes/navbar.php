<nav class="navbar">
    <div class="content">
        <div class="links">
            <a href="/" class="link">Início</a>
            <a href="/products.php" class="link">Produtos</a>
            <a href="/orders.php" class="link">Encomendas</a>
        </div>
        <div class="user">
            <div class="cart">
                <i class="icon fas fa-shopping-cart"></i>
                <div class="cart-count">00</div>
                <div class="cart-body">
                    <div class="cart-header">
                        <p>Carrinho</p>
                        <span class="close" id="cart-close">&times</span>
                    </div>
                    <div class="cart-list">
                
                    </div>
                    <div class="cart-footer">
                        <button class="button wipe">Apagar</button>
                        <button class="button finish">Finalizar Encomenda</button>
                    </div>
                </div>
            </div>
            
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