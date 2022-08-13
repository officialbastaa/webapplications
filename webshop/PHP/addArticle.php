<?php include_once 'header.php'; ?>


<div class="content-container">
            <div class="small-container">

                <div class="admin-container">
                    <!-- Add Product -->
                    <div class="grid-title">
                        <h2>Artikel hinzufügen</h2>
                    </div>
                        <form action="article.php" method="post" enctype="multipart/form-data">
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
                                    <td><label for="anzahl">Anzahl</label></td>
                                    <td><input type="text" name="anzahl" id="anzahl"></td>
                                </tr>
                                <tr>
                                    <td><label for="foto">Foto</label></td>
                                    <td><input type="file" name="foto" id="foto"></td>
                                <tr>
                                    <td><label for="beschreibung">Beschreibung</label></td>
                                    <td><textarea name="beschreibung" id="beschreibung" class="description"></textarea></td>
                            </tr>
                            </table>
                            <br>
                            <button type="submit" value="Artikel hinzufügen">Artikel hinzufügen</button>
                            <br>
                        </form>
            </div>
        </div>

<?php include_once 'footer.php'; ?>
