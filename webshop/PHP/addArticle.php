<?php include_once 'header.php'; ?>


<div class="content-container">
            <div class="small-container">

                <div class="admin-container">
                    <!-- Add Product -->
                    <div class="grid-title">
                        <h2>Artikel hinzufügen</h2>
                    </div>
                    <h2 style='text-align: center' id="response"></h2><br>
                        <!-- <form action="article.php" method="post" enctype="multipart/form-data"> -->
                            <table>
                                <tr>
                                    <td><label for="produktname">Name</label></td>
                                    <td><input type="text" style="width:600px;" name="produktname" id="produktname"></td>
                                </tr>
                                <tr>
                                    <td><label for="preis">Preis</label></td>
                                    <td><input type="text" style="width:600px;" name="preis" id="preis"></td>
                                </tr>
                                <tr>
                                    <td><label for="anzahl">Anzahl</label></td>
                                    <td><input type="number" style="width:600px;" name="anzahl" id="anzahl"></td>
                                </tr>
                                <tr>
                                    <td><label for="foto">Foto</label></td>
                                    <td><input type="file" style="width:600px;" name="foto" id="foto"></td>
                                <tr>
                                    <td><label for="beschreibung">Beschreibung</label></td>
                                    <td><textarea name="beschreibung" id="beschreibung" class="description"></textarea></td>
                            </tr>
                            </table>
                            <br>
                            <button type="submit" id="addArticle" value="Artikel hinzufügen">Artikel hinzufügen</button>
                            <br>
                        <!-- </form> -->
                        <script>
                            window.addEventListener("load", init);

                            function init() {
                                document.getElementById("addArticle").addEventListener("click", ajax);
                                document.getElementById("addArticle").addEventListener("click", clearInput);
                            }

                            function clearInput(){

                              var inputs = document.querySelectorAll('#produktname, #preis, #anzahl, #foto, #beschreibung');

                              inputs.forEach(input => {
                                input.value = '';
                              });
                            }


                            function ajax() {

                                var produktname = document.getElementById("produktname").value;
                                var preis = document.getElementById("preis").value;
                                var anzahl = document.getElementById("anzahl").value;
                                var fotoInput = document.getElementById("foto");
                                var foto = fotoInput.files[0];
                                var beschreibung = document.getElementById("beschreibung").value;

                                if (produktname && preis && anzahl && foto && beschreibung) {

                                    var ajaxRequest = new XMLHttpRequest();
                                    ajaxRequest.addEventListener("load", ajaxGeladen);
                                    ajaxRequest.addEventListener("error", ajaxFehler);
                                    ajaxRequest.open("post", "article.php");
                                    var daten = new FormData();
                                    daten.append("produktname", produktname);
                                    daten.append("preis", preis);
                                    daten.append("anzahl", anzahl);
                                    daten.append("foto", foto, foto.name);
                                    daten.append("beschreibung", beschreibung);
                                    ajaxRequest.send(daten);
                                }
                                else {
                                    spricht("Bitte Fülle alle Felder aus");
                                }
                            }
                            function ajaxGeladen(event) {
                                // var antwort = JSON.parse(event.target.responseText);
                                var antwort = JSON.parse(this.responseText);
                                spricht(antwort.nachricht);
                            }
                            function spricht(text) {
                                document.getElementById("response").innerHTML = text;
                            }
                            function ajaxFehler(event) {
                                alert(event.target.statusText);
                            }
                        </script>
            </div>
        </div>

<?php include_once 'footer.php'; ?>
