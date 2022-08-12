<?php
include_once 'header.php';
include('setupDB.php');
 ?>

<!-- Admin Information -->
<div class="content-container">
            <div class="small-container">
                <div class="grid-title">
                    <h1>Hallo Admin!</h1>
                    <p>Hier kannst du alle Informationen über deinen Webshop einsehen.</p>
                </div>
                <div class="admin-container">
                    <!-- All Users -->
                    <div class="grid-title">
                        <h2>Tabelle aller registrierten Nutzer</h2>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Vorname</th>
                            <th style="width: 40%;">Email</th>
                            <th></th>
                        </tr>
                        <?php

                        $sql1 = "SELECT * FROM nutzer;";
                        $result = $conn -> query($sql1);
                        while($row = mysqli_fetch_assoc($result)){
                          $vorname = $row["vorname"];
                          $nachname = $row["name"];
                          $email = $row["email"];
                          echo "<tr>
                              <td>$nachname</td>
                              <td>$vorname</td>
                              <td>$email</td>
                              <td></td>
                                </tr>";
                        }
                         ?>
                    </table>
                    <br>


                    <!-- All Orders -->
                    <div class="grid-title">
                        <h2>Tabelle aller Bestellungen</h2>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Gesamtanzahl der Artikel</th>
                            <th>Gesamtpreis</th>
                            <th>Details</th>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>

                    <!-- All Users -->
                    <div class="grid-title">
                        <h2>Tabelle aller Artikel</h2>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Preis in €</th>
                            <th style="width: 40%;">Anzahl</th>
                            <th></th>
                        </tr>
                        <?php

                        $sql1 = "SELECT * FROM artikel;";
                        $result = $conn -> query($sql1);
                        while($row = mysqli_fetch_assoc($result)){
                          $name = $row["name"];
                          $preis = $row["preis"];
                          $anzahl = $row["anzahl"];
                          echo "<tr>
                              <td>$name</td>
                              <td>$preis</td>
                              <td>$anzahl</td>
                              <td></td>
                                </tr>";
                        }
                         ?>
                    </table>
                    <br>
                </div>

            </div>
        </div>

<?php include_once 'footer.php'; ?>
