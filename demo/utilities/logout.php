<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="css/estils.css">
</head>

<body>
    <?php
    session_start();
    session_unset();
    session_destroy();
    ?>
    <a href="index.php">Tornant...</a>
    <script>
        window.location.href = '../index.php';
    </script>
</body>

</html>