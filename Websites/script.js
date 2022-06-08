window.addEventListener("load", setup);

function setup() {
    document.getElementById("vorname").addEventListener("change", validName);
    document.getElementById("nachname").addEventListener("change", validName);
    document.getElementById("passwort").addEventListener("change", validPassword);


    document.getElementById("vorname").addEventListener("focus", clearFirstName);
    document.getElementById("nachname").addEventListener("focus", clearLastName);
    document.getElementById("passwort").addEventListener("focus", clearPassword);
}

function validName() {
    var allowedVocab = /^[A-Z]([a-z]*)$/;

    var vorname = document.getElementById("vorname").value;
    var nachname = document.getElementById("nachname").value;
    if (!vorname.match(allowedVocab)) {
        document.getElementById("keinvorname").innerHTML = "Ungültiger Vorname";
    } else if (!nachname.match(allowedVocab)) {
        document.getElementById("noLastName").innerHTML = "Ungültiger Nachname";
    }
}

function clearFirstName() {
    document.getElementById("keinvorname").innerHTML = "";
}

function clearLastName() {
    document.getElementById("noLastName").innerHTML = "";
}

function clearPassword() {
    document.getElementById("noPassword").innerHTML = "";
}


/* Password Control */
function validPassword() {
    var allowedPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,}$/;

    var passwort = document.getElementById("passwort").value;
    if (!passwort.match(allowedPassword)) {
        document.getElementById("noPassword").innerHTML = "Ungültiges Passwort";
    }
}

function passwordValidation(ev) {
    ev.preventDefault
    var nameValue = "test";
    var passValue = document.getElementById("password").value
    var confpassValue = document.getElementById("confirmPassword").value
        // the typeof operator returns a string.
    if (typeof nameValue !== "string") {
        window.alert("Please re-enter your name")
            // we use strict validation ( !== ) because it's a good practice.
    } else if (passValue !== confpassValue) {
        window.alert("Passwords do not match!")
    }
}