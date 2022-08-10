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
                            <h2>Sign up</h2>
                            <form action="user.php" method="post" id="RegForm">
                                <table>
                                    <tr>
                                        <td><label for="vorname">Vorname</label></td>
                                        <td><input type="text" name="vorname" id="vorname" placeholder="Max"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="nachname">Nachname</label></td>
                                        <td><input type="text" name="name" id="nachname" placeholder="Mustermann"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email">Email</label></td>
                                        <td><input type="email" name="email" id="email" placeholder="m.mustermann@gmail.com"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="passwort">Passwort</label></td>
                                        <td><input type="password" name="passwort" id="passwort" placeholder="*****"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="passwort">Passwort bestätigen</label></td>
                                        <td><input type="password" name="confirmPasswort" id="confirmPasswort" placeholder="*****"></td>
                                    </tr>
                                </table>
                                <br>

                                <?php
                                    if (isset($_GET["error"])) {
                                        if ($_GET["error"] == "emptyinput") {
                                            echo "<p>Fülle alle Felder aus!</p><br>";
                                        } 
                                        else if ($_GET["error"] == "invalidemail"){
                                            echo "<p>Wähle eine echte Email Adresse!</p><br>";
                                        }
                                        else if ($_GET["error"] == "stmtfailed"){
                                            echo "<p>Etwas ist schiefgelaufen!</p><br>";
                                        }
                                        else if ($_GET["error"] == "emailtaken"){
                                            echo "<p>Der User existiert bereits!</p><br>";
                                        }
                                        // else if ($_GET["error"] == "none"){
                                        //     echo "<p>Du bist nun registriert!</p>";
                                        // }
                                    }
                                ?>
                                <a href="index.php"><button type="submit" value="Registrieren">Registrieren</button></a>
                                <p id="keinvorname" style="color:red;"></p>
                                <p id="noLastName" style="color:red;"></p>
                                <p id="noPassword" style="color:red;"></p>
                                <p id="goodPassword" style="color:green;"></p>
                                <p id="notSamePassword" style="color:red;"></p>
                                <p id="samePassword" style="color:green;"></p>
                                <br>      
                                <br>    
                                <small>Das Passwort muss mindestens 5 Zeichen lang sein, mindest eine Ziffer, einen Groß- sowie einen Kleinbuchstaben enthalten.</small>      
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php   
    include_once 'footer.php';
?>
