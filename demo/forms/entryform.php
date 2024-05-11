<?php
    $error = "";
    
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $user_log = $_POST['username'];
        $password_hash = $_POST['password'];
        $connexio = connecta("demom14");
        $resultat = $connexio->prepare("SELECT usuari, passwd from users WHERE usuari = ? AND passwd = ?");
        $resultat->bind_param("ss", $user_log, $password_hash);
        $resultat->execute();
        $resultat->bind_result($uSQL, $pSQL);
        $resultat->fetch();
        desconnecta($connexio);
        if (!empty($uSQL) && !empty($pSQL)) {
            $_SESSION['user'] = $_POST['username'];
            header("Location: index.php");
        } else {
            $error = "Login/Password incorrecte";
        }
        
    }
?>
<div class="card">

    <h1>Inici de Sessió</h1> 
    <form action="" method="post">
                
        <div class="form-group">
            <label for="username">Usuari:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Contrasenya:</label>
            <input type="password" id="password" name="password" required>
        </div>
            <button type="submit">Iniciar Sesión</button>
    </form>
</div>