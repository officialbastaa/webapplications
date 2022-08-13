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

                         ?>
                    </table>
                    <br>
                    <form action='deleteUser.php' method='post'>
                      <center><button type="submit" name="deleteClicked" value=''>Konto Löschen</button></center>
                    </form>


                    <!-- All Orders -->
                    <div class="grid-title">
                        <h2>Deine bestellungen</h2>
                    </div>
                    <table>
                        <tr>
                            <th>Bestelldatum</th>
                            <th>Bestätigt?</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php

                        $email = $_SESSION["email"];

                        $sql1 = "SELECT artikel.name, bestellungen.anzahl, nutzer.email, bestellungen.bid, bestellungen.bestelldatum, bestellungen.bestaetigt FROM bestellungen, artikel, nutzer WHERE bestellungen.aid = artikel.aid && bestellungen.nid = nutzer.nid && nutzer.email = '$email';";
                        $result = $conn -> query($sql1);
                        while($row = mysqli_fetch_assoc($result)){
                          $bid = $row["bid"];
                          $date = $row["bestelldatum"];
                          $confirmation = $row["bestaetigt"];
                          echo "<tr>
                                  <td>$date</td>
                                  <td>$confirmation</td>
                                  <td></td>
                                  <td>
                                    <form action='order-detail.php' method='post'>
                                      <button type='submit' name='userOrderDetails' value='$bid'>Details</button>
                                    </form>
                                  </td>
                                </tr>";
                        }
                         ?>
                    </table>


<?php include_once 'footer.php'; ?>
