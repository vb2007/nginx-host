function uploadPaste() {
    var xhttp = new XMLHttpRequest();
  
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("response").innerHTML = this.responseText;
      }
    };
  
    var url = document.getElementById("paste").value;
  
    xhttp.open("POST", "/page/_script/pastebin.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("url=" + encodeURIComponent(url));
  }