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
