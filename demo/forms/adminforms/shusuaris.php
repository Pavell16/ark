<div class="card">

    <h1>Motius</h1> 
    <form action="index.php" method="post">
                
        <div class="form-group">
        
            
        
            <?php
                
                $conn = connecta("demom14");
                $sql="SELECT * FROM users;";
                $result = $conn->query($sql);
                desconnecta($conn);
                // Taula
                ?>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th, td {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }
                    th{
                        text-align:center;
                    }
                </style>
                <table class="tables">
                    <thead>
                        <th>Usuari</th>
                        <th>Hora Creacio</th>
                    </thead>
                    <tbody>

                    
                <?php
                while($row = $result->fetch_assoc()){
                    // contingut de la taula
                    ?>
                        <tr>
                            <td><?php echo $row['usuari']?></td>
                            <td><?php echo $row['hora_creacio']?></td>
                        </tr>
                    <?php

                }

            ?>
                    </tbody>
                </table>
        </div>
            <button type="submit">Esborra</button>
            <button type="submit" formaction="index.php" formmethod="post" name="admbtn" value="admin">Tornar</button>
    </form>
</div>