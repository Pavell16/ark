
<div class="card">

    <h1>Usuari Nou</h1> 
    <form action="sql/insertausuari.php" method="post">
                
        <div class="form-group">
            <label for="usuari">NOM</label>
            <input type="text" id="usuari" name="usuari">
            <label for="contra">Contrasenya</label>
            <input type="password" id="contra" name="contra">
        </div>
            <button type="submit">Afegeix</button>
            <button type="submit" formaction="index.php" formmethod="post" name="admbtn" value="admin">Tornar</button>
    </form>
</div>