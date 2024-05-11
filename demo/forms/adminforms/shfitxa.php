<div class="card">

    <h1>Fitxatge</h1> 
    <form action="index.php" method="post">
                
        <div class="form-group">
            <?php
                
                $conn = connecta("demom14");
                $sql="SELECT users.usuari, motius.motiu, sales.nom, fitxa.temps_fitxa FROM fitxa, motius, sales, users WHERE fitxa.usuari = users.ID AND fitxa.motiu = motius.ID and fitxa.sala = sales.ID;";
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
                        <th>Motiu</th>
                        <th>sala</th>
                        <th>Dia/Hora</th>
                    </thead>
                    <tbody>

                    
                <?php
                while($row = $result->fetch_assoc()){
                    // contingut de la taula
                    ?>
                        <tr>
                            <td><?php echo $row['usuari']?></td>
                            <td><?php echo $row['motiu']?></td>
                            <td><?php echo $row['nom']?></td>
                            <td><?php echo $row['temps_fitxa']?></td>
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