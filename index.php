<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menukaart.css">
    <title>Document</title>
</head>
<body>
    <?php
     $dsn = 'mysql:dbname=test;host=127.0.0.1';
     $user = 'root';
     $password = '';
     try{
         $connectie = new PDO($dsn, $user, $password);
     }
     catch (PDOException $e)
     {
         echo "gefaalt" . $e;
     }
    ?>
    <header>
        <div class="header-text">
            <h1>
                Menu kaart
            </h1>
            <form method="get">
                <input type="text" name="zoekveld">
                <input type="submit" value="zoek">
            </form>
        </div>
        <a href="login.php">
            <div class="login">
                login
            </div>
        </a>
    </header>
    <main>
        <div class="container">
            <?php
                if(isset($_GET['zoekveld'])){
                    $zoekveld = $_GET['zoekveld'];
                    $resultSet = $connectie->query("SELECT * FROM menu_test WHERE titel like '%$zoekveld%' or beschrijving like '%$zoekveld%'");
                }
                else{
                    $resultSet = $connectie->query("SELECT * FROM menu_test");
                }
                while ($item = $resultSet->fetch())
                {
                echo
                '<div class="menu-item">
                    <div class="top-menu-item">
                        <h2>' . $item['titel'] . '</h2>
                    </div>
                    <div class="bottom-menu-item">
                        <div class="bescrijving">
                            <p>' . $item['beschrijving'] . '<p> 
                        </div>
                        <div>
                        <p class="prijs"> &euro;' .$item['prijs'] . '<p> 
                        ';
                        if(isset($_SESSION['naam'])) {
                        echo
                        '<a class="blue-text" href="edit.php?id='. $item['id'].'  ">wijzig</a>';
                        
                        }
                        echo '</div>
                    </div>
                </div>';
                }
            ?>
        </div>
    </main>
</body>
</html>