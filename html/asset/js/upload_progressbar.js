document.querySelector('.upload-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var formData = new FormData(this);
    
    var progressBar = document.getElementById('progress');
    var progressBarFill = document.getElementById('bar');
    var progressBarPercent = document.getElementById('percent');
    
    var xhr = new XMLHttpRequest();
    
    xhr.open('POST', '/page/upload.php', true);
    
    xhr.upload.onprogress = function(e) {
      if (e.lengthComputable) {
        var percentComplete = (e.loaded / e.total) * 100;
        progressBar.style.display = 'block';
        progressBarFill.style.width = percentComplete + '%';
        progressBarPercent.innerHTML = percentComplete.toFixed(2) + '%';
      }
    };
  
    xhr.onload = function() {
      if (xhr.status === 200) {
        //sikeres feltöltés, válasz kezelése
        console.log(xhr.responseText);
      }
      else {
        //ha nem megy hát nem megy
        console.error('Upload failed.');
      }
    };
  
    xhr.onerror = function() {
      //a te hállózati problémád nem az én bajom basszam a szád
      console.error('Network error during upload.');
    };
  
    xhr.send(formData);
});