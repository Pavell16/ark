<div class="card">

    <h1>Esborrar Usuari</h1> 
    <form action="sql/deleteusuari.php" method="post">
                
        <div class="form-group">
        <label for="rmuser">Usuari:</label>
            <select name="rmuser" >
        
            <?php
                
                $conn = connecta("demom14");
                $sql="SELECT * FROM users;";
                $result = $conn->query($sql);
                desconnecta($conn);
                ?>
                    <option value="">-</option>
                <?php
                while($row = $result->fetch_assoc()){
                    if ($row['usuari'] != "admin"){

                        ?>
                        <option value="<?php echo $row['usuari']; ?>"> <?php echo $row['usuari']; ?></option>
                        <?php
                    }
                }

            ?>
            </select>
        </div>
            <button type="submit">Esborra</button>
            <button type="submit" formaction="index.php" formmethod="post" name="admbtn" value="admin">Tornar</button>
    </form>
</div>