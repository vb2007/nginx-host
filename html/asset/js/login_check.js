// Check if the 'loggedin' cookie exists
function isUserLoggedIn() {
    return document.cookie.includes("loggedin=true");
}

var content = document.getElementById("content");
var noscriptElement = document.querySelector("noscript");

if (isUserLoggedIn() == true) {
    // User is logged in --> show content
    content.style.display = "flex";
    noscriptElement.style.display = "none";
} else {
    // User is not logged in --> show login form or message
    content.innerHTML = '<p><a href="/login">Log in</a> with an account that has permissionss.</p>';
}