<?php   
    include_once 'header.php';
?>

        <!-- Account Page -->

        <div class="account-page">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <h1 style="text-align: center;">Probiere jetzt unsere neuen Sorten!</h1>
                        <img src="../images/hero_2.png" alt="hero_2" width="100%">
                    </div>
                    <div class="col-2">
                        <div class="form-container">
                            <h2>Login</h2>
                            <form action="login.inc.php" method="post" id="LoginForm">
                                <table>
                                    <tr>
                                        <td><label for="email">Email</label></td>
                                        <td><input type="email" name="email" id="email" placeholder="m.mustermann@gmail.com"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="passwort">Passwort</label></td>
                                        <td><input type="password" name="passwort" id="passwort" placeholder="*****"></td>        
                                    </tr>
                                </table>
                                <br>
                                <?php
                                    if (isset($_GET["error"])) {
                                        if ($_GET["error"] == "emptyinput") {
                                            echo "<p>Fülle alle Felder aus!</p><br>";
                                        } 
                                        else if ($_GET["error"] == "wronglogin"){
                                            echo "<p>Falsche Login Eingaben!</p><br>";
                                        }
                                    }
                                ?>
                                <button type="submit">Login</button>                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php   
    include_once 'footer.php';
?>
