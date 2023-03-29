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
        Menu kaart
    </header>
    <main>
        <div class="container">
        <?php
            $resultSet = $connectie->query("SELECT * FROM menu_test");
            while ($item = $resultSet->fetch())
                {
                // echo
                // "<div>
                //     <h2>" . $item['titel'] . "</h2>
                //     <p>" . $item['beschrijving'] . "<p>
                // </div>";
                echo
                '<div class="menu-item">
                    <div class="top-menu-item">
                        <h2>' . $item['titel'] . '</h2>
                    </div>
                    <div class="bottom-menu-item">
                    <p>' . $item['beschrijving'] . '<p> 
                    </div>
                </div>';
                echo
                '<div class="menu-item">
                    <div class="top-menu-item">
                        <h2>' . $item['titel'] . '</h2>
                    </div>
                    <div class="bottom-menu-item">
                    <p>' . $item['beschrijving'] . '<p> 
                    </div>
                </div>';
                echo
                '<div class="menu-item">
                    <div class="top-menu-item">
                        <h2>' . $item['titel'] . '</h2>
                    </div>
                    <div class="bottom-menu-item">
                    <p>' . $item['beschrijving'] . '<p> 
                    </div>
                </div>';
                echo
                '<div class="menu-item">
                    <div class="top-menu-item">
                        <h2>' . $item['titel'] . '</h2>
                    </div>
                    <div class="bottom-menu-item">
                    <p>' . $item['beschrijving'] . '<p> 
                    </div>
                </div>';
                }
            ?>
        </div>
    </main>
    <!-- <div class="menu-item">
        <div class="top-menu-item">

        </div>
        <div class="bottom-menu-item">

        </div>
    </div>  -->
</body>
</html>