<?php
include_once 'header.php';
include('setupDB.php');
 ?>

<!-- Admin Information -->
<div class="content-container">
            <div class="small-container">
                <div class="grid-title">

                    <?php
                      echo "<h1>Hallo " . $_SESSION["vorname"] . "!</h1>";
                      echo "<p>Hier kannst du deine Daten einsehen und ändern.</p>";
                    ?>

                </div>
                <div class="admin-container">
                    <!-- All Users -->
                    <div class="grid-title">
                        <h2>Konto-Daten</h2>
                    </div>
                    <table>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                        <?php

                          //State the Query for the Order
                          $email;
                          $email = $_SESSION["email"];
                          $sql1 = "SELECT name, vorname, email, password FROM nutzer WHERE email = '$email'; ";
                          $result = $conn -> query($sql1);
                          $data = mysqli_fetch_assoc($result);
                          $vorname = $data["vorname"];
                          $nachname = $data["name"];
                          $email = $data["email"];
                          $passwort = $data["password"];

                          echo "<tr>
                              <td></td>
                              <td>Vorname:</td>
                              <td>$vorname</td>
                              <td></td>

                          </tr>
                          <tr>
                              <td></td>
                              <td>Nachname:</td>
                              <td>$nachname</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td></td>
                              <td>E-Mail:</td>
                              <td>$email</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td></td>
                              <td>Passwort:</td>
                              <td>$passwort</td>
                              <td></td>
                          </tr>";
                          // DELETE FROM nutzer WHERE email = $_SESSION["email"];

                         ?>
                    </table>
                    <br>

<?php include_once 'footer.php'; ?>
