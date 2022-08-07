window.addEventListener("load", setup);

function setup() {
    document.getElementById("vorname").addEventListener("change", validName);
    document.getElementById("nachname").addEventListener("change", validName);
    document.getElementById("passwort").addEventListener("change", validPassword);
    document.getElementById("confirmPasswort").addEventListener("change", passwordValidation);

    document.getElementById("vorname").addEventListener("focus", clearFirstName);
    document.getElementById("nachname").addEventListener("focus", clearLastName);
    document.getElementById("passwort").addEventListener("focus", clearPassword);
    document.getElementById("confirmPasswort").addEventListener("focus", clearSecPassword);
    document.getElementById("passwort").addEventListener("focus",clearGoodPassword);
    document.getElementById("confirmPasswort").addEventListener("focus",clearSamePassword);

    
}

/* Die Übertragung des Nutezrnamens per url */
if (window.location.search != '') {
    var url = window.location.search;
    var user_Name = url.replace('?userName=', ''); //theTitle
    document.getElementById("userName").innerHTML = (user_Name.replaceAll("-", " ")).replaceAll("_", "'");
}

/* Name Control */
function validName() {
    var allowedVocab = /^[\u00C0-\u017Fa-zA-Z'][\u00C0-\u017Fa-zA-Z-' ]+[\u00C0-\u017Fa-zA-Z']?$/; // jetzt auch Regex mit Umlauten
    var vorname = document.getElementById("vorname").value;
    var nachname = document.getElementById("nachname").value;

    if (!vorname.match(allowedVocab)) {
        document.getElementById("keinvorname").innerHTML = "Ungültiger Vorname";
    } else if (!nachname.match(allowedVocab)) {
        document.getElementById("noLastName").innerHTML = "Ungültiger Nachname";
    }
}

// /* Vorname Control */
// function validName() {
//     var allowedVocab = /^[\u00C0-\u017Fa-zA-Z'][\u00C0-\u017Fa-zA-Z-' ]+[\u00C0-\u017Fa-zA-Z']?$/; // jetzt auch Regex mit Umlauten
//     var vorname = document.getElementById("vorname").value;

//     if (!vorname.match(allowedVocab)) {
//         document.getElementById("keinvorname").innerHTML = "Ungültiger Vorname";
//     }
// }

// /* Nachname Control */
// function validName() {
//     var allowedVocab = /^[\u00C0-\u017Fa-zA-Z'][\u00C0-\u017Fa-zA-Z-' ]+[\u00C0-\u017Fa-zA-Z']?$/; // jetzt auch Regex mit Umlauten
//     var nachname = document.getElementById("nachname").value;

//     if (!nachname.match(allowedVocab)) {
//         document.getElementById("noLastName").innerHTML = "Ungültiger Nachname";
//     }
// }

function clearFirstName() { document.getElementById("keinvorname").innerHTML = ""; }

function clearLastName() { document.getElementById("noLastName").innerHTML = ""; }

function clearPassword() { document.getElementById("noPassword").innerHTML = ""; }

function clearSecPassword() { document.getElementById("notSamePassword").innerHTML = ""; }

function clearGoodPassword() { document.getElementById("goodPassword").innerHTML = ""; }

function clearSamePassword() { document.getElementById("samePassword").innerHTML = ""; }

/* Password Control */
function validPassword() {
    // mindestens 5 Zeichen lang ist und mindestens eine Ziffer, einen Groß- sowie einen Kleinbuchstabe
    var allowedPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,}$/;
    var passwort = document.getElementById("passwort").value;
    if (!passwort.match(allowedPassword)) {
        document.getElementById("noPassword").innerHTML = "Ungültiges Passwort";
    }
    if (passwort.match(allowedPassword)) {
        document.getElementById("goodPassword").innerHTML = "Passwort ist gültig";
    }
}

/* Compare Passwords */
function passwordValidation() {
    var passValue = document.getElementById("passwort").value
    var confpassValue = document.getElementById("confirmPasswort").value
    if (passValue !== confpassValue) {
        document.getElementById("notSamePassword").innerHTML = "Passwörter stimmen nicht überein";
    } else if (passValue == confpassValue) {
        document.getElementById("samePassword").innerHTML = "Passwörter stimmen überein";
    }
}


// JS for toggle form
    var loginForm = document.getElementById("loginForm");
    var regForm = document.getElementById("regForm");
    var indicator = document.getElementById("indicator");

    function login() {
        regForm.style.transform = translateX("300px");
        loginForm.style.transform = translateX("300px");
        indicator.style.transform = translateX("0px");
    }

    function register() {
        regForm.style.transform = translateX("0px");
        loginForm.style.transform = translateX("0px");
        indicator.style.transform = translateX("100px");
    }
