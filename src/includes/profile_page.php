<?php 

    if (!empty($_POST)) {

        $query = "UPDATE users SET name = ? /*, password = :password*/, address = ?, city = ?, contact = ?  WHERE  token = ?";

        // prepare query statement
        $stmt = conn()->prepare($query);
    
        // sanitize
        // $this->name=htmlspecialchars(strip_tags($_POST['name']->name));
        // $this->password=htmlspecialchars(strip_tags($this->password));
        // $this->address=htmlspecialchars(strip_tags($_POST['address']->address));
        // $this->city=htmlspecialchars(strip_tags($_POST['city']->city));
        // $this->contact=htmlspecialchars(strip_tags($_POST['contact']->contact));
        // $this->token=htmlspecialchars(strip_tags($_SESSION['token']->id));

        //bind values

        // $stmt->bind_param($_POST['name'], $this->name);
        // $stmt->bind_param($_POST['address'], $this->address);
        // $stmt->bind_param($_POST['city'], $this->city);
        // $stmt->bind_param($_POST['contact'], $this->contact);
        // $stmt->bind_param($_SESSION['token'], $this->token);

        // // execute the query
        // if($stmt->execute()){
        //     return true;
        // }

        // return false;
    }

?>

<div class="container">
    <div class="profile_page">
        <form action="profile.php" method="post">
            <div class="photo">
                <img src="" alt="">
                <input type="file" name="pic" accept="image/x-png,image/gif,image/jpeg">
            </div>
            <div class="change_password">
                <input type="password" name="password" placeholder="Palavra-passe">
                <input type="password" name="cpassword" placeholder="Confirmar Palavra-passe">
            </div>
            <div class="info">
                <input type="text" name="name" placeholder="Nome" value="<?php echo($_SESSION['name'])?>">
                <input type="email" name="email" placeholder="Email" value="<?php echo($_SESSION['email'])?>"disabled>
                <input type="text" name="address" placeholder="Morada" value="<?php if(!empty($_SESSION['address'])){echo($_SESSION['address']);}?>">
                <input type="text" name="city" placeholder="Cidade" value="<?php if(!empty($_SESSION['city'])){echo($_SESSION['city']);}?>">
                <input type="text" name="contact" placeholder="Contacto" value="<?php if(!empty($_SESSION['contact'])){echo($_SESSION['contact']);}?>">
            </div>
            <input type="submit" value="Salvar">
        </form>
    </div>
</div>
