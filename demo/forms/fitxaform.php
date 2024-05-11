<div class="card">

    <h1>Fitxatge</h1> 
    <form action="sql/insertafixa.php" method="post">
                
        <div class="form-group">
            <input type="hidden" name="usuari" id="usuari" value="<?php echo $_SESSION['user'];?>">
            <label for="motiu">Motiu:</label>
            <select name="motiu" >
        
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
        <div class="form-group">
            <label for="sala">Sala:</label>
            <select name="sala" >
                <?php
                    $conn = connecta("demom14");
                    $sql="SELECT * FROM sales;";
                    $result = $conn->query($sql);
                    desconnecta($conn);
                    while($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['nom']; ?>"> <?php echo $row['nom']; ?></option>
                        <?php
                    }

                ?>
            </select>
        </div>
            <button type="submit" >FITXA</button>
            <button type="submit" formaction="utilities/logout.php" formmethod="post">Logout</button>
    </form>
</div>