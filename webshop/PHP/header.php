<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/style.css?v=<?php echo time(); ?>" type="text/css"/>
        <link rel="stylesheet" href="https://use.typekit.net/nxb1mga.css">
        <link rellink="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
        <title>Student Coffee | Kaffee Online Shop</title>
    </head>
    <body>
        <!-- Nav Section -->
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="../images/logo_sw.png" alt="Logo" width="100px"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Produkte</a></li>
                    <?php
                        if (isset($_SESSION["email"])) {
                            if ($_SESSION["email"] === "admin@minishop.de") {
                              echo "<li><a href='addArticle.php'>Artikel Hinzufügen</a></li>";
                              echo "<li><a href='admin.php'>Admin</a></li>";
                            }
                            else {
                              echo "<li><a href='profile.php'>Profil page</a></li>";
                            }

                            echo "<li><a href='logout.inc.php'>Logout</a></li>";
                        }
                        else {
                            echo "<li><a href='login.php'>Login</a></li>";
                        }
                    ?>
                    <!-- <li><a href='logout.inc.php'>Logout</a></li> -->
                    <!-- <li><a href="account.html"><img src="../images/account.png" alt="Konto" width="20px" height="20px"></a></li> -->
                    <li><a href="cart.php"><img src="../images/cart.png" alt="Warenkorb" width="20px" height="20px"></a></li>
                </ul>
            </nav>
        </div>
