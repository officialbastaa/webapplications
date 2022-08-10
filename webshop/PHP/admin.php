<?php include_once 'header.php'; ?>

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
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                    <br>
                    
                    <!-- All Products -->
                    <div class="grid-title">
                        <h2>Tabelle aller Artikel</h2>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Preis</th>
                            <th>Menge</th>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>

                    <!-- Add Product -->
                    <div class="grid-title">
                        <h2>Artikel hinzufügen</h2>
                    </div>        
                        <form action="http://localhost/EWAPP/PHP/article.php" method="post">
                            <table>
                                <tr>
                                    <td><label for="produktname">Name</label></td>
                                    <td><input type="text" name="produktname" id="produktname"></td>
                                </tr>
                                <tr>
                                    <td><label for="preis">Preis</label></td>
                                    <td><input type="text" name="preis" id="preis"></td>
                                </tr>
                                <tr>
                                    <td><label for="menge">Menge</label></td>
                                    <td><input type="text" name="menge" id="menge"></td>
                                </tr>
                                <tr>
                                    <td><label for="foto">Foto 1-4</label></td>
                                    <td><input type="file" name="bild" id="bild"></td>
                            </tr>
                                <tr>
                                    <td><label for="foto"></label></td>
                                    <td><input type="file" name="bild" id="bild"></td>
                                </tr>
                                <tr>
                                    <td><label for="foto"></label></td>
                                    <td><input type="file" name="bild" id="bild"></td>
                                </tr>
                                <tr>
                                    <td><label for="foto"></label></td>
                                    <td><input type="file" name="bild" id="bild"></td>
                                </tr>
                                <tr>
                                    <td><label for="beschreibung">Beschreibung</label></td>
                                    <td><textarea name="beschreibung" id="beschreibung" class="description"></textarea></td>
                            </tr>
                            </table>
                        </form>
                        <br>
                        <button type="submit" value="Artikel hinzufügen">Artikel hinzufügen</button>
                        <br>

                    <!-- All Carts -->
                    <div class="grid-title">
                        <h2>Tabelle aller Warenkörbe</h2>
                    </div>
                    <table>
                        <tr>
                            <th>Nutzername</th>
                            <th>Gesamtanzahl der Artikel</th>
                            <th>Gesamtpreis</th>
                            <th>Details</th>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>                
        </div>

<?php include_once 'footer.php'; ?>
