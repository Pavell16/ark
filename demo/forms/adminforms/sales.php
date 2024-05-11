
<div class="card">

    <h1>Sala nova</h1> 
    <form action="sql/insertasala.php" method="post">
                
        <div class="form-group">
            <label for="sala">NOM</label>
            <input type="text" id="sala" name="sala">
            <label for="pis">PIS</label>
            <input type="text" id="pis" name="pis">
        </div>
            <button type="submit">Afegeix</button>
            <button type="submit" formaction="index.php" formmethod="post" name="admbtn" value="admin">Tornar</button>
    </form>
</div>