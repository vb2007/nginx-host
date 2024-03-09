function registerUser() {
    var xhttp = new XMLHttpRequest();
  
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("register").innerHTML = this.responseText;
      }
    };
  
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var gender = document.getElementById("gender").value;

    // var captchaResponse = grecaptcha.getResponse();

    // if (captchaResponse.length == 0){
    //   return;
    // }

    var registerData =
        "username=" + encodeURIComponent(username) +
        "&password=" + encodeURIComponent(password) + 
        "&email=" + encodeURIComponent(email) + 
        "&gender=" + encodeURIComponent(gender);
  
    xhttp.open("POST", "/page/_script/register.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(registerData);
  }