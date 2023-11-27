document.getElementById("url-form").addEventListener("submit", function(event){
    event.preventDefault();

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", '/page/_script/shorten.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (this.status === 200) {
            console.log(xhr.responseText);
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                var shorturl = response.shorturl;

                var messageContainer = document.getElementById("shorturl");
                messageContainer.innerHTML = "<p>Shortened url is at <a target='_blank' href='" + shorturl + "'></a>.</p>"
            }
        }
    }

    xhr.send(formData);
});