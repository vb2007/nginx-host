function isUserLoggedIn() {
    return document.cookie.includes("loggedin=true");
}

content = document.getElementById("content");

if (isUserLoggedIn()) {
    content.innerHTML = "<p>You're already logged in.</p><br><p><a href='logout'>Log out.</a>";

} else {
    content.style.display = "flex";

}
