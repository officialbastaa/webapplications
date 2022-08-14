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
                            <h2>Konto Erstellen</h2>
                            <!-- <form action="user.php" method="post" id="RegForm"> -->
                                <table>
                                    <tr>
                                        <td><label for="vorname">Vorname</label></td>
                                        <td><input type="text" style="width:200px;" name="vorname" id="vorname" ></td>
                                    </tr>
                                    <tr>
                                        <td><label for="nachname">Nachname</label></td>
                                        <td><input type="text" style="width:200px;" name="name" id="nachname" ></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email">Email</label></td>
                                        <td><input type="email" style="width:200px;" name="email" id="email" ></td>
                                    </tr>
                                    <tr>
                                        <td><label for="passwort">Passwort</label></td>
                                        <td><input type="password" style="width:200px;" name="passwort" id="passwort" ></td>
                                    </tr>
                                    <tr>
                                        <td><label for="passwort">Passwort bestätigen</label></td>
                                        <td><input type="password" style="width:200px;" name="confirmPasswort" id="confirmPasswort" ></td>
                                    </tr>
                                </table>
                                <br>
                                <div id="response"></div>

                                <p id="keinvorname" style="color:red;"></p>
                                <p id="noLastName" style="color:red;"></p>
                                <p id="noPassword" style="color:red;"></p>
                                <p id="goodPassword" style="color:green;"></p>
                                <p id="notSamePassword" style="color:red;"></p>
                                <p id="samePassword" style="color:green;"></p>

                                <button id="submit" type="submit" value="Registrieren">Registrieren</button>
                                <br>
                                <br>
                                <small>Das Passwort muss mindestens 5 Zeichen lang sein, mindest eine Ziffer, einen Groß- sowie einen Kleinbuchstaben enthalten.</small>

                                <script>
                                    window.addEventListener("load", init);

                                    function init() {
                                        document.getElementById("submit").addEventListener("click", ajax);
                                        document.getElementById("submit").addEventListener("click", clearInput);
                                        document.getElementById("submit").addEventListener("click", clearGoodPassword);
                                        document.getElementById("submit").addEventListener("click", clearSamePassword);
                                    }

                                    function clearInput(){

                                      var inputs = document.querySelectorAll('#vorname, #nachname, #email, #passwort, #confirmPasswort');

                                      inputs.forEach(input => {
                                        input.value = '';
                                      });
                                    }


                                    function ajax() {

                                        var name = document.getElementById("vorname").value;
                                        var lastName = document.getElementById("nachname").value;
                                        var email = document.getElementById("email").value;
                                        var password = document.getElementById("passwort").value;
                                        var confirmPasswort = document.getElementById("confirmPasswort").value;

                                        if (name && lastName && email && password && confirmPasswort) {

                                            var ajaxRequest = new XMLHttpRequest();
                                            ajaxRequest.addEventListener("load", ajaxGeladen);
                                            ajaxRequest.addEventListener("error", ajaxFehler);
                                            ajaxRequest.open("post", "user.php");
                                            var daten = new FormData();
                                            daten.append("name", name);
                                            daten.append("lastName", lastName);
                                            daten.append("email", email);
                                            daten.append("password", password);
                                            daten.append("confirmPasswort", confirmPasswort);
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


                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    include_once 'footer.php';
?>
