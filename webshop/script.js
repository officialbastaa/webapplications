// JS for menu toggle
var menuItems = document.getElementById("menuItems");
menuItems.style.maxHeight = "0px";

function menutoggle() {
    if (menuItems.style.maxHeight == "0px") {
        menuItems.style.maxHeight = "200px";
    } else {
        menuItems.style.maxHeight = "0px";
    }
}

// JS for toggle form
    var lForm = document.getElementById("LoginForm");
    var rForm = document.getElementById("RegForm");
    var indi = document.getElementById("Indicator");

        function register() {
            rForm.style.transform = translateX("0px");
            lForm.style.transform = translateX("0px");
            indi.style.transform = translateX("100px");
        }

        function login() {
            rForm.style.transform = translateX("300px");
            lForm.style.transform = translateX("300px");
            indi.style.transform = translateX("0px");
        }


// JS for product gallery
    var productImg = document.getElementById("productImg");
    var smallImg = document.getElementsByClassName("small-img");

    smallImg[0].onclick = function() {
        productImg.src = smallImg[0].src;
    }
    smallImg[1].onclick = function() {
        productImg.src = smallImg[1].src;
    }
    smallImg[2].onclick = function() {
        productImg.src = smallImg[2].src;
    }
    smallImg[3].onclick = function() {
        productImg.src = smallImg[3].src;
    }
