<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMO</title>
    <link rel="stylesheet" href="css/estilindex.css">
    <?php
        require("connection/DBconn.php");
        session_start();
    ?>
</head>
<body>
    <main>
        <!-- Login Form Start -->
         <?php
            if (isset($_SESSION['user'])) {
                echo "<h1>Benvingut " . "<b>" . $_SESSION['user'] . "</b></h1>";

                // Fitxatge entry  START
                    if($_SESSION['user'] != "admin"){
                        // cualsevol altre usuari
                        require "forms/fitxaform.php";
                    }else{  
                        // en cas de ser administrador  
                        require "forms/adminform.php";   

                        if(isset($_POST['admbtn'])) {
                            $_SESSION['selectedForm'] = $_POST['admbtn'];
                        }
                        if(isset($_SESSION['selectedForm'])) {
                            // comprova quin formulari ha d'anar segons la selecció
                            $selectedForm = $_SESSION['selectedForm'];
                            
                            if($selectedForm == "addsales") {
                                // afegir sales
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/sales.php";
                            } else if($selectedForm == "addmotius") {
                                // afegir motius
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/motius.php";
                            } else if($selectedForm == "addusuaris") {
                                // afegir usuaris
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/usuaris.php";
                            }else if($selectedForm == "rmsales") {
                                // trure sales
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/rmsales.php";
                            }else if($selectedForm == "rmmotius") {
                                //  treure motius
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/rmmotius.php";
                            }else if($selectedForm == "rmusuaris") {
                                // treure usuaris
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/rmusuaris.php";
                            }else if($selectedForm == "shsales") {
                                // mostrar sales
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/shsales.php";
                            }else if($selectedForm == "shmotius") {
                                // mostrar motius
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/shmotius.php";
                            }else if($selectedForm == "shusuaris") {
                                // mostrar usuaris
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/shusuaris.php";
                            }else if($selectedForm == "shfitxa") {
                                // mostrar fitxatge
                                echo "<style>.adminform { display: none; }</style>";
                                require "forms/adminforms/shfitxa.php";
                            }
                        } else {
                            // Mostrar el formulario de selección de administrador
                            require "forms/adminform.php";
                        }
                    }
                // Fitxatge entry END
            } else {
                require "forms/entryform.php";

                
            }
        ?>
        <!-- Login Form END -->
    </main>
    
</body>
</html>
