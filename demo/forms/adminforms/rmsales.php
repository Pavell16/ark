<div class="card">

    <h1>Esborrar Sala</h1> 
    <form action="sql/deletesala.php" method="post">
                
        <div class="form-group">
        <label for="rmsala">Sala:</label>
            <select name="rmsala" >
        
            <?php
                
                $conn = connecta("demom14");
                $sql="SELECT * FROM sales;";
                $result = $conn->query($sql);
                desconnecta($conn);
                ?>
                    <option value="">-</option>
                <?php
                while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['nom']; ?>"> <?php echo $row['nom']; ?></option>
                    <?php

                }

            ?>
            </select>
        </div>
            <button type="submit">Esborra</button>
            <button type="submit" formaction="index.php" formmethod="post" name="admbtn" value="admin">Tornar</button>
    </form>
</div>