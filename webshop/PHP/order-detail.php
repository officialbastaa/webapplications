<?php
include_once 'header.php';
include('setupDB.php');
 ?>

<!-- Admin Information -->
                        <?php

                          if (isset($_GET["error"])) {
                            if ($_GET["error"] == "orderdeleted") {
                                echo "<h2 style='color: green; text-align: center'>Bestellung wurde gelöscht.</h2><br>";
                            }
                            if ($_GET["error"] == "orderconfirmed") {
                              echo "<h2 style='color: green; text-align: center'>Bestellung wurde bestätigt!</h2><br>";
                            }
                          }

                          if (isset($_POST["userOrderDetails"])){
                            $bid = $_POST["userOrderDetails"];

                            $sql1 = "SELECT nutzer.email, artikel.name, preis, bestellungen.anzahl, bestellungen.bestelldatum, artikel.aid FROM bestellungen, artikel, nutzer WHERE bestellungen.aid = artikel.aid && bestellungen.nid = nutzer.nid && bestellungen.bid = '$bid';";
                            $result = $conn -> query($sql1);
                            $data = mysqli_fetch_assoc($result);
                            $vorname = $data["email"];
                            $aName = $data["name"];
                            $price = $data["preis"];
                            $amount = $data["anzahl"];
                            $date = $data["bestelldatum"];
                            $aid = $data["aid"];

                            $totalAmount = $price * $amount;
                            echo "
                            <div class='content-container'>
                                        <div class='small-container'>
                                            <div class='admin-container'>
                                                <!-- Order Details -->
                                                <div class='grid-title'>
                                                    <h2>Details</h2>
                                                </div>
                                                  <a href='profile.php'><button type='button' name='button'>Zurück</button></a>
                                                  <br>
                                                  <br>
                                                <table>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Artikel:</td>
                                                        <td>$aName</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Menge:</td>
                                                        <td>$amount</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Gesamtpreis:</td>
                                                        <td>$totalAmount €</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bestelldatum</td>
                                                        <td>  $date</td>
                                                        <td></td>
                                                    </tr>";
                          }


                          if (isset($_POST["orderDetails"])){
                            $bid = $_POST["orderDetails"];

                            $sql1 = "SELECT nutzer.email, artikel.name, preis, bestellungen.anzahl, bestellungen.bestelldatum, artikel.aid FROM bestellungen, artikel, nutzer WHERE bestellungen.aid = artikel.aid && bestellungen.nid = nutzer.nid && bestellungen.bid = '$bid';";
                            $result = $conn -> query($sql1);
                            $data = mysqli_fetch_assoc($result);
                            $vorname = $data["email"];
                            $aName = $data["name"];
                            $price = $data["preis"];
                            $amount = $data["anzahl"];
                            $date = $data["bestelldatum"];
                            $aid = $data["aid"];

                            $totalAmount = $price * $amount;
                            echo "
                            <div class='content-container'>
                                        <div class='small-container'>
                                            <div class='admin-container'>
                                                <!-- Order Details -->
                                                <div class='grid-title'>
                                                    <h2>Details</h2>
                                                </div>
                                                  <a href='admin.php'><button type='button' name='button'>Zurück</button></a>
                                                  <br>
                                                  <br>
                                                <table>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Email:</td>
                                                        <td>$vorname</td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Artikel:</td>
                                                        <td>$aName</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Menge:</td>
                                                        <td>$amount</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Gesamtpreis:</td>
                                                        <td>$totalAmount €</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bestelldatum</td>
                                                        <td>  $date</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                          <form action='order-detail.php' method='post'>
                                                            <button type='submit' name='deleteOrder' value='$bid'>Bestellung Löschen</button>
                                                          </form>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                          <form action='order-detail.php' method='post'>
                                                            <button type='submit' name='confirmOrder' value='$bid'>Bestellung Bestätigen</button>
                                                          </form>
                                                        </td>
                                                    </tr>";
                          }

                          if (isset($_POST["deleteOrder"])){

                            $bid = $_POST["deleteOrder"];

                            $sql1 = "SELECT bestellungen.anzahl AS anzahlbestellung, artikel.aid, artikel.anzahl FROM bestellungen, artikel WHERE bestellungen.aid = artikel.aid && bestellungen.bid = '$bid';";
                            $result = $conn -> query($sql1);
                            $data = mysqli_fetch_assoc($result);
                            $articleAmount = $data["anzahl"];
                            $orderAmount = $data["anzahlbestellung"];
                            $aid = $data["aid"];

                            $newAmount = $articleAmount + $orderAmount;

                            $sql2 = "UPDATE artikel SET anzahl = '$newAmount' WHERE aid = '$aid';";
                            $result = $conn -> query($sql2);

                            $sql3 = "DELETE FROM bestellungen WHERE bid = '$bid';";
                            $result = $conn -> query($sql3);

                            header("location: ../PHP/order-detail.php?error=orderdeleted");
                            exit();
                          }

                          if (isset($_POST["confirmOrder"])){
                            $bid = $_POST["confirmOrder"];
                            $sql1 = "UPDATE bestellungen SET bestaetigt = 'Ja' WHERE bid = '$bid';";
                            $result = $conn -> query($sql1);

                            header("location: ../PHP/order-detail.php?error=orderconfirmed");
                            exit();


                          }

                         ?>
                    </table>



                    <br>
                </div>
            </div>
        </div>

<?php include_once 'footer.php'; ?>
