const form = document.forms["loginForm"];
const submitButton = document.getElementById("submit");

function loginUser() {
    var username = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("login-state").innerHTML = this.responseText + username + password;
        }
    };

    var loginData = 
        "username=" + encodeURIComponent(username) +
        "&password=" + encodeURIComponent(password);
    
    xhttp.open("POST", "/page/_script/login.php", true);
    xhttp.setRequestHeader("Content-type", "applications/x-www-form-urlencoded");
    xhttp.send(loginData);
}