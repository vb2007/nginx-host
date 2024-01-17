function register() {
    var xhttp = new XMLHttpRequest();
  
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
  
        document.getElementById("register").innerHTML = this.responseText;
      }
    };
  
    var url = document.getElementById("url").value;
  
    xhttp.open("POST", "/page/_script/register.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("url=" + encodeURIComponent(url));
  }