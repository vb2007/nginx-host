// Check if the 'loggedin' cookie exists
function isUserLoggedIn() {
    return document.cookie.includes("loggedin=true");
}

content = document.getElementById("content");

if (isUserLoggedIn()) {
    // User is logged in --> show content

    //content.innerHTML = "Welcome, logged-in user!";

    content.style.display = "flex";
} else {
    // User is not logged in --> show login form or message
    
    content.innerHTML = "<p>Log in with an account that has the upload permissions or go fuck yourself nigger.</p>";

    //content.style.display = "none";
}
