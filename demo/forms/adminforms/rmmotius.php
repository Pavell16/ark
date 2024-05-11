<div class="card">

    <h1>Esborrar Motiu</h1> 
    <form action="sql/deletemotiu.php" method="post">
                
        <div class="form-group">
        <label for="rmmotiu">Motiu:</label>
            <select name="rmmotiu" >
        
            <?php
                
                $conn = connecta("demom14");
                $sql="SELECT * FROM motius;";
                $result = $conn->query($sql);
                desconnecta($conn);
                ?>
                    <option value="">-</option>
                <?php
                while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['motiu']; ?>"> <?php echo $row['motiu']; ?></option>
                    <?php

                }

            ?>
            </select>
        </div>
            <button type="submit">Esborra</button>
            <button type="submit" formaction="index.php" formmethod="post" name="admbtn" value="admin">Tornar</button>
    </form>
</div>