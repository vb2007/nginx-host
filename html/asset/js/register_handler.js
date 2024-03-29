// var username = document.forms["register"]["username"].value;
// var password = document.forms["register"]["password"].value;
// var email = document.forms["register"]["email"].value;
// var gender = document.forms["register"]["gender"].value;

// const formData = {
//   username: username,
//   password: password,
//   email: email,
//   gender: gender
// };

function validateForm() {
  var username = document.forms["register"]["username"].value;
  var password = document.forms["register"]["password"].value;
  var email = document.forms["register"]["email"].value;
  var gender = document.forms["register"]["gender"].value;

  if (username.length < 2 || username.length > 10) {
    alert("Username must be between 2 and 10 characters");
    return false;
  }

  if (password.length < 6 || password.length > 25) {
    alert("Password must be between 6 and 25 characters.");
    return false;
  }
}

function registerUser() {
  if (validateForm() == false) {
    alert("Please fill out the form correctly.");
    return false;
  }

  var username = document.forms["register"]["username"].value;
  var password = document.forms["register"]["password"].value;
  var email = document.forms["register"]["email"].value;
  var gender = document.forms["register"]["gender"].value;

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("register").innerHTML = this.responseText;
    }
  };

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